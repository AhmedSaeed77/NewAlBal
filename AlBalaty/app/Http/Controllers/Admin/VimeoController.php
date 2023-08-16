<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Material\Video\VideoAttachments;
use App\Models\Material\Video\VideoDistribution;
use App\Models\Material\Video\VideoUploadHistory;
use App\Models\Material\Video\VideoProgress;
use App\Models\Material\Video;
use App\Repository\Admin\VideoRepositoryInterface;
use App\UserRole\Page;
use App\UserRole\Permission;
use Carbon\Carbon;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Illuminate\Http\Request;
use Vimeo\Exceptions\VimeoRequestException;
use Vimeo\Exceptions\VimeoUploadException;
use Vimeo\Vimeo;

class VimeoController extends Controller
{
    private $client_id;
    private $secret_id;
    private $access_token;

    public function __construct()
    {
        $this->middleware(['auth:admin']);
        $this->client_id = 'a78d6cd30cceef5884d262d864bcaec781ee94e5';
        $this->secret_id = 'iBHEkmBOp72BaPkZghEJx5V6HOqyhFz315XhFuNQNT3cNGNnAN4ZQyT7q5tQ3aCh7HoucidmDuvb7reo9qvLHquyMO3s06sdBxwX67UF/sD5+de25x2VV6wchUEw3bnt';
        $this->access_token = '9a839b37a502fe701517eeb2ebfbfbdd';
    }

    public function getVimeoVideo($vimeo_id){
        $lib = new Vimeo($this->client_id, $this->secret_id, $this->access_token);
        $video_data = $lib->request('/videos/'.$vimeo_id);
        return $video_data;
    }
    /**
     * @return ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function unlinkedAttachmentLoader(){
        $videoAttachments = VideoAttachments::whereNull('video_id')
            ->where('admin_id', Auth::user()->id)
            ->get()->map(function($row){
                $tmp = explode('/', $row->file_url);
                if(isset($tmp[0])) unset($tmp[0]);
                $row->public_url = asset('storage/'.implode('/', $tmp));
                return $row;
            });
        return response()->json(
            $videoAttachments,
            200
        );
    }

    public function deleteAttachment(Request $request){
        $videoAttachment = VideoAttachments::where([
            'admin_id'  => Auth::user()->id,
            'id'        => $request->id,
        ])->delete();
        return response()->json($videoAttachment, 200);
    }

    public function uploadAttachment(Request $request){
        $thisUser = Auth::user();
        $accept = ['pdf'];
        $fileExtension = $request->file('file')->getClientOriginalExtension();
        $fileName = time().'-'.$request->file('file')->getClientOriginalName();
        if(!in_array($fileExtension, $accept)){
            return response()->json([
                'error' => 'only pdf files are accepted',
            ] ,200);
        }

        if($request->hasFile('file') && $thisUser){
            $url = $request->file('file')->storeAs('/public/videos/attachment/'.$thisUser->id.'/', $fileName);

            $videoAttachment = VideoAttachments::create([
                'title'     => $request->title,
                'admin_id'  => $thisUser->id,
                'video_id'  => $request->video_id != '' ? $request->video_id: null,
                'file_url'  => $url,
            ]);

            return response()->json($videoAttachment, 201);
        }
        return response()->json(null, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(!Permission::hasPermission(Page::VIDEO, 'add')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }

        $courses = \App\Course::all();
        $course_select = [''];
        foreach($courses as $ch){
            $course_select[$ch->id] = $ch->title;
        }

        return view('admin.videos.create')->with('course_select', $course_select);
    }

    public function index(VideoRepositoryInterface $videoRepository)
    {
        if(!Permission::hasPermission(Page::VIDEO, 'read')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }

        $stillTranscoding = VideoUploadHistory::where([
            'video_upload_histories.admin_id'  => Auth::user()->id,
            'vimeo_transcoded'  => 0,
        ])
        ->join('videos', 'videos.id', '=', 'video_upload_histories.video_id')
        ->select('vimeo_id', 'video_upload_histories.id AS history_id', 'videos.id as video_id')->get();

        if(count($stillTranscoding ?? [])){
            $lib = new Vimeo($this->client_id, $this->secret_id, $this->access_token);

            foreach($stillTranscoding as $video){
                $video_data = $lib->request('/videos/'.$video->vimeo_id);
                if($video_data['status'] == 200){
                    if($this->isTranscodeComplete($video_data['body']['transcode']['status'])){
                        VideoUploadHistory::find($video->history_id)->update(['vimeo_transcoded' => 1]);
                        Video::find($video->video_id)->update([
                            'cover_image'   => $video_data['body']['pictures']['sizes'][3]['link'],
                            'duration'      => gmdate("H:i:s", $video_data['body']['duration']),
                        ]);
                    }
                }
            }
        }

        $videos = $videoRepository->currentAdminVideos([], request()->pagination ?? 10);

        return view('admin.videos.index')
            ->with('videos', $videos)
            ->with('result_counter',count($videos));
    }


    public function Upload2VimeoAndStore(Request $request){

        $videoHistoryModel = $this->loadHistory();
        if(!$videoHistoryModel){
            return response()->json(['error' => 'Please, first upload the video'], 200);
        }
        $fullFilePath = storage_path('app/'.$videoHistoryModel->storage_path);
        $lib = new Vimeo($this->client_id, $this->secret_id, $this->access_token);

        try {
            // Upload the file and include the video title and description.
            $uri = $lib->upload($fullFilePath, array(
                'name' => $request->title,
                'description' => $request->description,

            ));

            /**
             * Get Video Data
             */
            $video_data = $lib->request($uri);

            /**
             * Optimize Privacy Settings
             */
            $lib->request($uri . '/privacy/domains/'.env('APP_DOMAIN'), [], 'PUT'); // to get all video whitelisted videos
            $lib->request($uri, array(
                'privacy' => array(
//                    'view' => 'disable',
                    'embed' => 'whitelist',
                ),
            ), 'PATCH');

            /**
             * Delete Video File From Current Server
             */
            unlink($fullFilePath);


            $videoHistoryModel->vimeo_uploaded = 1;
            if($this->isTranscodeComplete($video_data['body']['transcode']['status'])){
                $videoHistoryModel->vimeo_transcoded = 1;
            }
            $videoHistoryModel->save();

            /** Add Video to database */
            $videoModel = Video::create([
                'admin_id'          => Auth::user()->id,
                'title'             => $request->title,
                'description'       => $request->description,
                'cover_image'       => $video_data['body']['pictures']['sizes'][3]['link'],
                'demo'              => 0,
                'duration'          => $video_data['body']['duration'],
                'vimeo_id'          => $this->getVimeoIdFromURI($video_data['body']['uri']),
            ]);

            /** Link video to video_distributions */
            VideoDistribution::updateOrCreate([
                'video_id'      => $videoModel->id,
                'path_id'       => $request->path_id,
                'course_id'     => $request->course_id,
                'part_id'       => $request->part_id,
                'chapter_id'    => $request->chapter_id,
                'topic_id'      => $request->topic_id,
                'skill_id'      => $request->skill_id,
            ],[
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);

            /** Link video to video_upload_history */
            $videoHistoryModel->video_id = $videoModel->id;
            $videoHistoryModel->save();

            /** Link to Attachments */
            VideoAttachments::where([
                'admin_id'  => Auth::user()->id,
            ])->whereNull('video_id')->update(['video_id' => $videoModel->id]);

        } catch (VimeoUploadException $e) {
            return response()->json([
                'exception' => 'uploadException',
                'error' => $e->getMessage()
            ], 200);

        } catch (VimeoRequestException $e) {
            return response()->json([
                'exception' => 'requestException',
                'error' => $e->getMessage()
            ], 200);
        } catch (\Exception $e){
            return response()->json([
                'exception' => 'generalException',
                'error' => $e->getMessage(),
            ]);
        }

        return response()->json(['error' => '', 'uri' => $uri], 200);
    }

    public function loadHistory(){
        return VideoUploadHistory::where([
            'admin_id' => Auth::user()->id,
            'vimeo_uploaded' => 0,
        ])->latest()->get()->first();
    }

    public function upload(Request $request) {  //from web route

        try {
            // create the file receiver
            $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));

            // check if the upload is success, throw exception or return response you need
            if ($receiver->isUploaded() === false) {
                throw new UploadMissingFileException();
            }

            // receive the file
            $save = $receiver->receive();

            // check if the upload has finished (in chunk mode it will send smaller files)
            if ($save->isFinished()) {
                // save the file and return any response you need, current example uses `move` function. If you are
                // not using move, you need to manually delete the file by unlink($save->getFile()->getPathname())
                return $this->saveFile($save->getFile(), $request);
            }

            // we are in chunk mode, lets send the current progress
            /** @var AbstractHandler $handler */
            $handler = $save->handler();

            return response()->json([
                "done" => $handler->getPercentageDone(),
                'status' => true
            ]);
        }catch(\Exception $e){
            /**
             *
             */
            return response()->json([
                "done" => 0,
                'status' => false,
            ], 500);
        }

    }

    protected function saveFile(UploadedFile $file, Request $request) {
        $user_obj = auth()->user();
        $fileName = $this->createFilename($file);

        // Get file mime type
        $mime_original = $file->getMimeType();
        $mime = str_replace('/', '-', $mime_original);


        $filePath = "public/chunk-upload/{$user_obj->id}/";
        $finalPath = storage_path("app/".$filePath);

        $fileSize = $file->getSize();
        // move the file name
        $file->move($finalPath, $fileName);

        $url_base = 'storage/chunk-upload/'.$user_obj->id."/".$fileName;

        VideoUploadHistory::updateOrCreate([
            'admin_id'   => Auth::user()->id,
            'video_id'  => null,
            'file_name' => $fileName,
            'storage_path'  => ($filePath).$fileName,
            'vimeo_uploaded' => 0,
            'vimeo_transcoded' => 0,
        ]);

        return response()->json([
            'path' => ($filePath),
            'name' => $fileName,
            'mime_type' => $mime
        ], 200);
    }

    protected function createFilename(UploadedFile $file) {
        $extension = $file->getClientOriginalExtension();
        $filename = str_replace(".".$extension, "", $file->getClientOriginalName()); // Filename without extension

        //delete timestamp from file name
        $temp_arr = explode('_', $filename);
        if ( isset($temp_arr[0]) ) unset($temp_arr[0]);
        $filename = implode('_', $temp_arr);

        //here you can manipulate with file name e.g. HASHED
        return $filename.".".$extension;
    }

    public function delete(Request $request){
        $user_obj = auth()->user();

        $file = $request->filename;

        //delete timestamp from filename
        $temp_arr = explode('_', $file);
        if ( isset($temp_arr[0]) ) unset($temp_arr[0]);
        $file = implode('_', $temp_arr);


        $filePath = "public/chunk-upload/{$user_obj->id}/";
        $finalPath = storage_path("app/".$filePath);

        if ( unlink($finalPath.$file) ){
            return response()->json([
                'status' => 'ok'
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'error'
            ], 403);
        }
    }


    public function destroy($id)
    {
        if(!Permission::hasPermission(Page::VIDEO, 'delete')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }

        $video = Video::where(['admin_id' => Auth::user()->id, 'id' => $id])->first();

        if(!$video){
            return route('video.index')->with('error', 'Video Not Found');
        }

        DB::beginTransaction();
        try{
            /** Delete Linked Material */
            VideoAttachments::where(['admin_id' => Auth::user()->id, 'video_id' => $video->id])->delete();

            /** Delete Progress */
            VideoProgress::where('video_id', $video->id)->delete();

            /** Delete from VimeoServers */
            $lib = new Vimeo($this->client_id, $this->secret_id, $this->access_token);
            $lib->request('/videos/'.$video->vimeo_id, array(), 'DELETE');

            $video->delete();
        }catch (VimeoRequestException $e) {
            DB::rollBack();
            return redirect()->route('video.index')->with('error', 'VimeoRequestException: '.$e->getMessage());
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('video.index')->with('error', 'GeneralException: '.$e->getMessage());
        }
        DB::commit();
        return \redirect(route('video.index'))->with('success','Video Deleted.');
    }

    private function isTranscodeComplete($status){
        return $status != 'in_progress';
    }

    private function getVimeoIdFromURI($uri){
        $uri = explode('/', $uri);
        return $uri[count($uri)-1];
    }


}
