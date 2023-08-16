<?php

namespace App\Http\Controllers;

use App\Localization\Locale;
use App\Repository\Admin\PackageRepositoryInterface;
use App\Transcode\Transcode;
use App\Zone\Zone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Package\Packages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{

    use \App\Payment\Payment;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index'
            , 'is_package_expired'
            , 'package_view'
            ,'testupload'
            , 'sendEmailCustomer'
            , 'index_termsOfSevice'
            , 'store_termsOfSevice'
            , 'securityCheck'
            , 'eventPage'
            , 'activateAccount'
            , 'freeResourceDemoVideos'
            , 'reviews'
            , 'aboutUs']); //default auth --->> auth:web
        

    }
    public function aboutUs(){
        return view('aboutUs');
    }


    public function activateAccount(Request $req, $user_id){

        $disabled = \App\DisabledUser::where(['user_id'=> $user_id])->first();
        
        if(!$disabled){
            return \Redirect::to(route('login'))->with('error', 'Maybe this account has been activated !');
        }

        if(!Hash::check($disabled->password, $req->hash) ){
            return \Redirect::to(route('login'))->with('error', 'Something went wrong!');
        }


        $user = new \App\User;
        $user->id = $disabled->user_id;
        $user->name = $disabled->name;
        $user->email = $disabled->email;
        $user->city = $disabled->city;
        $user->country = $disabled->country;
        $user->phone = $disabled->phone;
        $user->last_login = $disabled->last_login;
        $user->last_action = $disabled->last_action;
        $user->last_ip = $disabled->last_ip;
        $user->password = $disabled->password;
        $user->remember_token = $disabled->remember_token;
        $user->created_at = $disabled->created_at;
        $user->updated_at = $disabled->updated_at;
        $user->save();

        $disabled->delete();

        return \Redirect::to(route('login'))->with('success', 'Account has been Activated. Please Login');
    }

    public function eventPage(Locale $locale, $event_id){

        $pricing = $this->PriceDetails(\request()->coupon, $event_id, 'event');

        $event = \App\Event::find($event_id);
        if(!$event){
            return back();
        }

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

        return view('Event')
            ->with('i', $item)
            ->with('pricing', $pricing);
    }

    public function securityCheck(Request $req){
        if(Auth::check()){
            if(Auth::user()->id == \Session('attempt_user_id')){
                return 200;
            }else{
                Auth::logout();
                return 500;
            }
        }else{
            return 500;
        }
    }

    public function index_termsOfSevice(){
        return view('admin.termOfService');
    }

    public function store_termsOfSevice(Request $req){
        $data = \App\PaypalConfig::all()->first();
        $data->term_of_service = $req->input('terms');
        $data->save();

        return back()->with('success', 'Terms are Updated !');
    }

    public function show_inobox(){
        return view('user.inbox');
    }

    public function sendEmailCustomer(Request $req){
        $this->validate($req, [
            'name'  =>  'required',
            'email' =>  'required',
            'msg'   =>  'required'
        ]);
        $data = [
            $req->input('name'),
            $req->input('email'),
            $req->input('msg')
        ];

        Mail::to("sayed@pm-tricks.com")->send(new ContactUsMail($data));

        return \Redirect::to(route('index').'#contact_us_form')->with('success', 'Message Sent .');
    }

    public function testupload(Request $req){
        if($req->hasFile('file')){
            $x = $req->file('file')->store('public/testupload');
            return $x;
        }else{
            return 0;
        }
    }

    public function user_board(Locale $locale){
        /**
         * Packages data
         */
        $thisUser = Auth::user();

        $all_package_number = Cache::remember('allPackagesCount', 1440, function(){
            return \App\Models\Package\Packages::where('active', 1)->get()->count();
        });
        
        $total_number_events = Cache::remember('allEventsCount', 1440, function(){
           return \App\Event::all()->count();
        });
        $user_package = \App\UserPackages::where('user_id', Auth::user()->id)->get();
        $total_package_number = $user_package->count();
        $expired_package_number = 0;

        if(count($user_package)){
            foreach($user_package as $up){
                if($this->is_package_expired($up->package_id)){ $expired_package_number++;}
            }
        }
        /**
         * Certification data
         */
        $user_certifications_number = \App\Certification::where('user_id', Auth::user()->id)->get()->count();

        /**
         * Quizzes data
         */
        $quizzes = \App\Quiz::where('user_id', Auth::user()->id)->where('complete', 1)->get();
        $all_quizzes_number = $quizzes->count();
        $success_number = $quizzes->filter(function($row){
            return $row->score > 75;
        })->count();


        $packages = \App\Models\Package\Packages::where('active', 1)->get()->filter(function($row){
            $ups = \App\UserPackages::where('user_id', Auth::user()->id)->get();
            if(count($ups)){
                foreach($ups as $up){
                    if($up->package_id == $row->id){
                        return false;
                    }
                }
                return true;
            }else{
                return true;
            }
        })->take(6);

        $packages_arr = [];
        foreach($packages as $package){
            if($package->contant_type == 'question'){
                array_push($packages_arr, $this->renderPublicExamPackage($package));
            }else if($package->contant_type == 'video'){
                array_push($packages_arr, $this->renderPublicVideoPackage($package));
            }else if($package->contant_type == 'combined'){
                array_push($packages_arr, $this->renderPublicExamPackage($package));
                array_push($packages_arr, $this->renderPublicVideoPackage($package));
            }
        }

        $userCourses = DB::table('user_packages')
            ->where('user_packages.user_id', '=', $thisUser->id)
            ->join('packages', 'user_packages.package_id', '=', 'packages.id')
            ->join('courses', 'packages.course_id', '=', 'courses.id')
            ->select(
                'courses.id',
                'courses.title'
            )
            ->groupBy('courses.id')
            ->get();

        $userCertifications = DB::table('certifications')
            ->where('user_id', '=', $thisUser->id)
            ->leftJoin('packages', 'certifications.package_id', '=', 'packages.id')
            ->leftJoin('events', 'certifications.event_id', '=', 'events.id')
            ->select(
                DB::raw('(CASE WHEN packages.name IS NULL THEN events.name ELSE packages.name END) AS product_name'),
                'certifications.id'
            )
            ->get();


        $total_events_count = \App\EventUser::where('user_id', $thisUser->id)->get()->count();
        return view('user.dashboard')
            ->with('all_package_number', $all_package_number)
            ->with('active_package_number', $total_package_number - $expired_package_number)
            ->with('expired_package_number', $expired_package_number)
            ->with('user_certifications_number', $user_certifications_number)
            ->with('all_quizzes_number', $all_quizzes_number)
            ->with('success_number', $success_number)
            ->with('packages_arr', $packages_arr)
            ->with('total_number_events', $total_number_events)
            ->with('userCourses', $userCourses)
            ->with('userCertifications', $userCertifications)
            ->with('total_events_count', $total_events_count);
    }

    /**
     * @param Packages $package
     * @return object
     * {
     *      package (modal),
     *      total_rating,
     *      package_uri
     *      numberVideos
     *      progress
     *      package_hours
     *  }
     */
    public function renderPublicVideoPackage(\App\Models\Package\Packages $package)
    {
        $i = (object)[];
        $i->package = $package;
        $i->content_type = 'video';
        /**
         * Expire data
         */
//        if (\Carbon\Carbon::parse(\App\UserPackages::where('user_id', '=', Auth::user()->id)->where('package_id', '=', $package->id)->get()->first()->created_at)->addDays($package->expire_in_days)->gte(\Carbon\Carbon::now())) {
//            $i->expire_at = \Carbon\Carbon::parse(\App\UserPackages::where('user_id', '=', Auth::user()->id)->where('package_id', '=', $package->id)->get()->first()->created_at)->addDays($package->expire_in_days)->toFormattedDateString();
//        } else {
//            $i->expire_at = Carbon\Carbon::parse(\App\PackageExtension::where('user_id', '=', Auth::user()->id)->where('package_id', '=', $package->id)->orderBy('expire_at', 'desc')->get()->first()->expire_at)->toFormattedDateString();
//        }

        /**
         * Rating calculation
         */
        $total_rating = 0;
        $rate = \App\Rating::where('package_id', $package->id)->get();
        foreach ($rate as $r) {
            $total_rating += $r->rate;
        }
        if ($rate->first()) {
            $total_rating = round($total_rating / count($rate), 1);
        } else {
            $total_rating = 0;
        }
        $i->total_rating = $total_rating;

        /**
         * Package link
         */
//        if (\App\VideoProgress::where('user_id', Auth::user()->id)->where('package_id', $package->id)->where('complete', 1)->get()->first()){
//            $last_video_progress = \App\VideoProgress::where('user_id', Auth::user()->id)->where('package_id', $package->id)->where('complete', 1)->orderBy('updated_at', 'desc')->get()->first()->video_id;
//            $video = \App\Video::find($last_video_progress);
//            if ($video) {
//                $last_video_chapter_id = $video->chapter;
//                $video_id_ = \App\Video::where('chapter', explode(',', \App\Packages::find($package->id)->chapter_included)[0])->get()->first()->id;
//            } else {
//                $last_video_chapter_id = explode(',', \App\Packages::find($package->id)->chapter_included)[0];
//                $video_id_ = \App\Video::where('chapter', explode(',', \App\Packages::find($package->id)->chapter_included)[0])->get()->first()->id;
//            }
//            $package_uri = route('st4_vid', [$package->id, 'chapter', $last_video_chapter_id, $video_id_]);
//
//        }else{
//
//            $attack_video = 0;
//            $attack_chapter = 0;
//            foreach (explode(',', \App\Packages::find($package->id)->chapter_included) as $chapter_id) {
//                $attack_video = \App\Video::where('chapter', $chapter_id)->get()->first();
//                $attack_chapter = $chapter_id;
//                if ($attack_video) {
//                    break;
//                }
//            }
//            $package_uri = route('st4_vid', [$package->id, 'chapter', $attack_chapter, $attack_video->id]);
//        }
//        $i->package_uri = $package_uri;

        /**
         * Number of Package Videos
         */
        $numberVideos = Cache::remember('package'.$package->id.'videosCount', 1440, function()use($package){
            $videos_arr = [];
            if($package->chapter_included){
                foreach(explode(',', $package->chapter_included) as $chapter_id){
                    $videos = \App\Video::where('chapter', $chapter_id)->get();
                    foreach($videos as $v){
                        if(!in_array($v->id, $videos_arr)){
                            array_push($videos_arr, $v->id);
                        }
                    }
                }
            }
            return count($videos_arr);
        });
        $i->numberVideos = $numberVideos;

        /**
         * progress Percentage
         */
//        $numberCompletedVideos = \App\VideoProgress::where('user_id', Auth::user()->id)->where('package_id', $i->id)->where('complete', 1)->get()->count();
//        if($numberVideos > 0){
//            $progress = $numberCompletedVideos/$numberVideos * 100;
//        }else{
//            $progress = 0;
//        }
//        $i->progress = $progress;

        /**
         * Total Videos time
         */
        $package_hours = Cache::remember('package'.$package->id.'hoursCount', 1440, function()use($package){
            $total_hours = 0;
            $total_min = 0;
            $total_sec = 0;


            if($package->chapter_included){
                foreach(explode(',', $package->chapter_included) as $chapter_id){
                    $videos = \App\Video::where('chapter', $chapter_id)->get();
                    foreach($videos as $v){
                        if($v->duration != '' && $v->duration != null){

                            $total_min += \Carbon\Carbon::parse($v->duration)->format('i');
                            $total_sec += \Carbon\Carbon::parse($v->duration)->format('s');
                            if(\Carbon\Carbon::parse($v->duration)->format('h') != 12){
                                $total_hours += \Carbon\Carbon::parse($v->duration)->format('h');
                            }
                        }
                    }
                }
            }
            $total_time = [$total_hours, $total_min, $total_sec]; //[hr, min, sec]
            $total_time[1] += $total_time[2]/60;
            $total_time[2] = round($total_time[2]%60);

            $total_time[0] += $total_time[1]/60;
            $total_time[1] = round($total_time[1]%60);
            $total_time[0] = round($total_time[0]);
            return $total_time[0];
        });

        $i->package_hours = $package_hours;

        return $i;

    }

    /**
     * @param Packages $package
     * @return object
     *  {
     *      package (object modal),
     *      expire_at, string
     *      total_rating, number
     *      exams_num, number
     *      questions_num, number
     *  }
     */
    public function renderPublicExamPackage(\App\Models\Package\Packages $package)
    {
        $i = (object)[];
        $i->package = $package;
        $i->content_type = 'question';
        /**
         * Expire data
         */
//        if (\Carbon\Carbon::parse(\App\UserPackages::where('user_id', '=', Auth::user()->id)->where('package_id', '=', $package->id)->get()->first()->created_at)->addDays($package->expire_in_days)->gte(\Carbon\Carbon::now())) {
//            $i->expire_at = \Carbon\Carbon::parse(\App\UserPackages::where('user_id', '=', Auth::user()->id)->where('package_id', '=', $package->id)->get()->first()->created_at)->addDays($package->expire_in_days)->toFormattedDateString();
//        } else {
//            $i->expire_at = Carbon\Carbon::parse(\App\Models\Package\PackageExtension::where('user_id', '=', Auth::user()->id)->where('package_id', '=', $package->id)->orderBy('expire_at', 'desc')->get()->first()->expire_at)->toFormattedDateString();
//        }

        /**
         * Rating calculation
         */
        $total_rating = 0;
        $rate = \App\Rating::where('package_id', $package->id)->get();
        foreach($rate as $r){
            $total_rating += $r->rate;
        }
        if($rate->first()){
            $total_rating = round($total_rating / count($rate), 1);
        }else{
            $total_rating = 0;
        }
        $i->total_rating = $total_rating;
        /**
         * Package meta data like [exams count, questions count]
         */
        $exams_num = Cache::remember('package'.$package->id.'examsCount', 1440, function()use($package){
            return count(explode(',', $package->chapter_included)) + count(explode(',', $package->process_group_included)) + count(explode(',', $package->exams));
        });
        $i->exams_num = $exams_num;
        $questions_num = Cache::remember('package'.$package->id.'questionsCount', 1440, function()use($package){
            $count = [];
            if($package->chapter_included){
                foreach(explode(',', $package->chapter_included) as $chapter_id){
                    $questions = \App\Question::where('chapter', $chapter_id)->get();
                    foreach($questions as $q){
                        if(!in_array($q->id, $count)){
                            array_push($count, $q->id);
                        }
                    }
                }
            }
            if($package->process_group_included){
                foreach(explode(',', $package->process_group_included) as $process_id){
                    $questions = \App\Question::where('process_group', $process_id)->get();
                    foreach($questions as $q){
                        if(!in_array($q->id, $count)){
                            array_push($count, $q->id);
                        }
                    }
                }
            }
            if($package->exams){
                foreach(explode(',', $package->exams) as $exam_id){
                    $questions = \App\Question::where('exam_num', 'LIKE' , '%'.$exam_id.'%')->get();
                    foreach($questions as $q){
                        if(!in_array($q->id, $count)){
                            array_push($count, $q->id);
                        }
                    }
                }
            }
            return count($count);
        });
        $i->questions_num = $questions_num;

        return $i;
    }


    public function package_view(Request $req, $id, PackageRepositoryInterface $packageRepository){

        $locale = new Locale;

        $package = $packageRepository->singlePackage($id);

        if($req->has('coupon')){
            $coupon = \App\Coupon::where('code', $req->coupon)->first();
            if(!$coupon)
            {
                return \Redirect::to(route('public.package.view', $id));    
            }
            if(\Carbon\Carbon::parse($coupon->expire_date)->lt(\Carbon\Carbon::now()) || ($coupon->no_use) == 0) 
            {
                return \Redirect::to(route('public.package.view', $id));    
            }
        }
        

        if(!$package){
            return redirect()->route('index');
        }

        return view('Package')->with('package', $package);
    }

    public function is_package_expired($package_id){

        $package = \App\Models\Package\Packages::find($package_id);
        if(!$package){
            return 1;
        }

        $user_package = \App\UserPackages::where('user_id', '=' ,Auth::user()->id)->where('package_id', '=', $package_id)->get()->first();
        if(!$user_package){
            return 1;
        }

        if(\Carbon\Carbon::parse($user_package->created_at)->addDays($package->expire_in_days)->gte(\Carbon\Carbon::now())){ // original package still not expired
            return 0;
        }else{
            $extension = \App\PackageExtension::where('user_id', '=', Auth::user()->id)->where('package_id', '=', $package_id)->orderBy('expire_at', 'desc')->first();
            if(!$extension){
                return  1;
            }else{
                if(\Carbon\Carbon::parse($extension->expire_at)->gte(\Carbon\Carbon::now())){
                    return 0;
                }else{
                    return 1;
                }
            }
        }

    }

    public function getWebSiteStatistics(){
        Cache::forget('student_no');
        $student_no = Cache::remember('student_no', 1440, function(){
            return DB::table('users')->select(DB::raw('COUNT(*) as student_no'))->first()->student_no;
        });

        Cache::forget('package_no');
        $package_no = Cache::remember('package_no', 1440, function(){
            return DB::table('packages')
                ->where(['active'=> 1, 'approved' => 1])
                ->select(DB::raw('COUNT(*) as package_no'))->first()->package_no;
        });

        Cache::forget('teacher_no');
        $teacher_no = Cache::remember('teacher_no', 1440, function(){
            return DB::table('admins')
                ->select(DB::raw('COUNT(*) as teacher_no'))->first()->teacher_no;
        });

        $sObj = (object)[];
        $sObj->student_no = $student_no;
        $sObj->package_no = $package_no;
        $sObj->teacher_no = $teacher_no;
        return $sObj;
    }

    public function getPopularCourseData($country_code){
         Cache::forget('popularCoursesCache-'.$country_code);
        return (Cache::remember('popularCoursesCache-'.$country_code, 1440, function(){
            $packages = DB::table('packages')
                ->where('popular', '=', 1)
                ->where('active', '=', 1)
                ->leftJoin('ratings', 'packages.id', '=', 'ratings.package_id')
                ->join('courses', 'packages.course_id', '=', 'courses.id')
                ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'courses\') AS course_transcodes'), function($join){
                    $join->on('course_transcodes.row_', '=', 'courses.id');
                })
                ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'packages\') AS package_title_transcodes'), function($join){
                    $join->on('package_title_transcodes.row_', '=', 'packages.id');
                })
                ->select(
                    DB::raw('(CASE WHEN package_title_transcodes.transcode IS NULL THEN packages.name ELSE package_title_transcodes.transcode END) AS name_ar'),
                    DB::raw('SUM((CASE WHEN ratings.id IS NOT NULL THEN 1 ELSE 0 END)) AS rating_count'),
                    DB::raw('AVG((CASE WHEN ratings.rate IS NOT NULL THEN ratings.rate ELSE 0 END)) AS rate'),
                    DB::raw('courses.title AS course_title'),
                    DB::raw('(CASE WHEN course_transcodes.transcode IS NULL THEN packages.name ELSE course_transcodes.transcode END) AS course_title_ar'),
                    'packages.*'
                )
                ->groupBy('packages.id')
                ->get();
            $package_arr = [];
            foreach($packages as $p){
                $i = (object)[];
                $i->package = $p;
                $i->enrolled_student_no = DB::table('user_packages')->where('package_id', $p->id)->select(DB::raw('(COUNT(*)) AS enrolled_no'))->get()->first()->enrolled_no;
                $i->pricing = $this->PriceDetails('', $p->id, 'package');
                array_push($package_arr, $i);    
            }
            usort($package_arr, function($a, $b){
                if ($a == $b) {
                    return 0;
                }
                return ($a < $b) ? 1 : -1;
            });
            return $package_arr;    
        }));
        
    }

    public function getUsersFeedBack(){
        // Cache::forget('userFeedBackCache');
        return (Cache::remember('userFeedBackCache', 1440, function(){
            return DB::table('feedback')
                ->where('disable', '=', 0)
                ->join('users', 'feedback.user_id', '=', 'users.id')
                ->select('feedback.*', 'users.name', 'users.country')
                ->inRandomOrder()
                ->limit(20)
                ->get();
        }));
    }

    public function getEventDetails($country_code){
        
        Cache::forget('eventsDetailsCache-'.$country_code);
        return (Cache::remember('eventsDetailsCache-'.$country_code, 1440, function(){
            $events = DB::table('events')
                ->where('active', '=', 1)
                ->where('end' , '>', now())
                ->leftJoin('ratings', 'events.id', '=', 'ratings.event_id')
                ->leftJoin('event_user', 'events.id', '=', 'event_user.event_id')
                ->leftJoin('courses', 'events.course_id', '=', 'courses.id')
                ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'events\') AS event_title_transcodes'), function($join){
                    $join->on('event_title_transcodes.row_', '=', 'events.id');
                })
                ->select(
                    DB::raw('(CASE WHEN event_title_transcodes.transcode IS NULL THEN events.name ELSE event_title_transcodes.transcode END) AS name_ar'),
                    'events.id',
                    DB::raw('AVG((CASE WHEN ratings.rate IS NOT NULL THEN ratings.rate ELSE 0 END)) AS rate'),
                    DB::raw('SUM((CASE WHEN event_user.id IS NOT NULL THEN 1 ELSE 0 END)) AS enrolled_student_no'),
                    DB::raw('courses.title AS course_title'),
                    'events.name',
                    'events.total_time',
                    'events.total_lecture',
                    'events.start',
                    'events.price',
                    'events.img'
                )
                ->groupBy('events.id')
                ->get();
            $event_arr = [];
            foreach($events as $event){
                $i = (object)[];
                $i->event = $event;
                $i->pricing = $this->PriceDetails('', $event->id, 'event');
                array_push($event_arr, $i);
            }
            return $event_arr;

        }));
    }

    /**
     * Show the application dashboard.
     *
     * @param Locale $locale
     * @param PackageRepositoryInterface $packageRepository
     * @return \Illuminate\Http\Response
     */
    public function index(Locale $locale, PackageRepositoryInterface $packageRepository)
    {
        DB::enableQueryLog();
        /**
         * WebSite Statistics
         */
        $webSiteStatistics = $this->getWebSiteStatistics();

        /**
         * Get Available courses data
         */
        $courses = Cache::remember('courses', 1440, function(){
            return \App\Course::where('private', '=', 0)
                ->get();
        });

        $country_code = Zone::getLocation()->country_code;

        /**
         * Get Popular Courses Data
         */
        $recentPackages = $packageRepository->recent(6);

        $countryParts = $packageRepository->getPartsByCountry(
            Session::get('country_code')
        );


        /**
         * Get users FeedBack
         */
        $userFeedBack = $this->getUsersFeedBack();

        /**
         * Get Event Details
         */
        $events = $this->getEventDetails($country_code);
        
        /**
         * Get FAQ
         */
        $faq = Cache::remember('faq.public', 1440, function(){
            return (DB::table('f_a_qs')
                ->limit(4)
                ->orderBy('created_at', 'desc')
                ->get());
        });
        
        // dd($popular_courses);

        return view('index')
            ->with('webSiteStatistics', $webSiteStatistics)
            ->with('courses', $courses)
            ->with('recentPackages', $recentPackages)
            ->with('userFeedBack', $userFeedBack)
            ->with('events', $events)
            ->with('faq', $faq)
            ->with('countryParts', $countryParts);

    }




    public function freeResourceDemoVideos(){
        return view('freeResourceVideos');
    }

    public function showAllPackages($course_id){
        return view('packages.showAll')->with('course_id',$course_id);
    }

    public function showProfile(Request $req){
        $locale = new Locale();
        $user_details = \App\UserDetail::where('user_id', '=', Auth::user()->id)->get()->first();

        if($req->has('edit')){
            return view('user.profile-edit')->with('user_details', $user_details);
        }
        return view('user.profile')->with('user_details', $user_details);
    }


    public function UserUpdatePasswordRequest(Request $req){
        $this->validate($req, [
            'old_password'              =>  'required|string|min:6',
            'password'                  =>  'required|string|min:6|confirmed', 
        ]);

        

        if(!\Hash::check($req->input('old_password'), Auth::user()->password)){
            return \redirect(route('show.profile').'#tab_1_3')->with('error', 'wrong password !');
        }
        $user = \App\Models\Auth\User::find(Auth::user()->id);
        $user->password = \Hash::make($req->input('password'));
        $user->save();

        return \Redirect::to(route('show.profile'))->with('success', 'Password Updated');


    }

    public function UserUpdateProfileInfo(Request $req){
        $this->validate($req, [
            'name'      =>'required|string',
            'email'     =>'required',
            'phone'     =>'required',
            'city'      =>'required',
            // country is required , check for it later on
            'occupation'=>'required',
        ]);

        $user1 = \App\Models\Auth\User::where('email','=',$req->input('email'))->get()->first();
        if($user1){
            if($user1->id != Auth::user()->id){
                return back()->with('error', 'this email is already in use !');
            }
        }
        
        
        $user = \App\Models\Auth\User::find(Auth::user()->id);
        $user->name = $req->input('name');
        
        $user->email = $req->input('email');
        $user->phone = $req->input('phone');
        $user->city = $req->input('city');
        if($req->input('country') != ''){
            $user->country = $req->input('country');
        }
        $user->save();
        
        $info = \App\UserDetail::where('user_id', '=', $user->id)->get()->first();
        if(!$info){
            $info = new \App\UserDetail;
            $info->user_id = $user->id;
        }
        
        $info->interests = $req->input('interests');
        $info->occupation = $req->input('occupation');
        $info->about = $req->input('about');
        $info->fb_url = $req->input('fb_url');
        $info->tw_url = $req->input('tw_url');
        $info->website_url = $req->input('website_url');
        $info->save();

        return \Redirect::to(route('show.profile'))->with('success', 'Profile updated');
        
    }

    public function UserUpdateProfilePic(Request $req){

        $this->validate($req, [
            'profile_pic' => 'required|mimes:jpg,png,jpeg'
        ]);

        
        

        $info = \App\UserDetail::where('user_id', '=', Auth::user()->id)->get()->first();
        if(!$info){
            $info = new \App\UserDetail;
            $info->user_id = Auth::user()->id;
        }

        if($info->profile_pic){
            if(Storage::exists($info->profile_pic)){
                Storage::delete($info->profile_pic);
            }
        }

        // store the img
        $path = $req->file('profile_pic')->store('public/profile_picture');

        $info->profile_pic = $path;
        $info->save();
        return \Redirect::to(route('show.profile'))->with('success', 'Profile picture updated');
    }

    

    public function reviews(){
        return view('reviews');
    }










}
