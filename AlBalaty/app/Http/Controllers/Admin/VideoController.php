<?php

namespace App\Http\Controllers\Admin;

use App\Transcode\Transcode;
use App\UserRole\Page;
use App\UserRole\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use \App\Models\Material\Video;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public $pagination = 20;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function render(Request $req){
        $video = Video::find($req->video_id);
        $trans = Transcode::evaluate($video, 1);
        return response()->json([
            'title' => $video->title,
            'title_ar' => $trans['title'],
            'description' => $video->description,
            'description_ar' => $trans['description'],
        ], 200);
    }


    public function Vimeo_GetVideo($video_id){
        if($video_id == ''){
            return 0;
        }


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.vimeo.com/videos/'.$video_id);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer '.Auth::user()->vimeo_token,
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/vnd.vimeo.*+json;version=3.4'
        ));
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        try{
            $output = curl_exec($ch);
            $output = json_decode($output);
            if(isset($output->error))
            {
                return 0;
            }
            else
            {
                return ($output);
            }
        }catch(\Exception $e){
            return 0;
        }
        
    }

    public function WR_GetVideo($video_id){
        if($video_id == ''){
            return 0;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://whitereflect.com/api/v1/video/'.$video_id);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer '.env('WR_TOKEN'),
            'Content-Type: application/json',
            'Accept: application/json',
            "Cache-Control:no-cache"
        ));
        

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        try{
            $output = curl_exec($ch);
            $output = json_decode($output);
            
            if($output->status != 'available')
            {
                return 0;
            }
            else
            {
                
                return ($output);
            }
        }catch(\Exception $e){
            return 0;
        }
    }

    public function secToString($seconds){
        $hour   = 0;
        $min    = 0;
        $sec    = $seconds;

        $min = floor($sec / 60);
        $sec = $sec % 60;

        $hour = floor($min / 60);
        $min = $min % 60;

        return $this->NumberPrefix($hour).':'.$this->NumberPrefix($min).':'.$this->NumberPrefix($sec);

    }
    public function NumberPrefix($number){
        if($number == 0){
            return '00';
        }else if($number < 10 && $number > 0){
            return '0'.$number;
        }else{
            return "$number";
        }
    }

    public function VimeoGetDuration($video){ // video output from Vimeo GetVideo API
        if($video){
            $duration_string = $this->secToString($video->duration);
            return $duration_string;
        }
        return 0;
    }

    public function VimeoGetCoverImage($video){ // video output from vimeo getVideo API
        if($video){
            return ($video->pictures->sizes[3])->link; // 360p
        }
        return null;
    }

    public function WRGetDuration($video_id){
        $video = $this->WR_GetVideo($video_id);
        if($video){
            return $this->secToString($video->duration);
        }
        return 0;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!Permission::hasPermission(Page::VIDEO, 'read')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }

        $videos = Video::orderBy('updated_at', 'desc')->paginate($this->pagination);
        // $questions = DB::select('SELECT * FROM questions');
        $result_counter = count(Video::all());
        
        $chapters = \App\Chapters::all();
        $ch_select = ['00'=>''];
        foreach($chapters as $ch){
            $ch_select[$ch->id] = $ch->name;
        }

        $process_group = \App\Process_group::all();
        $pg_select = ['00'=>''];
        foreach($process_group as $pg){
            $pg_select[$pg->id] = $pg->name;
        }
        
        $pmg = \App\ProjectManagementGroup::all();
        $pmg_list = ['00' =>''];
        foreach($pmg as $i){
            $pmg_list[$i->id] = $i->name;
        }

        
        return view('admin.videos.index')->with('videos', $videos)->with('ch_select', $ch_select)->with('pg_select', $pg_select)
            ->with('pmg', $pmg_list)->with('result_counter',$result_counter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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

    public function fetchVimeo(Request $request){
        return response()->json($this->Vimeo_GetVideo($request->vimeo_id), 200);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!Permission::hasPermission(Page::VIDEO, 'add')){
            return response()->json(null, 403);
        }
        /**
         * 
         * 
         * validation
         * 
         * 
         * 
         */
        if($request->input('title') == ''){
            return 'Title is required !';
        }
        if($request->input('description') == ''){
            return 'Description is required !';
        }


//        if($request->duration == ''){
//            return 'Duration is requried';
//        }

        if(!$request->hasFile('video') && $request->input('vimeo_id') == '' && $request->input('wr_id') == ''){
            return 'Select a Video';
        }


        if($request->hasFile('video')){
            $videoFIle = $request->file('video');

            if(!$videoFIle->isValid()){
                return 'Video file not valid to be uploaded !';
            }

            if($videoFIle->extension() != 'mp4'){
                return 'Only Accept `MP4` format !';
            }
        }

        //check if the vimeo id is exist !
        if($request->vimeo_id){
            $video_vimeo = $this->Vimeo_GetVideo($request->vimeo_id);
            $duration = $this->VimeoGetDuration($video_vimeo);
        }else{
            $duration = $this->WRGetDuration($request->input('wr_id'));    
        }

        if($duration === 0){
            return 'Enter Valid Vimeo or WhiteReflect Video ID !!';
        }


        /**
         * 
         * 
         * upload and save data
         * 
         * 
         */

        /**
         * {"_token":"BBsRcDC95lv9rwFqHzVBvsHyAH0NsLx9AYZlkLiK",
         * "title":"tite",
         * "description":"fuck yes",
         * "chapter":"name",
         * "video":{}}
         */
        // if($request->hasFile('video')){
        //     $product->img = $request->file('img')->store('public/videos');
        // }   
            
        $video = new \App\Video;
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        
        if($request->input('attachement') != 0)
        {
            $video->attachment_url = \App\Material::find($request->input('attachment'))->file_url;
        }

        $video->demo = $request->input('demo') == 'on' ? 1 : 0;
        $video->duration = $duration;
        if($request->hasFile('video'))
        {
            $video->video_url = $videoFIle->store('public/videos');
        }

        $video->vimeo_id = $request->input('vimeo_id');
        $video->wr_id = $request->input('wr_id');
        
        $video->index_z = 10;

        if($request->event_id)
        {
            $video->event_id = $request->event_id;
        }
        $video->cover_image = $this->VimeoGetCoverImage($video_vimeo);
        $video->save();
        
        $video->index_z = $video->id;
        $video->save();
        
        return 'ok';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Permission::hasPermission(Page::VIDEO, 'edit')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }

        $video = Video::find($id);

        $course_id = \App\Chapters::find($video->chapter)->course_id;

        $courses = \App\Course::all();
        $course_select = [];
        foreach($courses as $ch){
            $course_select[$ch->id] = $ch->title;
        }

        return view('admin.videos.edit')
            ->with('course_select', $course_select)
            ->with('video',$video)
            ->with('course_id', $course_id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(!Permission::hasPermission(Page::VIDEO, 'edit')){
            return response()->json(null, 403);
        }

        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required',
            'chapter'       => 'required',
            'attachment'    => 'required|numeric',
            'demo'=>'required|numeric',
        ]);

        $video = Video::find($id);

        
        if($request->vimeo_id){
            $duration = $this->VimeoGetDuration($this->Vimeo_GetVideo($request->vimeo_id));
            $cover_image = $this->VimeoGetCoverImage($this->Vimeo_GetVideo($request->vimeo_id));
        }else{
            $duration = $this->WRGetDuration($request->input('wr_id'));    
        }
        
        

        if($duration === 0){
            return 'Enter Valid Vimeo or WhiteReflect Video ID !!';
        }
        
        

        
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $chapter_id = \App\Chapters::where('name', '=', $request->input('chapter'))->where('course_id', $request->input('course_id'))->get()->first()->id;
        $video->chapter = $chapter_id;
        if($request->input('attachment')){
            $video->attachment_url = \App\Material::find( $request->input('attachment') )->file_url;
        }else{
            $video->attachment_url = null;
        }

        $video->demo = $request->input('demo');
        if($request->event_id){
            $video->event_id = $request->event_id;
        }

        $video->vimeo_id = $request->input('vimeo_id');
        $video->wr_id  = $request->input('wr_id');
        $video->duration = $duration;
        $video->cover_image  =$cover_image;

        
        $video->save();

        Transcode::update($video, [
            'title' => $request->title_ar,
            'description' => $request->description_ar
        ]);


        return 'ok';
        
        
    }





    /* Additional Function other than resource */

    public function search(Request $Request){
        $word = Input::get('word');
        $chapter = Input::get('chapter');


        $videos = Video::where('title', 'LIKE', '%'.$word.'%')
            ->where(function($qq) use ($chapter) {
                if($chapter!= '00'){
                    return $qq->where('chapter','=',$chapter);
                }else{
                    return 1;
                }
            });


        
        $result_counter = count($videos->get());
        $videos = $videos->orderBy('updated_at', 'desc')->paginate($this->pagination);


        $chapters = \App\Chapters::all();
        $ch_select = [''];
        foreach($chapters as $ch){
            $ch_select[$ch->id] = $ch->name;
        }

        $process_group = \App\Process_group::all();
        $pg_select = [''];
        foreach($process_group as $pg){
            $pg_select[$pg->id] = $pg->name;
        }

        $pmg = \App\ProjectManagementGroup::all();
        $pmg_list = ['00' =>''];
        foreach($pmg as $i){
            $pmg_list[$i->id] = $i->name;
        }



        return view('admin.videos.index')->with('videos', $videos)->with('ch_select', $ch_select)->with('pg_select', $pg_select)
            ->with('pmg', $pmg_list)->with('result_counter', $result_counter);

    }


}


