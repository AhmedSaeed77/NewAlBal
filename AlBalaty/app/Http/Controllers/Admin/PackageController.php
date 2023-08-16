<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Localization\Locale;
use App\Models\Package\Packages;
use App\Payment\Payment;
use App\Transcode\Transcode;
use App\UserRole\Page;
use App\UserRole\Permission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Chapters;
use App\Process_group;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    use Payment;

    public function __construct()
    {
        $this->dropzone = app('App\Http\Controllers\DropzoneController');
        $this->middleware('auth:admin')->except(['packageByCourse']); //default auth --->> auth:web
    }

    /**
     * @param string $title
     * @param int $package_id
     */
    public function doSlug(string $title, int $package_id): void
    {
        $slug = $this->makeSlug($title, '-');
        $slugExists = DB::table('packages')
            ->where('slug', $slug)
            ->exists();
        if($slugExists){
            $slug = $slug.'-'.$package_id;
            $slugExists = DB::table('packages')->where('slug', $slug)->exists();
            while($slugExists){
                $slug = $slug.'-'.mt_rand(1000, 9999);
            }
        }

        DB::table('packages')->where('id', $package_id)->update(['slug' => $slug]);
    }

    /**
     * @param $str
     * @param string $delimiter
     * @return string
     */
    public function makeSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }

    public function packageLoader(Request $request){
        $general = Packages::find($request->package_id);
        $translation = Transcode::evaluate($general, 'ar',true);
        $pricing = DB::table('zone_prices')->where([
            'item_type' => 'package',
            'item_id'   => $request->package_id,
        ])->get(['zone_id', 'original_price', 'discount']);

        $courses = DB::table('package_courses')->where('package_id', $request->package_id)
            ->get(['course_id']);

        $chapters = DB::table('package_chapters')->where('package_id', $request->package_id)
            ->get(['chapter_id']);
        $exams = DB::table('package_exams')->where('package_id', $request->package_id)
            ->get(['exam_id']);
        $domains = DB::table('package_process_groups')->where('package_id', $request->package_id)
            ->select(DB::raw('(process_group_id) AS domain_id'))
            ->get(['domain_id']);


        return response()->json([
            'general'       => $general,
            'translation'   => $translation,
            'pricing'       => $pricing,
            'courses'       => $courses->pluck(['course_id']),
            'chapters'      => $chapters->pluck(['chapter_id']),
            'exams'         => $exams->pluck(['exam_id']),
            'domains'       => $domains->pluck(['domain_id']),
        ], 200);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(!Permission::hasPermission(Page::PACKAGE, 'read')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }
        $packages = Packages::where(['admin_id' => Auth::user()->id])->get();
        return view('admin/packages/index')->with('packages', $packages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(!Permission::hasPermission(Page::PACKAGE, 'add')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }

        return view('admin/packages/add-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if(!Permission::hasPermission(Page::PACKAGE, 'add')){
            return response()->json([
                'message' => 'Permission Denied',
                'code' => '',
            ], 401);
        }

        DB::beginTransaction();
        try{

            // Media
            $extension = pathinfo($request->coverImageName, PATHINFO_EXTENSION);
            $this->dropzone->upload($request->coverImageName, storage_path('app/public/package/imgs/'.md5($request->coverImageName).'.'.$extension));
            $img_path = 'public/package/imgs/'.md5($request->coverImageName).'.'.$extension;


            /**
             * package Model
             */
            $packageModel = Packages::create([
                'admin_id'              => Auth::user()->id,
                'name'                  => $request->package_name,
                'lang'                  => $request->language,

                'renew_period_in_days'  => $request->renew_period_in_days,

                'description'           => $request->descriptionEditor,
                'requirement'           => $request->requirementEditor,
                'what_you_learn'        => $request->whatYouLearnEditor,
                'who_course_for'        => $request->whoCourseForEditor,
                'enroll_msg'            => $request->enrollConfirmationEditor,

                'img'                   => isset($img_path)? $img_path: null,
                'certification'         => $request->has('certification')? $request->certification: 0,
                'certification_title'   => $request->certification_title,

                'active'                => 1,
                'popular'               => 1,


            ]);

            if($request->has('previewVideoName') && $request->previewVideoName){
                $extension = pathinfo($request->previewVideoName, PATHINFO_EXTENSION);
                $this->dropzone->upload($request->previewVideoName, storage_path('app/public/package/preview/'.md5($request->previewVideoName).'.'.$extension));
                $video_path = 'public/package/preview/'.md5($request->previewVideoName).'.'.$extension;
                $packageModel->preview_video_url = $video_path;
            }
            $packageModel->save();

            /**
             * Exams
             */
            $examsQuery = [];
            if(is_iterable($request->exams)){
                if(count($request->exams)){
                    foreach($request->exams as $exam){
                        array_push($examsQuery, [
                            'package_id'    => $packageModel->id,
                            'exam_id'       => $exam['id'],
                            'created_at'    => Carbon::now(),
                            'updated_at'    => Carbon::now(),
                        ]);
                    }
                    DB::table('package_exams')
                        ->insert($examsQuery);
                }
            }

            /**
             * Scoops
             */
            $scoopQuery = [];
            if(is_iterable($request->parts)){
                if(count($request->parts)){
                    foreach($request->parts as $part){
                        array_push($scoopQuery, [
                            'package_id'    => $packageModel->id,
                            'part_id'       => $part['id'],
                            'created_at'    => Carbon::now(),
                            'updated_at'    => Carbon::now(),
                        ]);
                    }
                    DB::table('package_scoops')
                        ->insert($scoopQuery);
                }
            }



            $this->doSlug($request->package_name, $packageModel->id);

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'code' => "The exception code is: " . $e->getCode(),
                'file'  => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTrace(),
            ], 500);
        }
        DB::commit();

        return response()->json([
            'data'  => $packageModel
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin/packages.edit')
            ->with('package_id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try{
            /**
             *    Calculate the price after discount
             */
            $fallback_discount = min($request->fallback_discount, 99);
            $price = $this->price_after_discount($request->input('fallback_price'), $fallback_discount);

            /**
             * package Model
             */
            $package = \App\Packages::find($id);
            $package->name = $request->input('package_name');
            $package->telegram_link = $request->input('telegram_link');
            $package->whatsapp_link = $request->input('whatsapp_link');
            // Fallback pricing
            $package->original_price = $request->input('fallback_price');
            $package->price = $price;
            $package->discount = $fallback_discount;
            // expiration
            $package->expire_in_days = round($request->expire_in_days);
            $package->extension_in_days = round($request->extension_period);
            $package->max_extension_in_days = round($request->max_number_of_extensions * $request->extension_period);
            $package->extension_price = max($request->extension_price, 0);
            // product details
            $package->lang = $request->input('language');
            $package->description = $request->input('descriptionEditor');
            $package->requirement = $request->input('requirementEditor');
            $package->what_you_learn = $request->input('whatYouLearnEditor');
            $package->who_course_for = $request->input('whoCourseForEditor');
            $package->enroll_msg = $request->input('enrollConfirmationEditor');
            // Media
            if($request->input('coverImageName')){
                $oldPath = $package->img;
                if(Storage::exists($oldPath)){
                    Storage::delete($oldPath);
                }
                $extension = pathinfo($request->coverImageName, PATHINFO_EXTENSION);
                $this->dropzone->upload($request->coverImageName, storage_path('app/public/package/imgs/'.md5($request->coverImageName).'.'.$extension));
                $img_path = 'public/package/imgs/'.md5($request->coverImageName).'.'.$extension;
                $package->img = $img_path;
                $package->img_large = $img_path;
                $package->img_small = $img_path;
            }
            if($request->input('previewVideoName')){
                $oldPath = $package->preview_video_url;
                if(Storage::exists($oldPath)){
                    Storage::delete($oldPath);
                }
                $extension = pathinfo($request->previewVideoName, PATHINFO_EXTENSION);
                $this->dropzone->upload($request->previewVideoName, storage_path('app/public/package/preview/'.md5($request->previewVideoName).'.'.$extension));
                $video_path = 'public/package/preview/'.md5($request->previewVideoName).'.'.$extension;
                $package->preview_video_url =$video_path;
            }

            // Certification
            if($request->certification_title){
                $package->certification = 1;
                $package->certification_title = $request->certification_title;
            }else{
                $package->certification = 0;
                $package->certification_title = '';
            }
            // product init-status
            $package->active = 1;
            $package->popular = 1;
            $package->filter = '--';
            $package->contant_type = '--';
            $package->save();

            /**
             * Courses
             */
            DB::table('package_courses')->where('package_id', $package->id)->delete();
            if(is_iterable($request->courses)){
                if(count($request->courses)){
                    foreach($request->courses as $course){
                        DB::table('package_courses')
                            ->insert([
                                'package_id'    => $package->id,
                                'course_id'       => $course['id'],
                                'created_at'    => Carbon::now(),
                                'updated_at'    => Carbon::now(),
                            ]);
                    }
                }
            }

            /**
             * Chapters
             */
            DB::table('package_chapters')->where('package_id', $package->id)->delete();
            if(is_iterable($request->chapters)){
                if(count($request->chapters)){
                    foreach($request->chapters as $chapter){
                        DB::table('package_chapters')
                            ->insert([
                                'package_id'    => $package->id,
                                'chapter_id'    => $chapter['id'],
                                'created_at'    => Carbon::now(),
                                'updated_at'    => Carbon::now(),
                            ]);
                    }
                }
            }

            /**
             * Exams
             */
            DB::table('package_exams')->where('package_id', $package->id)->delete();
            if(is_iterable($request->exams)){
                if(count($request->exams)){
                    foreach($request->exams as $exam){
                        DB::table('package_exams')
                            ->insert([
                                'package_id'    => $package->id,
                                'exam_id'       => $exam['id'],
                                'created_at'    => Carbon::now(),
                                'updated_at'    => Carbon::now(),
                            ]);
                    }
                }
            }

            /**
             * Domains
             */
            DB::table('package_process_groups')->where('package_id', $package->id)->delete();
            if(is_iterable($request->domains)){
                if(count($request->domains)){
                    foreach($request->domains as $domain){
                        DB::table('package_process_groups')
                            ->insert([
                                'package_id'            => $package->id,
                                'process_group_id'      => $domain['id'],
                                'created_at'            => Carbon::now(),
                                'updated_at'            => Carbon::now(),
                            ]);
                    }
                }
            }

            /**
             * Store Prices
             */
            DB::table('zone_prices')->where(['item_type' => 'package', 'item_id' => $package->id])->delete();
            if(is_iterable($request->zones)){
                if(count($request->zones)){
                    foreach($request->zones as $zone){
                        $original_price = $zone['price'];
                        $discount = min($zone['discount'], 99);
                        $price = $this->price_after_discount($original_price, $discount);
                        DB::table('zone_prices')
                            ->insert([
                                'zone_id'           => $zone['zone_id'],
                                'item_type'         => 'package',
                                'item_id'           => $package->id,
                                'original_price'    => $original_price,
                                'price'             => $price,
                                'discount'          => $discount,
                                'created_at'        => Carbon::now(),
                                'updated_at'        => Carbon::now(),
                            ]);
                    }
                }
            }

            Transcode::update($package, [
                'name' => $request->package_name_ar,
                'description' => $request->descriptionEditor_ar,
                'requirement'=> $request->requirementEditor_ar,
                'what_you_learn'=> $request->whatYouLearnEditor_ar,
                'who_course_for'=> $request->whoCourseForEditor_ar,
            ]);

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'code' => "The exception code is: " . $e->getCode(),
                'file'  => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTrace(),
            ], 500);
        }
        DB::commit();

        return response()->json([
            'data'  => $package
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if(!Permission::hasPermission(Page::PACKAGE, 'delete')){
            return response()->json([
                'message' => 'Permission Denied',
                'code' => '',
            ], 401);
        }

        $packageModel = Packages::where(['admin_id' => Auth::user()->id, 'id'=> $id])->first();
        if(!$packageModel){
            return back()->with('error', 'Package Not Found !');
        }

        if($packageModel->active){
            $packageModel->active = 0;
            $message = 'Package Has Been Disabled';
        }else{
            $packageModel->active = 1;
            $message = 'Package Has Been Enabled';
        }
        $packageModel->save();

        return back()->with('success', $message);
    }


    public function price_after_discount($original_price, $discount){
        $take_off = ($discount/100) * $original_price;
        $new_price = $original_price - $take_off;
        return round($new_price, 2);
    }

    public function packageByCourse(Locale $locale){
        $package_selles_list = [];
        $event_selles_list = [];
        $course_id = \Illuminate\Support\Facades\Input::get('course_id');
        
        $events = \App\Event::where('course_id', $course_id)->where('end' , '>', now())
            ->where('active', 1)->get();
        $packages = \App\Packages::where('package_courses.course_id', $course_id)
            ->join('package_courses', 'package_courses.package_id', '=', 'packages.id')
            ->where('active', 1)
            ->select('packages.*')
            ->get();
        
        
        if($packages->first() || $events->first()){

            if($packages->first()){
                foreach($packages as $package){
                    $item = (object)[];
                    $item->pricing = $this->PriceDetails('', $package->id, 'package');
                    $item->package = $package;
                    $item->courses = \App\Course::where('package_id', $package->id)
                        ->join('package_courses', 'courses.id', '=', 'package_courses.course_id')
                        ->get();
                    $item->users_no = count(\App\UserPackages::where('package_id', $package->id)->get());
                    $total_no = 0;
                    $rate = \App\Rating::where('package_id',$package->id)->get();
                    $devisor = count($rate);
                    foreach($rate as $i){
                        $total_no+= $i->rate;
                    }
                    if($devisor == 0){
                        $item->total_rate = 0;
                    }else{
                        $item->total_rate = $total_no/$devisor;
                    }
    
    
                    array_push($package_selles_list, $item);
                }
    
                for($i=0;$i<count($package_selles_list);$i++){
                    $val = $package_selles_list[$i]->users_no;
                    $val2 = $package_selles_list[$i]->package;
                    $val3 = $package_selles_list[$i]->total_rate;
                    $val4 = $package_selles_list[$i]->pricing;
                    $val5 = $package_selles_list[$i]->courses;
    
                    $j = $i-1;
                    while($j>=0 && $package_selles_list[$j]->users_no < $val){
                        $package_selles_list[$j+1]->users_no = $package_selles_list[$j]->users_no;
                        $package_selles_list[$j+1]->package = $package_selles_list[$j]->package;
                        $package_selles_list[$j+1]->total_rate = $package_selles_list[$j]->total_rate;
                        $package_selles_list[$j+1]->pricing = $package_selles_list[$j]->pricing;
                        $package_selles_list[$j+1]->courses = $package_selles_list[$j]->courses;
                        $j--;
                    }
                    $package_selles_list[$j+1]->users_no = $val;
                    $package_selles_list[$j+1]->package = $val2;
                    $package_selles_list[$j+1]->total_rate = $val3;
                    $package_selles_list[$j+1]->pricing = $val4;
                    $package_selles_list[$j+1]->courses = $val5;
                }    
            }
            
            if($events->first()){
                foreach($events as $event){
                    $item = (object)[];
                    $item->event = $event;
    
                    $item->users_no = count(\App\EventUser::where('event_id', $event->id)->get());
                    $total_no = 0;
                    $rate = \App\Rating::where('event_id',$event->id)->get();
                    $devisor = count($rate);
                    foreach($rate as $i){
                        $total_no+= $i->rate;
                    }
                    if($devisor == 0){
                        $item->total_rate = 0;
                    }else{
                        $item->total_rate = $total_no/$devisor;
                    }
    
    
                    array_push($event_selles_list, $item);
                }
    
                for($i=0;$i<count($event_selles_list);$i++){
                    $val = $event_selles_list[$i]->users_no;
                    $val2 = $event_selles_list[$i]->event;
                    $val3 = $event_selles_list[$i]->total_rate;
    
                    $j = $i-1;
                    while($j>=0 && $event_selles_list[$j]->users_no < $val){
                        $event_selles_list[$j+1]->users_no = $event_selles_list[$j]->users_no;
                        $event_selles_list[$j+1]->package = $event_selles_list[$j]->event;
                        $event_selles_list[$j+1]->total_rate = $event_selles_list[$j]->total_rate;
                        $j--;
                    }
                    $event_selles_list[$j+1]->users_no = $val;
                    $event_selles_list[$j+1]->package = $val2;
                    $event_selles_list[$j+1]->total_rate = $val3;
                }
            }
                

        }else{
            $course = DB::table('package_courses')->first();
            if(!$course){
                return redirect()->route('index');
            }
            return \Redirect::to(route('package.by.course').'?course_id='.$course->course_id);
        }

        return view('PackageByCourse')
            ->with('best_sell', $package_selles_list)
            ->with('best_sell_event', $event_selles_list);

    }
}
