<?php

namespace App\Http\Controllers\users;

use App\Localization\Locale;
use App\Transcode\Transcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Chapters;
use App\Process_group;
use App\UserPackages;
use App\Models\Package\Packages;
use App\QuestionRoles;
use App\UserScore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PremiumQuizController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest:admin');
        // $this->middleware('auth'); //default auth --->> auth:web
        // $next = User::where('id', '>', $user->id)->min('id');
    }

    public function optimizeQuestionTranslation($questions){
        $qustions_arr = [];
        $lastQuestionID = 0;
        $lastQuestionObj = null;

        for($i=0; $i <  count($questions); $i++){
            if($lastQuestionID == $questions[$i]->id){
                $lastQuestionObj->transcodes[$questions[$i]->column_] = $questions[$i]->transcode;
                // case last loop
                if($i + 1 == count($questions)){
                    array_push($qustions_arr, $lastQuestionObj);
                }
            }else{
                // push lastQuestionObj to Questions_arr
                // case first loop
                if($lastQuestionID != 0){
                    array_push($qustions_arr, $lastQuestionObj);
                }

                // load the new question data
                $lastQuestionID = $questions[$i]->id;
                $lastQuestionObj = (object)[];
                $lastQuestionObj->title = $questions[$i]->title;
                $lastQuestionObj->a = $questions[$i]->a;
                $lastQuestionObj->b = $questions[$i]->b;
                $lastQuestionObj->c = $questions[$i]->c;
                $lastQuestionObj->chapter = $questions[$i]->chapter;
                $lastQuestionObj->chapter_name = $questions[$i]->chapter_name;
                $lastQuestionObj->correct_answer = $questions[$i]->correct_answer;
                $lastQuestionObj->created_at = $questions[$i]->created_at;
                $lastQuestionObj->demo = $questions[$i]->demo;
                $lastQuestionObj->exam_num = $questions[$i]->exam_num;
                $lastQuestionObj->feedback = $questions[$i]->feedback;
                $lastQuestionObj->id = $questions[$i]->id;
                $lastQuestionObj->img = $questions[$i]->img;
                $lastQuestionObj->process_group = $questions[$i]->process_group;
                $lastQuestionObj->process_group_name = $questions[$i]->process_group_name;
                $lastQuestionObj->project_management_group = $questions[$i]->project_management_group;
                $lastQuestionObj->updated_at = $questions[$i]->updated_at;
                $lastQuestionObj->transcodes = [
                    'title' => $questions[$i]->title,
                    'a' => $questions[$i]->a,
                    'b' => $questions[$i]->b,
                    'c' => $questions[$i]->c,
                    'correct_answer' => $questions[$i]->correct_answer,
                    'feedback' => $questions[$i]->feedback,
                ];
                // push first tarnslate
                $lastQuestionObj->transcodes[$questions[$i]->column_] = $questions[$i]->transcode;
            }

        }

        return $qustions_arr;
    }

    

    /**
     * @param Request $req
     * @return array
     */
    public function QuizHistory_load(Request $req){
        $locale = new Locale();

        $quiz = \App\Quiz::find($req->input('quiz_id'));
        if($quiz){

            $correct_answers = DB::table('correct_answers')
                ->where('quiz_id', $quiz->id);

            $answers = DB::table('wrong_answers')
                ->where('quiz_id', $quiz->id)
                ->union($correct_answers)
                ->get();

            $questions = [];
            if($quiz->topic_type == 'exam'){
                $questions = DB::table('questions')
                    ->where(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,'.$quiz->topic_id.',%')
                    ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                    ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                    ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'questions\') AS transcodes'), function($join){
                        $join->on('transcodes.row_', '=', 'questions.id');
                    })
                    ->select(
                        'questions.*',
                        DB::raw('(chapters.name) AS chapter_name'),
                        DB::raw('(process_groups.name) AS process_group_name'),
                        'transcodes.column_',
                        'transcodes.transcode'
                    )
                    ->orderBy('questions.id')
                    ->get();

            }elseif($quiz->topic_type == 'chapter'){
                $questions = DB::table('questions')
                    ->where('chapter', '=', $quiz->topic_id)
                    ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                    ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                    ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'questions\') AS transcodes'), function($join){
                        $join->on('transcodes.row_', '=', 'questions.id');
                    })
                    ->select(
                        'questions.*',
                        DB::raw('(chapters.name) AS chapter_name'),
                        DB::raw('(process_groups.name) AS process_group_name'),
                        'transcodes.column_',
                        'transcodes.transcode'
                    )
                    ->orderBy('questions.id')
                    ->get();
            }elseif($quiz->topic_type == 'process'){
                $questions = DB::table('questions')
                    ->where('process_group', '=', $quiz->topic_id)
                    ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                    ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                    ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'questions\') AS transcodes'), function($join){
                        $join->on('transcodes.row_', '=', 'questions.id');
                    })
                    ->select(
                        'questions.*',
                        DB::raw('(chapters.name) AS chapter_name'),
                        DB::raw('(process_groups.name) AS process_group_name'),
                        'transcodes.column_',
                        'transcodes.transcode'
                    )
                    ->orderBy('questions.id')
                    ->get();

            }elseif($quiz->topic_type == 'mistake'){
                $answers_question_id = $answers->pluck('question_id');
                $questions = DB::table('questions')
                    ->whereIn('questions.id', $answers_question_id)
                    ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                    ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                    ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'questions\') AS transcodes'), function($join){
                        $join->on('transcodes.row_', '=', 'questions.id');
                    })
                    ->select(
                        'questions.*',
                        DB::raw('(chapters.name) AS chapter_name'),
                        DB::raw('(process_groups.name) AS process_group_name'),
                        'transcodes.column_',
                        'transcodes.transcode'
                    )
                    ->orderBy('questions.id')
                    ->get();


            }

            $questions = $this->optimizeQuestionTranslation($questions);


            $x = $this->reArrange($questions);
            $start_ = $quiz->start_part;


            /**
             * Score Analysis
             */
            $process_group_analysis = [];
            $chapter_analysis = [];
            $all_process = \App\Process_group::all();
            foreach($all_process as $process){
                $process_group_analysis[$process->name] = [];
            }
            $all_chapter = \App\Chapters::all();
            foreach($all_chapter as $chapter){
                $chapter_analysis[$chapter->name] = [];
            }

            foreach($questions as $q){
                $q_answer = $answers->filter(function($row) use($q){
                    return $row->question_id == $q->id;
                })->first();

                $i = (object)[];
                $i->title = substr( $locale->locale == 'en' ? $q->title : $q->transcodes['title'], 0, 100). ' ..';
                if($q_answer){
                    $i->q_score = $q->correct_answer == $q_answer->user_answer ? 1 : 0;
                }else{
                    $i->q_score = 0;
                }
                $ch = $all_chapter->filter(function($row)use($q) { return $q->chapter == $row->id;})->first();
                $i->chapter = $ch->name;
                $pc = $all_process->filter(function($row)use($q) {return $q->process_group == $row->id;})->first();
                array_push($process_group_analysis[$pc->name], $i);

                $o = (object)[];
                $o->title = $i->title;
                $o->q_score = $i->q_score;
                array_push($chapter_analysis[$ch->name], $o);


            }

            // remove empty
            foreach($process_group_analysis as $k => $v){
                if(!count($v)){
                    unset($process_group_analysis[$k]);
                }
            }
            foreach($chapter_analysis as $k => $v){
                if(!count($v)){
                    unset($chapter_analysis[$k]);
                }
            }

            return [
                'questions'                 => $this->startFromPart($x[0], $x[1], $start_),
                'answers'                   => $answers,
                'score'                     => $quiz->score,
                'process_group_analysis'    => json_encode($process_group_analysis),
                'chapter_analysis'          => json_encode($chapter_analysis),
            ];

        }   
            
    }


    public function QuizHistory_show($id){
        $locale = new Locale();
        $quiz = \App\Quiz::find($id);

        if($quiz){
            if($quiz->topic_type == 'chapter'){
                $topic = \App\Chapters::find($quiz->topic_id)->name;
            }elseif($quiz->topic_type == 'process'){
                $topic = \App\Process_group::find($quiz->topic_id)->name;
            }elseif($quiz->topic_type == 'exam'){
                $topic = 'Exam '.$quiz->topic_id;
            }elseif($quiz->topic_type == 'mistake'){
                if($quiz->topic_id == 1){
                    $topic = 'Chapter Mistakes';
                }else if($quiz->topic_id == 2){
                    $topic = 'Process Group Mistakes';
                }else if($quiz->topic_id == 3){
                    $topic = 'Exam Mistakes';
                }

            }
            $score = $quiz->score;

            if($topic){
                return view('PremiumQuiz.review')
                    ->with('quiz', $quiz)
                    ->with('topic', $topic)
                    ->with('score', $score);
            }
            return back()->with('error','Error !');

        }else{
            return back()->with('error','Error !');
        }

    }


    public function reset_package($package_id){

        
        $history = \App\ExtensionHistory::where('package_id', '=', $package_id)->where('user_id', '=', Auth::user()->id)->get()->first();
        $package = \App\Models\Package\Packages::find($package_id);
        if(!$package){
            return back()->with('error', 'package not found !');
        }

        if($history){
            if($history->extend_num >= $package->max_extension_in_days){
                /** delete data from extension history */
                // $history->delete();
            }else{
//                return back()->with('error', 'You can extend the package with less price !');
            }
           
        }


        /** delete data from userPackages ! */
        $user_package = \App\UserPackages::where('package_id', '=', $package_id)->where('user_id', '=', Auth::user()->id)->get()->first();
        if($user_package){
            $user_package->delete();
        }
        
        /** delete data from package extension table */
        $extension = \App\PackageExtension::where('package_id', '=', $package_id)->where('user_id' , '=', Auth::user()->id)->get();
        if($extension->first()){
            foreach($extension as $ex){
                $ex->delete();
            }
        }
        
        $quizzes = \App\Quiz::where('user_id', '=', Auth::user()->id)->where('package_id','=', $package_id)->get();
        foreach($quizzes as $q){
            DB::table('correct_answers')->where('quiz_id', $q->id)->delete();
            DB::table('wrong_answers')->where('quiz_id', $q->id)->delete();
            $q->delete();
        }

        $video_progress = \App\VideoProgress::where('user_id', Auth::user()->id)->where('package_id', $package_id)->get();
        if($video_progress){
            foreach($video_progress as $v){
                $v->delete();
            }
        }

        return back()->with('success', 'Now You can buy the package again');
    }

    public function ScreenShot(){
        $thisUser = Auth::user();
        $shot = \App\ScreenShot::where('user_id', '=', Auth::user()->id)->get()->first();
        if(!$shot){
            $shot = new \App\ScreenShot;
            $shot->user_id= $thisUser->id;
            $shot->count = 1;
            
        }else{
            $shot->count+=1;
        }

        $shot->save();
        
        if($shot->count >= 10){
            
            $user = \App\Models\Auth\User::find($thisUser->id);
            
            Auth::logout();
            //log him out..
            
            $disUser = new \App\DisabledUser;
            $disUser->user_id = $user->id;
            $disUser->name = $user->name;
            $disUser->email = $user->email;
            $disUser->city = $user->city;
            $disUser->country = $user->country;
            $disUser->phone = $user->phone;
            $disUser->last_login = $user->last_login;
            $disUser->last_action = $user->last_action;
            $disUser->last_ip = $user->last_ip;
            $disUser->password = $user->password;
            $disUser->remember_token = $user->remember_token;
            $disUser->created_at = $user->created_at;
            $disUser->updated_at = $user->updated_at;
            $disUser->save();
            $user->delete();
            
            return 'disabled';
            
        }
        
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

    public function indexSt1(){
        $package_list = []; // list of all chapter and process Group in our data base
        $expire_package = [];
        // $package_name = '';
        $packages = UserPackages::where('user_id','=', Auth::user()->id)->get();
        if($packages->first()){
            foreach ($packages as $package) {
                $package_data = Packages::where('id', '=', $package->package_id)->get()->first();

                if($this->is_package_expired($package_data->id)){
                    array_push($expire_package, $package_data);
                }else{
                    array_push($package_list, $package_data);
                }


                


                
            }
        }

        $video_packages = $this->indexSt1Video();
        $video_package_list = $video_packages['package_list'];
        
        $video_package_progress = $video_packages['package_progress'];

        return view('PremiumQuiz/index-st1')
            ->with('package_list', $package_list)
            ->with('expire_package', $expire_package)
            ->with('video_package_list', $video_package_list)
            ->with('video_package_progress', $video_package_progress);
    }


    public function indexSt1Video(){
        $package_list = []; // list of all chapter and process Group in our data base
        $expire_package = [];

        $package_progress = [];

        // $package_name = '';
        $packages = UserPackages::where('user_id','=', Auth::user()->id)->get();
        if($packages->first()){
            foreach ($packages as $package) {
                $package_data = Packages::where('id', '=', $package->package_id)->get()->first();

                if($this->is_package_expired($package_data->id)){
                    array_push($expire_package, $package_data);
                }else{
                    array_push($package_list, $package_data);
                }
            }
        }
        

        foreach($package_list as $package){
            if($package->contant_type == 'video' || $package->contant_type =='combined'){
                $chapters_inc = [];
                $total_videos_no = 0;
                $completed_videos_no = count(\App\VideoProgress::where('package_id', $package->id)->where('user_id', Auth::user()->id)->where('complete', 1)->get());
                // calculate the chapters included within the package 
                if($package->chapter_included != '' || $package->chapter_included != null){
                    $arr_chapters_id = explode(',',$package->chapter_included);
                    if( !empty($arr_chapters_id)){
                        foreach($arr_chapters_id as $id){
                            $ch = Chapters::where('id', '=', $id)->get()->first();
                            array_push($chapters_inc, $ch->id);
                        }
                    }
                }
                foreach($chapters_inc as $chapter){
                    $n = count(\App\Video::where('chapter', $chapter)->get());
                    $total_videos_no += $n;
                }

                $percentage = round($completed_videos_no/$total_videos_no * 100);
                $item = (object)[];
                $item->package_id = $package->id;
                $item->progress = $percentage;
                array_push($package_progress, $item);
                

            }
        }
        

        // $process = [];
        // $process_group = Process_group::all();
        // foreach ($process_group as $p) {
        //     array_push($process, $p->name);
            
        // }

        return [
            'package_list'      => $package_list,
            'package_progress'  => $package_progress
        ];
    }





    public function reloadTopics_video($package_id){


        $comments_id = \App\PageComment::where('page', '=', 'video')->where('item_id', '=', $package_id)->pluck('comment_id')->toArray();
        $comments = \App\Comment::whereIn('id', $comments_id)->orderBy('created_at', 'desc')->get();
        

        $topic_list = [];
        $chapters_inc = [];
        $process_inc = [];
        $exams_inc = [];

        if($this->is_package_expired($package_id)){
            return back()->with('error', 'Please, Extend the package to keep access !');
        }
        

        
        $package_data = Packages::where('id', '=',$package_id)->get()->first();
        
        $userpackages = UserPackages::where('package_id', '=', $package_data->id)->where('user_id','=', Auth::user()->id)->get();
        if($userpackages->first()){
            $filter = $package_data->filter;
            $exams = $package_data->exams;


            // calculate the chapters included within the package 
            if($package_data->chapter_included != '' || $package_data->chapter_included != null){
                $arr_chapters_id = explode(',',$package_data->chapter_included);
                if( !empty($arr_chapters_id)){
                    foreach($arr_chapters_id as $id){
                        $ch = Chapters::where('id', '=', $id)->get()->first();
                        $item = (object)[];
                        $item->id = $ch->id;
                        $item->name = $ch->name;
                        array_push($chapters_inc, $item);
                    }
                }     
            }

            if($package_data->process_group_included != '' || $package_data->process_group_included != null){
                $arr_process_id = explode(',',$package_data->process_group_included);
                if( !empty($arr_process_id != '')){
                    foreach($arr_process_id as $id){
                        $ch = Process_group::where('id', '=', $id)->get()->first();
                        $item = (object)[];
                        $item->id = $ch->id;
                        $item->name = $ch->name;
                        array_push($process_inc, $item);
                    }
                }    
            }

            // // calculate the process group included ..
            // $process_group_list = Process_group::all();
            // foreach($process_group_list as $pro){
            //     if($this->reloadQuestionsNumber($package_id, 'process', $pro->id) > 0){
            //         $item = (object)[];
            //         $item->id = $pro->id;
            //         $item->name = $pro->name;

            //         $located = 0;
            //         foreach($process_inc as $p){
            //             if($p->id == $pro->id){
            //                 $located = 1;
            //             }
            //         }
                    
            //         if( !$located ){
            //             array_push($process_inc, $item);
            //         }
            //     }
            // }

            if($exams != null){
                $exams = explode(',', $exams);
                foreach($exams as $e){
                    $item = (object)[];
                    $item->id = $e;
                    $item->name = 'Exam '.$e;
                    array_push($exams_inc, $item);
                }
            }

            if($filter == 'chapter'){
                $topic_list = [];
                if(!count($chapters_inc)){
                    $chapters_inc = null;
                }
                $topic_list['chapters'] = $chapters_inc;
                $topic_list['process'] = null;

            }else if($filter == 'process'){
                $topic_list = [];
                if(!count($process_inc)){
                    $process_inc = null;
                }
                $topic_list['process'] = $process_inc;
                $topic_list['chapters'] = null;
            }else if ($filter == 'chapter_process'){ // chapter and process group

                $topic_list = [];               

                if(!count($chapters_inc)){
                    $chapters_inc = null;
                }
                $topic_list['chapters'] = $chapters_inc;
                if(!count($process_inc)){
                    $process_inc = null;
                }
                $topic_list['process'] = $process_inc;
            }

            // add the exams  if exist
            
            if(count($exams_inc)> 0){
                // foreach ($exams_inc as $i){
                //     array_push($topic_list, $i);
                // }
                $topic_list['exams'] = $exams_inc;
            }else{
                $topic_list['exams'] = null;
            }

            $topic_list['filter'] = $filter;
            $topic_list['package_id'] = $package_id;
            $topic_list['contant_type'] = $package_data->contant_type;
            
            
            // if($package_data->contant_type == 'combined'){
                return view('PremiumQuiz/index-st2-vid')->with('topics', $topic_list)->with('comments', $comments)->with('package', $package_data);
            // }else if ($package_data->contant_type == 'video'){
                // return view('PremiumQuiz/index-st2-vid')->with('topics', $topic_list);
            // }
            
            // if($package_data->contant_type == 'question' || $package_data->contant_type == 'combined'){
            //     return view('PremiumQuiz/index-st2')->with('topics', $topic_list);
            // }else{
            //     return view('PremiumQuiz/index-st2-vid')->with('topics', $topic_list);
            // }
            


        }else{
            // return $package_data->name.' ... '.Auth::user()->id;
            return back();
        }


        
    }


    public function reloadTopics($package_id){


        $topic_list = [];
        $chapters_inc = [];
        $process_inc = [];
        $exams_inc = [];

        if($this->is_package_expired($package_id)){
            return back()->with('error', 'Please, Extend the package to keep access !');
        }
        

        
        $package_data = Packages::where('id', '=',$package_id)->get()->first();
        
        $userpackages = UserPackages::where('package_id', '=', $package_data->id)->where('user_id','=', Auth::user()->id)->get();
        if($userpackages->first()){
            $filter = $package_data->filter;
            $exams = $package_data->exams;



            // calculate the chapters included within the package 
            if($package_data->chapter_included != '' || $package_data->chapter_included != null){
                $arr_chapters_id = explode(',',$package_data->chapter_included);
                if( !empty($arr_chapters_id)){
                    foreach($arr_chapters_id as $id){
                        $ch = Chapters::where('id', '=', $id)->get()->first();
                        $item = (object)[];
                        $item->id = $ch->id;
                        $item->name = $ch->name;
                        array_push($chapters_inc, $item);
                    }
                }     
            }
            // calsculate the process group included within the package
            if($package_data->process_group_included != '' || $package_data->process_group_included != null){
                $arr_process_id = explode(',',$package_data->process_group_included);
                if( !empty($arr_process_id != '')){
                    foreach($arr_process_id as $id){
                        $ch = Process_group::where('id', '=', $id)->get()->first();
                        $item = (object)[];
                        $item->id = $ch->id;
                        $item->name = $ch->name;
                        array_push($process_inc, $item);
                    }
                }    
            }

            // calculate exams included within the package
            if($exams != null){
                $exams = explode(',', $exams);
                foreach($exams as $e){
                    $item = (object)[];
                    $item->id = $e;
                    $item->name = 'Exam '.$e;
                    array_push($exams_inc, $item);
                }
            }

            if($filter == 'chapter'){
                $topic_list = [];
                if(!count($chapters_inc)){
                    $chapters_inc = null;
                }
                $topic_list['chapters'] = $chapters_inc;
                $topic_list['process'] = null;

            }else if($filter == 'process'){
                $topic_list = [];
                if(!count($process_inc)){
                    $process_inc = null;
                }
                $topic_list['process'] = $process_inc;
                $topic_list['chapters'] = null;
            }else if ($filter == 'chapter_process'){ // chapter and process group

                $topic_list = [];               

                if(!count($chapters_inc)){
                    $chapters_inc = null;
                }
                $topic_list['chapters'] = $chapters_inc;
                if(!count($process_inc)){
                    $process_inc = null;
                }
                $topic_list['process'] = $process_inc;
            }

            // add the exams  if exist
            
            if(count($exams_inc)> 0){
                // foreach ($exams_inc as $i){
                //     array_push($topic_list, $i);
                // }
                $topic_list['exams'] = $exams_inc;
            }else{
                $topic_list['exams'] = null;
            }

            $topic_list['filter'] = $filter;
            $topic_list['package_id'] = $package_id;
            $topic_list['contant_type'] = $package_data->contant_type;
            
            
            
            
            return view('PremiumQuiz/index-st2')->with('topics', $topic_list)->with('package', $package_data);
            
            


        }else{
            
            return back();
        }


        
    }


    public function attachThePackageContent($package_id){

        // return back()->with('success', 'under maintenance !');

        $topic_list = [];
        $chapters_inc = [];
        $process_inc = [];
        $exams_inc = [];

        if($this->is_package_expired($package_id)){
            return back()->with('error', 'Please, Extend the package to keep access !');
        }
        

        
        $package_data = Packages::where('id', '=',$package_id)->get()->first();
        
        $userpackages = UserPackages::where('package_id', '=', $package_data->id)->where('user_id','=', Auth::user()->id)->get();
        if($userpackages->first()){
            $filter = $package_data->filter;
            $exams = $package_data->exams;



            // calculate the chapters included within the package 
            if($package_data->chapter_included != '' || $package_data->chapter_included != null){
                $arr_chapters_id = explode(',',$package_data->chapter_included);
                if( !empty($arr_chapters_id)){
                    foreach($arr_chapters_id as $id){
                        $ch = Chapters::where('id', '=', $id)->get()->first();
                        $item = (object)[];
                        $item->id = $ch->id;
                        $item->name = $ch->name;
                        array_push($chapters_inc, $item);
                    }
                }     
            }
            // calsculate the process group included within the package
            if($package_data->process_group_included != '' || $package_data->process_group_included != null){
                $arr_process_id = explode(',',$package_data->process_group_included);
                if( !empty($arr_process_id != '')){
                    foreach($arr_process_id as $id){
                        $ch = Process_group::where('id', '=', $id)->get()->first();
                        $item = (object)[];
                        $item->id = $ch->id;
                        $item->name = $ch->name;
                        array_push($process_inc, $item);
                    }
                }    
            }

            // calculate exams included within the package
            if($exams != null){
                $exams = explode(',', $exams);
                foreach($exams as $e){
                    $item = (object)[];
                    $item->id = $e;
                    $item->name = 'Exam '.$e;
                    array_push($exams_inc, $item);
                }
            }

            if(count($chapters_inc)){
                $id = $chapters_inc[0]->id;
                foreach($chapters_inc as $i){
                    if(\App\Question::where('chapter', $i->id)->get()->first()){
                        return \Redirect::to(route('PremiumQuiz-st3', [$package_id,'chapter', $i->id, 'realtime']));
                    }
                }

            }

            if(count($process_inc)){
                $id = $process_inc[0]->id;

                foreach($process_inc as $i){
                    if(\App\Question::where('chapter', $i->id)->get()->first()){
                        return \Redirect::to(route('PremiumQuiz-st3', [$package_id,'process', $i->id, 'realtime']));
                    }
                }

            }

            if(count($exams_inc)){
                $id = $exams_inc[0]->id;

                foreach($exams_inc as $i){
                    if(\App\Question::where('chapter', $i->id)->get()->first()){
                        return \Redirect::to(route('PremiumQuiz-st3', [$package_id,'exam', $i->id, 'realtime']));
                    }
                }

            }


        }else{
            return back();
        }
    }

    /**
     * @param Packages $package
     * @param string $topic [chapter, exam, process], null => all
     * @return array [
     *      {
     *          'name': 'chapter',
     *          'key': 'chapter',
     *          'content': [
     *                 { id: 2, name: 'chapter 1' },
     *           ]
     *      },
     * ]
     */
    public function CalcIncluded($package, $topic){

        $locale = new Locale();

        $chapters_inc = [];
        $process_inc = [];
        $exams_inc = [];
        $topics_included_arr = [];

        if($topic == 'chapter'){
            // calculate the chapters included within the package
            if($package->chapter_included != '' || $package->chapter_included != null){

                $object_i = (object)[];
                $object_i->name = 'Chapter';
                $object_i->key = 'chapter';


                $arr_chapters_id = explode(',',$package->chapter_included);
                if( !empty($arr_chapters_id)){
                    $chapterQuery = DB::table('chapters')
                        ->whereIn('chapters.id', $arr_chapters_id)
                        ->join('questions', 'chapters.id', '=', 'questions.chapter')
                        ->leftJoin(DB::raw('(SELECT * FROM transcodes WHERE table_=\'chapters\') AS chapterTranscode'),
                            'chapters.id', '=', 'chapterTranscode.row_')
                        ->select(
                            DB::raw('(COUNT(*)) AS questionsNumber'),
                            DB::raw('(SELECT COUNT(*) FROM quizzes WHERE user_id='.$package->user_id.' AND package_id='.$package->package_id.' AND topic_type=\'chapter\' AND complete=\'1\' AND topic_id=chapters.id) AS completedQuizNumber'),
                            DB::raw('(SELECT COUNT(*) FROM quizzes WHERE user_id='.$package->user_id.' AND package_id='.$package->package_id.' AND topic_type=\'chapter\' AND complete=\'0\' AND topic_id=chapters.id) AS savedQuizNumber'),
                            'chapters.*',
                            DB::raw('(CASE WHEN chapterTranscode.transcode IS NULL THEN chapters.name ELSE chapterTranscode.transcode END) AS chapter_name_ar')
                        )
                        ->groupBy('chapters.id')
                        ->get();
                    $kill_mistake = true;
                    foreach($arr_chapters_id as $id){
                        $ch = $chapterQuery->filter(function($row)use($id){ return $row->id == $id;})->first();
//                    $ch1 = $query1->filter(function($row)use($id){ return $row->id == $id;});
//                    $chapter_question_number = $query2->filter(function($row)use($id){ return $row->chapter_id == $id;})->first()->questionsNumber;
                        if($ch){
                            $item = (object)[];
                            $item->id = $ch->id;
                            $item->key = 'chapter';
                            $item->name_en = $ch->name;
                            $item->name_ar = $ch->chapter_name_ar;
                            $item->questions_number = $ch->questionsNumber;
                            $item->completedQuizNumber = $ch->completedQuizNumber;
                            $item->savedQuizNumber = $ch->savedQuizNumber;
                            if($ch->completedQuizNumber <= 0){
                                $kill_mistake = false;
                            }
                            array_push($chapters_inc, $item);
                        }
                    }
                    if($kill_mistake){
                        $item = (object)[];
                        $item->id = 1;
                        $item->key = 'mistake';
                        $item->name_en = 'Kill Mistakes';
                        $item->name_ar = 'الاخطاء';
                        $item->questions_number = 1;
                        $item->completedQuizNumber = 0;
                        $item->savedQuizNumber = \App\Quiz::where([['user_id', '=', Auth::user()->id],
                            ['package_id','=', $package->package_id],
                            ['topic_type', '=', 'Kill Mistakes'],
                            ['topic_id', '=', 1],
                            ['complete', '=', 0],])->first() ? 1: 0;

                        array_push($chapters_inc, $item);
                    }
                }
                $object_i->content = $chapters_inc;

                array_push($topics_included_arr, $object_i);
            }
        }

        if($topic == 'process'){
            if($package->process_group_included != '' || $package->process_group_included != null){

                $object_i = (object)[];
                $object_i->name = 'Process Group';
                $object_i->key = 'process';

                $arr_process_id = explode(',',$package->process_group_included);
                if( !empty($arr_process_id != '')){
                    $processQuery = DB::table('process_groups')
                        ->whereIn('process_groups.id', $arr_process_id)
                        ->join('questions', 'process_groups.id', '=', 'questions.process_group')
                        ->leftJoin(DB::raw('(SELECT * FROM transcodes WHERE table_=\'process_groups\') AS processTranscode'),
                            'process_groups.id', '=', 'processTranscode.row_')
                        ->select(
                            DB::raw('(COUNT(*)) AS questionsNumber'),
                            DB::raw('(SELECT COUNT(*) FROM quizzes WHERE user_id='.$package->user_id.' AND package_id='.$package->package_id.' AND topic_type=\'process\' AND complete=\'1\' AND topic_id=process_groups.id) AS completedQuizNumber'),
                            DB::raw('(SELECT COUNT(*) FROM quizzes WHERE user_id='.$package->user_id.' AND package_id='.$package->package_id.' AND topic_type=\'process\' AND complete=\'0\' AND topic_id=process_groups.id) AS savedQuizNumber'),
                            'process_groups.*',
                            DB::raw('(CASE WHEN processTranscode.transcode IS NULL THEN process_groups.name ELSE processTranscode.transcode END) AS process_name_ar')
                        )
                        ->groupBy('process_groups.id')
                        ->get();
                    $kill_mistake = true;
                    foreach($arr_process_id as $id){
                        $ch = $processQuery->filter(function($row)use($id){return $row->id == $id;})->first();

                        if($ch){
                            $item = (object)[];
                            $item->id = $ch->id;
                            $item->key = 'process';
                            $item->name_en = $ch->name;
                            $item->name_ar = $ch->process_name_ar;
                            $item->questions_number = $ch->questionsNumber;
                            $item->completedQuizNumber = $ch->completedQuizNumber;
                            $item->savedQuizNumber = $ch->savedQuizNumber;
                            if($ch->completedQuizNumber <= 0){
                                $kill_mistake = false;
                            }
                            array_push($process_inc, $item);
                        }


                    }
                    if($kill_mistake){
                        $item = (object)[];
                        $item->id = 2;
                        $item->key = 'mistake';
                        $item->name_en = 'Kill Mistakes';
                        $item->name_ar = 'الاخطاء';
                        $item->questions_number = 1;
                        $item->completedQuizNumber = 0;
                        $item->savedQuizNumber = \App\Quiz::where([['user_id', '=', Auth::user()->id],
                            ['package_id','=', $package->package_id],
                            ['topic_type', '=', 'mistake'],
                            ['topic_id', '=', 2],
                            ['complete', '=', 0],])->first() ? 1: 0;

                        array_push($process_inc, $item);
                    }
                }
                $object_i->content = $process_inc;
                array_push($topics_included_arr, $object_i);
            }
        }

        if($topic == 'exam'){
            if($package->exams != null){
                $object_i = (object)[];
                $object_i->name = 'Exams';
                $object_i->key = 'exam';

                $exams = explode(',', $package->exams);

                $examQuery = DB::table('questions')
                    ->Where(function($q)use($exams){
                        foreach($exams as $exam){
                            $q->orWhere(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,'.$exam.',%');
                        }
                    })
                    ->distinct()
                    ->crossJoin('exams')
                    ->leftJoin(DB::raw('(SELECT * FROM transcodes WHERE table_=\'exams\') AS examTranscode'),
                        'exams.id', '=', 'examTranscode.row_')
                    ->select(
                        DB::raw('(SUM(CASE WHEN CONCAT(\',\' , TRIM(BOTH \'"\' FROM `exam_num`), \',\') LIKE concat(\'%,\', exams.id, \',%\')  THEN 1 ELSE 0 END)) AS questionsNumber'),
                        'exams.*',
                        DB::raw('(CASE WHEN examTranscode.transcode IS NULL THEN exams.name ELSE examTranscode.transcode END) AS exam_name_ar')
                    )
                    ->groupBy('exams.id')
                    ->get();

                $QuizNumber = DB::table('exams')
                    ->whereIn('exams.id', $exams)
                    ->select(
                        DB::raw('(SELECT COUNT(*) FROM quizzes WHERE user_id='.$package->user_id.' AND package_id='.$package->package_id.' AND topic_type=\'exam\' AND complete=\'1\' AND topic_id=exams.id) AS completedQuizNumber'),
                        DB::raw('(SELECT COUNT(*) FROM quizzes WHERE user_id='.$package->user_id.' AND package_id='.$package->package_id.' AND topic_type=\'exam\' AND complete=\'0\' AND topic_id=exams.id) AS savedQuizNumber'),
                        'exams.id'
                    )
                    ->groupBy('exams.id')
                    ->get();

                $kill_mistake = true;
                foreach($exams as $e){
                    $ex = $examQuery->filter(function($row)use($e){return $row->id == $e;})->first();
                    $numbers = $QuizNumber->filter(function($row)use($e){return $row->id == $e;})->first();
                    if($ex){
                        $item = (object)[];
                        $item->id = $ex->id;
                        $item->key = 'exam';
                        $item->name_en = $ex->name;
                        $item->name_ar = $ex->exam_name_ar;
                        $item->questions_number = $ex->questionsNumber;
                        $item->completedQuizNumber = $numbers->completedQuizNumber;
                        $item->savedQuizNumber = $numbers->savedQuizNumber;
                        if($numbers->completedQuizNumber <= 0){
                            $kill_mistake = false;
                        }
                        array_push($exams_inc, $item);
                    }

                }
                if($kill_mistake){
                    $item = (object)[];
                    $item->id = 3;
                    $item->key = 'mistake';
                    $item->name_en = 'Kill Mistakes';
                    $item->name_ar = 'الاخطاء';
                    $item->questions_number = 1;
                    $item->completedQuizNumber = 0;
                    $item->savedQuizNumber = \App\Quiz::where([['user_id', '=', Auth::user()->id],
                        ['package_id','=', $package->package_id],
                        ['topic_type', '=', 'mistake'],
                        ['topic_id', '=', 3],
                        ['complete', '=', 0],])->first() ? 1: 0;

                    array_push($exams_inc, $item);
                }
                $object_i->content = $exams_inc;
                array_push($topics_included_arr, $object_i);
            }
        }

        return $topics_included_arr;

    }


    public function UserPackage($package_id, $user_id){
        return DB::table('user_packages')
            ->where('user_packages.user_id', '=', $user_id)
            ->where('user_packages.package_id', '=', $package_id)
            ->join('packages', 'user_packages.package_id', '=', 'packages.id')
            ->leftJoin(DB::raw('(SELECT * FROM ratings WHERE user_id='.$user_id.' AND package_id='.$package_id.' LIMIT 1) AS ratings'),
                'user_packages.package_id', '=', 'ratings.package_id')
            ->select(
                DB::raw('(CASE WHEN ratings.id IS NULL THEN 0 ELSE 1 END) AS userRatePackage'),
                DB::raw('ratings.rate AS thisUserRate'),
                DB::raw('ratings.review AS thisUserRateReview'),
                DB::raw('user_packages.created_at AS havePackageSince'),
                'user_packages.package_id',
                'user_packages.user_id',
                'packages.name',
                'packages.chapter_included',
                'packages.process_group_included',
                'packages.exams',
                'packages.expire_in_days'
            )->limit(1)
            ->groupBy('user_packages.id')
            ->get()->first();
    }


    public function reloadQuestionsNumber($package_id, $topic, $topic_id, $quiz_id){

        // return back()->with('success', 'under maintenance !');

        $locale = new Locale();

        if(Auth::check()){
            $thisUser = Auth::user();
        }else{
            if($package_id != 'question'){
                return \Redirect::to(route('login'));
            }
        }
        
        

        $process_list = Cache::remember('processGroupPluckName', 1440, function(){
            return Process_group::pluck('name');
        });
        /**
         * Special Case
         */
        
        
        /**
         * GET Topic Comments
         */
        $comments = DB::table('page_comments')
            ->where('page', '=', $topic)
            ->where('item_id', '=', $topic_id)
            ->join('comments', 'page_comments.comment_id', '=', 'comments.id')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->leftJoin('replies', 'page_comments.comment_id', '=', 'replies.reply_to_id')
            ->select(

                'comments.user_id',
                'users.name',
                'user_details.profile_pic',
                DB::raw('comments.id AS comment_id'),
                DB::raw('comments.contant AS comment'),
                'comments.created_at',
                DB::raw('replies.id AS reply_id'),
                DB::raw('(SELECT users.name FROM users WHERE users.id = (SELECT comments.user_id FROM comments WHERE comments.id = replies.comment_id LIMIT 1)) AS reply_name'),
                DB::raw('(SELECT user_details.profile_pic FROM user_details WHERE user_details.user_id = (SELECT comments.user_id FROM comments WHERE comments.id = replies.comment_id LIMIT 1)) AS reply_profile_pic'),
                DB::raw('(SELECT comments.contant FROM comments WHERE comments.id = replies.comment_id LIMIT 1) AS reply_comment'),
                DB::raw('(SELECT comments.created_at FROM comments WHERE comments.id = replies.comment_id LIMIT 1) AS reply_created_at')
            )
            ->orderBy('created_at', 'asc')
            ->get()->groupBy('comment_id');


        if($package_id == 'question'){

            return view('PremiumQuiz.index-st3')
                ->with('process', $process_list)
                ->with('questionNum', 1)
                ->with('package_id', $package_id)
                ->with('topic', $topic)
                ->with('topic_id', $topic_id)
                ->with('package_name', 'test')
                ->with('quiz', null)
                ->with('ignore', 1)
                ->with('comments', $comments)
                ->with('topics_included_arr', [])
                ->with('chapters_inc' , json_encode([]))
                ->with('process_inc', json_encode([]))
                ->with('exams_inc' , json_encode([]))
                ->with('package', null);
                

        }

        /**
         * General Case
         * New Optimization
         */
        $userPackage = $this->UserPackage($package_id, $thisUser->id);
            
        if(!$userPackage){
            return \Redirect::to(route('user.dashboard'))->with('error', 'Something went wrong.');
        }

        if($this->is_package_expiredV3($package_id, $userPackage->havePackageSince, $userPackage->expire_in_days)){
            return back()->with('error', 'Please, Extend the package to keep access !!');
        }

        $mistakeIndex = ['chapter', 'process', 'exam'];

        $chapters_inc = [];
        $process_inc = [];
        $exams_inc = [];
        $topics_included_arr = $this->CalcIncluded($userPackage, $topic == 'mistake' ? $mistakeIndex[$topic_id-1]: $topic);
        foreach($topics_included_arr as $tt){
            if($tt->key == 'chapter'){
                $chapters_inc = $tt->content;
            }
            if($tt->key == 'process'){
                $process_inc = $tt->content;
            }
            if($tt->key == 'exam'){
                $exams_inc = $tt->content;
            }
        }

        

  
        if($quiz_id == 'realtime'){
            $quiz = DB::table('quizzes')
                ->where('user_id', $thisUser->id)
                ->where('package_id', $package_id)
                ->where('topic_type', $topic)
                ->where('topic_id', $topic_id)
                ->where('complete', 0)
                ->first();
        }else{
            $quiz = DB::table('quizzes')->where('id', $quiz_id)->first();
        }

        $quiz_history = DB::table('quizzes')
            ->where('user_id', $thisUser->id)
            ->where('package_id', $package_id)
            ->where('topic_type', $topic)
            ->where('topic_id', $topic_id)
            ->where('complete', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        $quiz_history_arr = [];


        if($quiz_history){
            foreach($quiz_history as $history){
                $i = (object)[];
                $i->quiz = $history;
                $i->hours = 0;
                $i->mins = 0;
                $i->sec = 0;
                if($history->time_left != 0) {
                    $i->hours = floor($history->time_left / 3600);
                    $i->mins = floor(($history->time_left % 3600) / 60);
                    $i->sec = floor(($history->time_left % 3600) % 60);
                }
                array_push($quiz_history_arr, $i);
            }
        }



        if($topic == 'mistake'){
            $questions_id_array = [];

            $quizzes = DB::table('quizzes')
                ->where('user_id', $thisUser->id)
                ->where('package_id', $package_id)
                ->where(function($q)use($topic_id){
                    if($topic_id == 1){
                        $q->where('topic_type', 'chapter');
                    }elseif($topic_id == 2){
                        $q->where('topic_type', 'process');
                    }elseif($topic_id == 3){
                        $q->where('topic_type', 'exam');
                    }
                })
                ->where('complete', 1)
                ->join('wrong_answers', 'quizzes.id', '=', 'wrong_answers.quiz_id')
                ->join('questions', function($join){
                    $join->on('wrong_answers.question_id', '=', 'questions.id');
//                    $join->on('answers.user_answer', '!=', 'questions.correct_answer');
                })
                ->select(
                    'wrong_answers.user_answer',
                    'questions.correct_answer',
                    'questions.id'
                )
                ->groupBy('questions.id')
                ->get();

            $questions_count = $quizzes->count();



            return view('PremiumQuiz.index-st3')
                ->with('process', $process_list)
                ->with('questionNum',$questions_count)
                ->with('package_id', $package_id)
                ->with('topic', $topic)
                ->with('topic_id', $topic_id)
                ->with('package_name', $userPackage->name)
                ->with('quiz', $quiz)
                ->with('chapters_inc' , json_encode($chapters_inc))
                ->with('process_inc', json_encode($process_inc))
                ->with('exams_inc' , json_encode($exams_inc))
                ->with('ignore', 0)
                ->with('comments', $comments)
                ->with('topics_included_arr', json_encode($topics_included_arr))
                ->with('package', $userPackage)
                ->with('quiz_history_arr', $quiz_history_arr);


        }



        /**
         * Verify package included this topic
         */
        
        $topicsScoop = array_filter($topics_included_arr, function($i)use($topic){
            return $i->key == $topic;
        });
        $topicsScoop = array_reverse($topicsScoop);
        $topicsScoop = array_pop($topicsScoop);

        if(!$topicsScoop){
            return \Redirect::to(route('user.dashboard'))->with('error', 'Something went wrong.');
        }
        $currentTopic = array_filter($topicsScoop->content, function($i)use($topic_id){
            return $i->id == $topic_id;
        });
        /** @var get first Item  $currentTopic */
        $currentTopic = array_reverse($currentTopic);
        $currentTopic = array_pop($currentTopic);

        if(!$currentTopic){
            return \Redirect::to(route('user.dashboard'))->with('error', 'Something went wrong.');
        }
        if($currentTopic->questions_number <= 0){
            return \Redirect::to(route('user.dashboard'))->with('error', 'Something went wrong.');
        }


        // handle exams case
        if($topic == 'exam'){
            /**
             * *****************
             * *****************
             * *****************
             */
            // return count($questionWithExamFlag);
            return view('PremiumQuiz.index-st3')
                ->with('process', $process_list)
                ->with('questionNum',$currentTopic->questions_number)
                ->with('package_id', $package_id)
                ->with('topic', $topic)
                ->with('topic_id', $topic_id)
                ->with('package_name', $userPackage->name)
                ->with('quiz', $quiz)
                ->with('chapters_inc' , json_encode($chapters_inc))
                ->with('process_inc', json_encode($process_inc))
                ->with('exams_inc' , json_encode($exams_inc))
                ->with('ignore', 0)
                ->with('comments', $comments)
                ->with('topics_included_arr', json_encode($topics_included_arr))
                ->with('package', $userPackage)
                ->with('currentTopic', $currentTopic)
                ->with('quiz_history_arr', $quiz_history_arr);
        }



        // handle chapter and process group selection ..
        $questions_array = [];
        $count = 0;

        /**
         * *****************
         * *****************
         * *****************
         */
        // return $count;
        if($quiz){
            $count = $quiz->questions_number;
        }

        return view('PremiumQuiz.index-st3')
            ->with('process', $process_list)
            ->with('questionNum',$currentTopic->questions_number)
            ->with('package_id', $package_id)
            ->with('topic', $topic)
            ->with('topic_id', $topic_id)
            ->with('package_name', $userPackage->name)
            ->with('quiz', $quiz)
            ->with('chapters_inc' , json_encode($chapters_inc))
            ->with('process_inc', json_encode($process_inc))
            ->with('exams_inc' , json_encode($exams_inc))
            ->with('ignore', 0)
            ->with('comments', $comments)
            ->with('topics_included_arr', json_encode($topics_included_arr))
            ->with('package', $userPackage)
            ->with('currentTopic', $currentTopic)
            ->with('quiz_history_arr', $quiz_history_arr);

    }

    public function generatePackageContent(Request $req)
    {
        $thisUser = Auth::user();
        $userPackage = $this->UserPackage($req->package_id, $thisUser->id);
        $topics_included_arr = $this->CalcIncluded($userPackage, $req->topic);
        foreach($topics_included_arr as $tt)
        {
            if($tt->key == $req->topic)
            {
                return response($tt->content, 200);
            }
        }
        return [];
    }


    public function generateCX(Request $request)
    {

        /*
        Data = {
            topic: topic, => [chapter, exam, process]
            items_arr: items_arr, [ids, ..]
            package: this.package_id,
        };
        */
        $thisUser = Auth::user();


        $userPackage = DB::table('user_packages')
            ->where('user_packages.user_id', '=', $thisUser->id)
            ->where('user_packages.package_id', '=', $request->package)
            ->join('packages', 'user_packages.package_id', '=', 'packages.id')
            ->select(
                DB::raw('user_packages.created_at AS havePackageSince'),
                'user_packages.package_id',
                'user_packages.user_id',
                'packages.chapter_included',
                'packages.process_group_included',
                'packages.exams',
                'packages.expire_in_days'
            )->limit(1)
            ->groupBy('user_packages.id')
            ->get()->first();
        /**
         * Confidentiality: package not expired
         */
        if($this->is_package_expiredV3($userPackage->package_id, $userPackage->havePackageSince, $userPackage->expire_in_days)){
            return '500';
        }
//        $topics_included_arr = $this->CalcIncluded($userPackage);
//
//        // check that each item included ..
//        $return500 = true;
//        foreach($topics_included_arr as $topic){
//            if($topic->key == $request->topic){
//                $return500 = false;
//                foreach($request->items_arr as $item_id){
//                    $found = array_filter($topic->content, function($ele) use($item_id){
//                        return $ele->id == $item_id;
//                    });
//
//                    if(!count($found)){
//                        $return500 = true;
//                        break;
//                    }
//                }
//                if($return500 == true){
//                    break;
//                }
//            }
//        }
//        if($return500 == true){
//            return '500';
//        }

        $questions_array = [];

        /**
         * Exams,,
         */
        if($request->topic == 'exam'){
            // exams ..
            $question = DB::table('questions')
                ->where(function($q)use($request){
                    foreach($request->items_arr as $id){
                        // $q->orWhere('exam_num', 'LIKE', '%'.$id.'%');
                        $q->orWhere(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,'.$id.',%');
                    }
                })
                ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'questions\') AS transcodes'), function($join){
                    $join->on('transcodes.row_', '=', 'questions.id');
                })
                ->select(
                    'questions.*',
                    DB::raw('(chapters.name) AS chapter_name'),
                    DB::raw('(process_groups.name) AS process_group_name'),
                    'transcodes.column_',
                    'transcodes.transcode'
                )
                ->groupBy('questions.id')
                ->get();

            $question = $this->optimizeQuestionTranslation($question);
            if($question){
                foreach($question as $q){
                    array_push($questions_array, $this->respose($q, null,null));
                }
            }else{
                // no question attached to this exam !
                return '404';
            }

            $data = [
                $questions_array,
                0, // time left
                0 // answers number
            ];
            return $data;
        }

        if($request->topic == 'chapter'){

            $question = DB::table('questions')
                ->where(function($q)use($request){
                    foreach($request->items_arr as $id){
                        $q->orWhere('chapter', '=', $id);
                    }
                })
                ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'questions\') AS transcodes'), function($join){
                    $join->on('transcodes.row_', '=', 'questions.id');
                })
                ->select(
                    'questions.*',
                    DB::raw('(chapters.name) AS chapter_name'),
                    DB::raw('(process_groups.name) AS process_group_name'),
                    'transcodes.column_',
                    'transcodes.transcode'
                )
                ->groupBy('questions.id')
                ->get();

            $question = $this->optimizeQuestionTranslation($question);

            foreach($question as $q){
                array_push($questions_array, $this->respose($q, null,null));
            }


            $data = [
                $questions_array,
                0,
                0
            ];
            return $data;
        }

        if($request->topic == 'process'){

            $question = DB::table('questions')
                ->where(function($q)use($request){
                    foreach($request->items_arr as $id){
                        $q->orWhere('process_group', '=', $id);
                    }
                })
                ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'questions\') AS transcodes'), function($join){
                    $join->on('transcodes.row_', '=', 'questions.id');
                })
                ->select(
                    'questions.*',
                    DB::raw('(chapters.name) AS chapter_name'),
                    DB::raw('(process_groups.name) AS process_group_name'),
                    'transcodes.column_',
                    'transcodes.transcode'
                )
                ->groupBy('questions.id')
                ->get();

            $question = $this->optimizeQuestionTranslation($question);

            foreach($question as $q){
                array_push($questions_array, $this->respose($q, null,null));
            }

            $data = [
                $questions_array,
                0,
                0
            ];
            return $data;
        }


    }




    public function generate(Request $request)
    {

        // Data = {
        //     num: this.question_num,
        //     topic: this.topic_type,
        //     topic_id: this.topic_id,
        //     package: this.package_id
        // };
        
        DB::enableQueryLog();
        
        $thisUser = Auth::user();

        

        $questions_array = [];
        if($request->package == 'question'){
            $question = DB::table('questions')
                ->where('id', '=', $request->topic_id)
                ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                ->select(
                    'questions.*',
                    DB::raw('(chapters.name) AS chapter_name'),
                    DB::raw('(process_groups.name) AS process_group_name')
                )
                ->first();
            if($question){                
                array_push($questions_array, $this->respose($question, null, null));
            }
            return [$questions_array];


        }

        /**
         * GET Package FUll Data
         * Confidentiality: user have the package
         */
        $userPackage = DB::table('user_packages')
            ->where('user_packages.user_id', '=', $thisUser->id)
            ->where('user_packages.package_id', '=', $request->package)
            ->join('packages', 'user_packages.package_id', '=', 'packages.id')
            ->leftJoin(DB::raw('(SELECT * FROM ratings WHERE user_id='.$thisUser->id.' AND package_id='.$request->package.' LIMIT 1) AS ratings'),
                'user_packages.package_id', '=', 'ratings.package_id')
            ->select(
                DB::raw('(CASE WHEN ratings.id IS NULL THEN 0 ELSE 1 END) AS userRatePackage'),
                DB::raw('ratings.rate AS thisUserRate'),
                DB::raw('ratings.review AS thisUserRateReview'),
                DB::raw('user_packages.created_at AS havePackageSince'),
                'user_packages.package_id',
                'user_packages.user_id',
                'packages.chapter_included',
                'packages.process_group_included',
                'packages.exams',
                'packages.expire_in_days'
            )->limit(1)
            ->groupBy('user_packages.id')
            ->get()->first();
        /**
         * Confidentiality: package not expired
         */
        if($this->is_package_expiredV3($userPackage->package_id, $userPackage->havePackageSince, $userPackage->expire_in_days))
        {
            return '500';
        }

        $answers_all = null;
        $quiz_data = DB::table('quizzes')
            ->where('user_id', '=', $thisUser->id)
            ->where('package_id', '=', $userPackage->package_id)
            ->where('topic_type', '=', $request->topic)
            ->where('topic_id', '=', $request->topic_id)
            ->where('complete', '=', 0)
            ->get()->first();
        if($quiz_data){
            $answers_all = DB::table('active_answers')
                ->where('quiz_id', $quiz_data->id)
                ->get();
        }
        

        $quiz = $quiz_data;
        if($answers_all){
            $time_left = (int)($quiz->time_left);
            $answers_number = $quiz->answered_question_number;
        }else{
            $time_left = 0;
            $answers_number = 0;
        }


        if($request->input('topic') == 'exam'){

            $exam_num = $request->input('topic_id');

            // check if included in package ..
            $all_exams = $userPackage->exams;
            $all_exams = explode(',', $all_exams);
            if(!in_array($exam_num, $all_exams)){
                return '500';
            }

            $questions = DB::table('questions')
                ->where(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,'.$exam_num.',%')
                ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'questions\') AS transcodes'), function($join){
                    $join->on('transcodes.row_', '=', 'questions.id');
                })
                ->select(
                    'questions.*',
                    DB::raw('(chapters.name) AS chapter_name'),
                    DB::raw('(process_groups.name) AS process_group_name'),
                    'transcodes.column_',
                    'transcodes.transcode'
                )
                ->orderBy('questions.id')
                ->get();
            $questions = $this->optimizeQuestionTranslation($questions);


            if($questions){
                foreach($questions as $q){
                    array_push($questions_array, $this->respose($q, $quiz, $answers_all));
                }

                $x = $this->reArrange($questions_array);
                if($quiz){
                    $start_ = $quiz->start_part;
                }else{
                    $start_ = rand(1, $x[1]);
                }

                $data = [
                    $this->startFromPart($x[0], $x[1], $start_),
                    $time_left,
                    $answers_number,
                    $start_,
                ];
                return $data;                                    /**   ###########################  select exam */
            }else{
                // no question attached to this exam !
                return '404';
            }
        }else{
            // search for it in chapter table

            if($request->input('topic') == 'chapter'){

                if(!in_array($request->topic_id, explode(',', $userPackage->chapter_included))){
                    return 500;
                }

                $questions = DB::table('questions')
                    ->where('chapter', '=', $request->topic_id)
                    ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                    ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                    ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'questions\') AS transcodes'), function($join){
                        $join->on('transcodes.row_', '=', 'questions.id');
                    })
                    ->select(
                        'questions.*',
                        DB::raw('(chapters.name) AS chapter_name'),
                        DB::raw('(process_groups.name) AS process_group_name'),
                        'transcodes.column_',
                        'transcodes.transcode'
                    )
                    ->orderBy('questions.id')
                    ->get();
                $questions = $this->optimizeQuestionTranslation($questions);

                foreach($questions as $i){
                    array_push($questions_array, $this->respose($i, $quiz, $answers_all));
                }
                
                
                $x = $this->reArrange($questions_array);
                if($quiz){
                    $start_ = $quiz->start_part;
                }else{
                    $start_ = rand(1, $x[1]);
                }

                $data = [
                    $this->startFromPart($x[0], $x[1], $start_),
                    $time_left,
                    $answers_number,
                    $start_,
                    DB::getQueryLog()
                ];
                return $data; /**   ###########################  select chapter */



            }elseif ($request->input('topic') == 'process') {

                // search in process group table ..

                if(!in_array($request->topic_id, explode(',', $userPackage->process_group_included))){
                    return 500;
                }

                $questions = DB::table('questions')
                    ->where('process_group', '=', $request->topic_id)
                    ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                    ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                    ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'questions\') AS transcodes'), function($join){
                        $join->on('transcodes.row_', '=', 'questions.id');
                    })
                    ->select(
                        'questions.*',
                        DB::raw('(chapters.name) AS chapter_name'),
                        DB::raw('(process_groups.name) AS process_group_name'),
                        'transcodes.column_',
                        'transcodes.transcode'
                    )
                    ->orderBy('questions.id')
                    ->get();

                $questions = $this->optimizeQuestionTranslation($questions);

                foreach ($questions as $i) {
                    array_push($questions_array, $this->respose($i, $quiz, $answers_all));
                }
                $x = $this->reArrange($questions_array);
                if($quiz){
                    $start_ = $quiz->start_part;
                }else{
                    $start_ = rand(1, $x[1]);
                }

                $data = [
                    $this->startFromPart($x[0], $x[1], $start_),
                    $time_left,
                    $answers_number,
                    $start_,
                ];
                return $data;
                /**   ###########################  select process */

            }else if($request->topic == 'mistake'){
                $questions_array = [];

                $questions = DB::table('quizzes')
                    ->where('user_id', $thisUser->id)
                    ->where('package_id', $userPackage->package_id)
                    ->where(function($q)use($request){
                        if($request->topic_id == 1){
                            $q->where('topic_type', 'chapter');
                        }elseif($request->topic_id == 2){
                            $q->where('topic_type', 'process');
                        }elseif($request->topic_id == 3){
                            $q->where('topic_type', 'exam');
                        }
                    })
                    ->where('complete', 1)
                    ->join('wrong_answers', 'quizzes.id', '=', 'wrong_answers.quiz_id')
                    ->join('questions', function($join){
                        $join->on('wrong_answers.question_id', '=', 'questions.id');
//                        $join->on('answers.user_answer', '!=', 'questions.correct_answer');
                    })
                    ->leftJoin('chapters', 'questions.chapter', '=', 'chapters.id')
                    ->leftJoin('process_groups', 'questions.process_group', '=' ,'process_groups.id')
                    ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'questions\') AS transcodes'), function($join){
                        $join->on('transcodes.row_', '=', 'questions.id');
                    })
                    ->select(
                        'questions.*',
                        DB::raw('(chapters.name) AS chapter_name'),
                        DB::raw('(process_groups.name) AS process_group_name'),
                        'transcodes.column_',
                        'transcodes.transcode'
                    )
                    ->orderBy('questions.id')
                    ->get();


                $questions = $this->optimizeQuestionTranslation($questions);

                foreach($questions as $q){
                    array_push($questions_array, $this->respose($q, $quiz, $answers_all));
                }
                $x = $this->reArrange($questions_array);
                if($quiz){
                    $start_ = $quiz->start_part;
                }else{
                    $start_ = rand(1, $x[1]);
                }

                $data = [
                    $this->startFromPart($x[0], $x[1], $start_),
                    $time_left,
                    $answers_number,
                    $start_,
                ];
                return $data;



            }else{
                return '500';
            }

        }


        return $questions_array;

    }


    public function reArrange($questions_array){

        // divied it into 20 for each part
        $into = 20;
        $parts_no = ceil(count($questions_array)/$into);


        $QuestionsByPart = [];
        for($i=1; $i<= $parts_no; $i++){
            array_push($QuestionsByPart, array_slice($questions_array, ($i-1)*$into , $into ));
        }



        return [$QuestionsByPart, $parts_no];

    }

    public function startFromPart($QuestionsByPart, $parts_no, $part_no){



        if( ($part_no <= $parts_no) && ($part_no >= 1) ){

            $index = $part_no - 1;

            $q_array =[
                $QuestionsByPart[$index],
            ];

            array_splice($QuestionsByPart, $index, 1);



            foreach($QuestionsByPart as $q){
                array_push($q_array, $q);
            }
            $final_out_ = [];

            foreach($q_array as $x){
                foreach($x as $y){
                    array_push($final_out_, $y);
                }
            }
            return $final_out_;

        }




        return $this->startFromPart($QuestionsByPart, $parts_no , 1);

    }


    public function respose($q, $quiz /**  last parameter is for selecting user saved answer */, $answers_all){
        $question = [];
        $question['id'] = $q->id;
        $question['title'] = [
            'en' => $q->title,
            'ar' => $q->transcodes['title']
        ];


        $question['answers']['a'] = [
            'en' => $q->a,
            'ar' => $q->transcodes['a']
        ];
        $question['answers']['b'] = [
            'en' => $q->b,
            'ar' => $q->transcodes['b']
        ];
        $question['answers']['c'] = [
            'en' => $q->c,
            'ar' => $q->transcodes['c']
        ];
        $question['answers']['d'] = [
            'en' => $q->correct_answer,
            'ar' => $q->transcodes['correct_answer']
        ];
        shuffle($question['answers']);
        $question['correct_answer'] = $q->correct_answer;
        $question['feedback'] = [
            'en' => $q->feedback,
            'ar' => $q->transcodes['feedback']
        ];

        $question['chapter'] = $q->chapter_name;

        if($q->process_group_name){
            $question['process_group'] = $q->process_group_name;
        }else{
            $question['process_group'] = rand(1,10000000);
        }

        $question['img'] = 'null';
        if($q->img){
            $question['img'] = basename($q->img);
        }

        if($answers_all){
            $answer = $answers_all->first(function($item) use($q){
                return $item->question_id == $q->id;
            });
            if($answer){
                $question['user_saved_answer'] = $answer->user_answer;
                $question['flaged'] = $answer->flaged;
            }else{
                $question['flaged'] = false;
                $question['user_saved_answer'] = '';
            }

        }else{
            $question['user_saved_answer'] = '';
        }

        return $question;
    }

    public function is_exist($arr, $title){
        foreach($arr as $a){
            if($a['title'] == $title){
                return 1;
            }
        }
        return 0;
    }


    public function scoreStore(Request $request){

        /**
         * Delete the row s when user click rest after package is expired.
         */
        $quiz = \App\Quiz::where('user_id', '=', Auth::user()->id)
                            ->where('package_id', '=', $request->input('package_id'))
                            ->where('topic_type', '=', $request->input('topic_type'))
                            ->where('topic_id', '=', $request->input('topic_id'))
                            ->where('complete','=', 0)->get()->first();
        if($quiz)
        {
            $quiz->complete = 1;
            $quiz->time_left += $request->input('time_left');
            $quiz->score = $request->input('totalScore');
            $quiz->save();

            /**
             * move answers from activeAnswer to answers table
            */

            $answers = DB::table('active_answers')
                ->where('quiz_id', $quiz->id)
                ->join('questions', 'active_answers.question_id', '=', 'questions.id')
                ->select(
                            'active_answers.quiz_id',
                            'active_answers.question_id',
                            'active_answers.user_answer',
                            'active_answers.flaged',
                            'active_answers.created_at',
                            'active_answers.updated_at',
                            'questions.correct_answer'
                        )->get();

            // convert from [{}, ..] to [[], ..] 
            $correctAnswers_arr = [];
            $correctAnswers = $answers->filter(function($row)
            {
                return $row->user_answer == $row->correct_answer;
            });

            foreach($correctAnswers as $c)
            {
                array_push($correctAnswers_arr, [
                    'quiz_id' => $c->quiz_id,
                    'question_id' => $c->question_id,
                    'user_answer' => $c->user_answer,
                    'flaged' => $c->flaged,
                    'created_at' => $c->created_at,
                    'updated_at' => $c->updated_at,
                ]);
            }

            $wrongAnswers_arr = [];
            $wrongAnswers = $answers->filter(function($row)
            {
                return $row->user_answer != $row->correct_answer;
            });

            foreach($wrongAnswers as $c)
            {
                array_push($wrongAnswers_arr,  [
                                                    'quiz_id' => $c->quiz_id,
                                                    'question_id' => $c->question_id,
                                                    'user_answer' => $c->user_answer,
                                                    'flaged' => $c->flaged,
                                                    'created_at' => $c->created_at,
                                                    'updated_at' => $c->updated_at,
                                                ]);
            }

            $archiveAnswer = DB::table('correct_answers')->insert($correctAnswers_arr);
            $archiveAnswer = DB::table('wrong_answers')->insert($wrongAnswers_arr);

            // delete from active_answers
            DB::table('active_answers')->where('quiz_id', $quiz->id)->delete();
        }
        
        /**
         * delete all, but the latest 3 history records
         */
        
        $quizzes = \App\Quiz::where('user_id', Auth::user()->id)
            ->where('package_id', '=', $request->input('package_id'))
            ->where('topic_type', '=', $request->input('topic_type'))
            ->where('topic_id', '=', $request->input('topic_id'))
            ->where('complete','=', 1)
            ->orderBy('updated_at', 'desc')->get();
        $i = 1;
        foreach($quizzes as $q){
            if($i > 3 || \Carbon\Carbon::parse($q->updated_at)->addDays(90)->lt(\Carbon\Carbon::now()) ){
                DB::table('correct_answers')->where('quiz_id', $q->id)->delete();
                DB::table('wrong_answers')->where('quiz_id', $q->id)->delete();
                $q->delete();
            }
            $i++;
        }
        return 'saved';
    }

    public function scoreHistory(){
        $score = UserScore::where('user_id', '=', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(15);
        return view('PremiumQuiz.scoreHistory')->with('score', $score);
    }

    public function showFeedback($id){
        $locale = new Locale;

        $q= Question::find($id);
        $feedback = Transcode::evaluate($q)['feedback'];
        if($q){
            return view('PremiumQuiz.feedback')->with('feedback', $feedback);
        }
        return view('PremiumQuiz.feedback')->with('feedback', 'Error');
        
        
    }


    public function st3_vid($package_id, $topic , $topic_id){


        return \Redirect::to( route('st4_vid', [$package_id, 'chapter', 0, 0]) );
        
        $topic_type = 'chapter';
        $topic_name = '';
        if($topic != $topic_type){
            $topic_type = 'process_group';
            $topic_name = \App\Process_group::find($topic_id)->name;
        }else{
            $topic_name = \App\Chapters::find($topic_id)->name;
        }

        
        
        

        $videos = \App\Video::where([$topic_type => $topic_id, 'event_id' => null])->get();
        if(!$videos){
            return back();
        }


        return view('PremiumQuiz.index-st3-vid')->with('videos', $videos)
            ->with('topic', $topic_name)
            ->with('topic_id', $topic_id)
            ->with('package_id', $package_id)
            ->with('topic_type', $topic_type);
    }

    public function event_vid(Request $request, $event_id, $topic, $topic_id__, $video_id__){
        $locale = new Locale;

        /**
         * Confidentiality: authenticated
         */
        if (!Auth::check()) {
            return back();
        }


        $thisUser = Auth::user();

        /**
         * GET Event FUll Data
         * Confidentiality: user have the package
         */

        $userEvent = DB::table('event_user')
            ->where('event_user.user_id', '=', $thisUser->id)
            ->where('event_user.event_id', '=', $event_id)
            ->join('events', 'event_user.event_id', '=', 'events.id')
            ->join('courses', 'events.course_id', '=', 'courses.id')
            ->leftJoin(DB::raw('(SELECT * FROM ratings WHERE user_id='.Auth::user()->id.' AND event_id='.$event_id.' LIMIT 1) AS ratings'),
                'event_user.event_id', '=', 'ratings.event_id')
            // ->leftJoin(DB::raw('(SELECT * FROM video_progresses WHERE user_id='.Auth::user()->id.' GROUP BY video_id) AS video_progresses'),
            //     'user_packages.package_id','=','video_progresses.package_id')
            ->leftJoin(DB::raw('(SELECT * FROM certifications WHERE user_id='.Auth::user()->id.' GROUP BY event_id) AS certifications'),
                'event_user.event_id', '=', 'certifications.event_id')
            ->select(
            // DB::raw('(SUM(CASE WHEN video_progresses.complete IS NULL THEN 0 ELSE video_progresses.complete END)) AS noCompletedVideos'),
                DB::raw('(CASE WHEN ratings.id IS NULL THEN 0 ELSE 1 END) AS userRatePackage'),
                DB::raw('ratings.rate AS thisUserRate'),
                DB::raw('ratings.review AS thisUserRateReview'),
                DB::raw('event_user.created_at AS haveEventSince'),
                'event_user.event_id',
                'events.name',
                'events.description',
                'events.what_you_learn',
                'events.who_course_for',
                'events.requirement',
                'events.course_id',
                DB::raw('(courses.title) AS course_title'),
                'events.total_time',
                'events.total_lecture',
                'events.start',
                'events.end',
                'events.expire_in_days',
                'events.certification',
                DB::raw('(certifications.id) AS certification_id')
            )->limit(1)
            ->groupBy('event_user.id')
            ->get()->first();


        /**
         * Not Expired
         */
        $expiration_date = Carbon::parse($userEvent->haveEventSince)->addDays($userEvent->expire_in_days);
        if(Carbon::now()->gt($expiration_date)){
            // it's expire
            return \Redirect::to(route('my.package.view'))->with('error', 'Event is No Longer Available.');
        }

        $eventModel = \App\Event::find($event_id);
        $eventModelTranscode = Transcode::evaluate($eventModel);

        if (!$userEvent) {
            return \redirect(route('user.dashboard'))->with('error', 'something went wrong');
        }

        /**
         * VideoProgress
         */
        if ($request->has('watched')) {
            $this->EventVideoComplete($event_id, $request->watched);
        }

        /**
         * GET All Videos FUll data
         */
        $chapters_inc_list = DB::table('chapters')
            ->where('course_id', $userEvent->course_id)
            ->get()->pluck('id')->toArray();

        if($locale->locale == 'en'){
            $eventVideos = DB::table('videos')
                ->whereIn('chapter', $chapters_inc_list)
                ->where('videos.event_id', $userEvent->event_id)
                ->leftJoin(DB::raw('(SELECT * FROM video_progresses WHERE event_id='.$event_id.' AND user_id='.$thisUser->id.' GROUP BY video_id) AS video_progresses'),
                    'videos.id','=','video_progresses.video_id')
                ->join('chapters', 'videos.chapter', '=', 'chapters.id')
                ->select(
                    DB::raw('videos.id AS video_id'),
                    DB::raw('videos.chapter AS chapter_id'),
                    DB::raw('chapters.name AS chapter_name'),
                    'videos.title',
                    'videos.chapter',
                    'videos.attachment_url',
                    'videos.duration',
                    'videos.vimeo_id',
                    DB::raw('(CASE WHEN video_progresses.complete IS NULL THEN 0 ELSE 1 END) AS watched'),
                    DB::raw('(video_progresses.updated_at) AS watched_at'),
                    'videos.index_z',
                    'wr_id',
                    'videos.cover_image'
                )
                ->orderBy('index_z')
                ->get();
        }

        if($locale->locale == 'ar'){
            $eventVideos = DB::table('videos')
                ->whereIn('chapter', $chapters_inc_list)
                ->where('videos.event_id', $userEvent->event_id)
                ->leftJoin(DB::raw('(SELECT * FROM video_progresses WHERE event_id='.$event_id.' AND user_id='.$thisUser->id.' GROUP BY video_id) AS video_progresses'),
                    'videos.id','=','video_progresses.video_id')
                ->join('chapters', 'videos.chapter', '=', 'chapters.id')
                ->leftJoin(DB::raw('(SELECT * FROM transcodes WHERE table_=\'chapters\') AS chapterTranscode'),
                    'chapters.id', '=', 'chapterTranscode.row_')
                ->leftJoin(DB::raw('(SELECT * FROM transcodes WHERE table_=\'videos\' AND column_=\'title\') AS videoTranscode'),
                    'videos.id', '=', 'videoTranscode.row_')
                ->select(
                    DB::raw('videos.id AS video_id'),
                    DB::raw('videos.chapter AS chapter_id'),
                    DB::raw('(CASE WHEN chapterTranscode.transcode IS NULL THEN chapters.name ELSE chapterTranscode.transcode END) AS chapter_name'),
                    DB::raw('(CASE WHEN videoTranscode.transcode IS NULL THEN videos.title ELSE videoTranscode.transcode END) AS title'),
                    'videos.chapter',
                    'videos.attachment_url',
                    'videos.duration',
                    'videos.vimeo_id',
                    DB::raw('(CASE WHEN video_progresses.complete IS NULL THEN 0 ELSE 1 END) AS watched'),
                    DB::raw('(video_progresses.updated_at) AS watched_at'),
                    'videos.index_z',
                    'wr_id',
                    'videos.cover_image'
                )
                ->orderBy('index_z')
                ->get();
        }


        $topic_id = $topic_id__;
        $video_id = $video_id__;

        if($topic_id__ == 0 && $video_id__ == 0){
            // check if the given data are correct ..
            /**
             * get latest video watched
             */
            $latest_video = null;
            for($i = 0; $i < count($eventVideos); $i++){
                if($eventVideos[$i]->watched_at){
                    if($latest_video){
                        if(\Carbon\Carbon::parse($eventVideos[$i]->watched_at)->gt($latest_video->watched_at)){
                            $latest_video = $eventVideos[$i];
                        }
                    }else{
                        $latest_video = $eventVideos[$i];
                    }
                }
            }

            if(!$latest_video){
                if(!count($eventVideos)){
                    return back()->with('error', 'No Content Available Yet !');
                }
                $latest_video = $eventVideos->first();
            }


            $topic_id = $latest_video->chapter_id;
            $video_id = $latest_video->video_id;

        }


        /**
         * GET Video Comments
         */
        $comments_id = \App\PageComment::where('page', '=', 'event'.$event_id.'video')->where('item_id', '=', $video_id)->pluck('comment_id')->toArray();
        $comments = \App\Comment::whereIn('id', $comments_id)->orderBy('created_at', 'desc')->get();


        /**
         * GENERATE each chapter FULL data
         */

        $eventChapters = [];
        $total_time = [0, 0, 0]; //[hr, min, sec]
        foreach($chapters_inc_list as $chapter_id){
            $thisChapterVideos = $eventVideos->filter(function($video)use($chapter_id){
                return $video->chapter_id == $chapter_id;
            });

            if(count($thisChapterVideos)){

                $x = (object)[];
                $x->id = $chapter_id;
                $x->name = $thisChapterVideos->first()->chapter_name;
                $x->total_hours = 0;
                $x->total_min = 0;
                $x->total_sec = 0;
                $x->total_time_toString = '';


                $x->videos = [];
                foreach($thisChapterVideos as $video){
                    if($video->duration != '' && $video->duration != null){

                        $x->total_min += \Carbon\Carbon::parse($video->duration)->format('i');
                        $x->total_sec += \Carbon\Carbon::parse($video->duration)->format('s');
                        if(\Carbon\Carbon::parse($video->duration)->format('h') != 12){
                            $x->total_hours += \Carbon\Carbon::parse($video->duration)->format('h');
                        }
                    }

                    array_push($x->videos, $video);
                }

                $x->total_time_toString = \Carbon\Carbon::create(2012, 1, 1, 0, 0, 0)->addHours($x->total_hours)->addMinutes($x->total_min)->addSeconds($x->total_sec)->format('H:i:s');

                $total_time[0] += $x->total_hours;
                $total_time[1] += $x->total_min;
                $total_time[2] += $x->total_sec;

                array_push($eventChapters, $x);

            }
        }

        $total_time[1] += $total_time[2]/60;
        $total_time[2] = round($total_time[2]%60);

        $total_time[0] += $total_time[1]/60;
        $total_time[1] = round($total_time[1]%60);
        $total_time[0] = round($total_time[0]);

        $video = $eventVideos->filter(function($video)use($video_id){return $video->video_id == $video_id;})->first();

        if(!$video){
            return \redirect(route('user.dashboard'))->with('error', 'Something went wrong !');
        }


        $chapter_id = $video->chapter_id;

        $next_video = $eventVideos->filter(function($row)use($video){
            return $row->chapter_id == $video->chapter_id && $row->index_z > $video->index_z;
        })->first();

        if(!$next_video){
            // check if their is a chapter next !
            // $chapters_inc

            // $key = in_array($chapter_id, $chapters_inc_list);
            $key = $this->findItem($chapter_id, $chapters_inc_list);

            if( ($key + 1) == count($chapters_inc_list) || $key == -1){
                $next_video = null;
            }else{
                $chapter_id = $chapters_inc_list[$key+1];

                $next_video = $eventVideos->filter(function($row)use($chapter_id){
                    return $row->chapter_id == $chapter_id;
                })->first();
            }

        }

        $noCompletedVideos = DB::table('video_progresses')
            ->where('user_id', $thisUser->id)
            ->where('event_id', $userEvent->event_id)
            ->where('complete', 1)
            ->select(DB::raw('(COUNT(*)) AS count'))->get()->first()->count;

        $percentage = round($noCompletedVideos/count($eventVideos) * 100);



        return view('PremiumQuiz.index-st4-vid-Event')
            ->with('chapter_id', $topic_id)
            ->with('topic_id', $topic_id)
            ->with('topic', $topic)
            ->with('video', $video)
            ->with('comments', $comments)
            ->with('package', $userEvent)
            ->with('chapters', $eventChapters)
            ->with('percentage', $percentage)
            ->with('noCompletedVideos', $noCompletedVideos)
            ->with('noTotalVideos', count($eventVideos))
            ->with('next_video', $next_video)
            ->with('total_time', $total_time)
            ->with('event', $eventModel)
            ->with('eventModelTranscode', $eventModelTranscode);

    }

    public function is_package_expiredV3($package_id, $have_package_since, $package_expire_in_days /** row include userPackage data[id, ..,created_at] and some data of the package itself */){
        if(\Carbon\Carbon::parse($have_package_since)->addDays($package_expire_in_days)->gte(\Carbon\Carbon::now())){ // original package still not expired
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



    public function restVideosProgress($package_id){
        $thisUser = Auth::user();
        if(!$thisUser){
            return back()->with('error', 'Something went wrong');
        }

        DB::table('video_progresses')
            ->where('user_id', $thisUser->id)
            ->where('package_id', $package_id)
            ->delete();

        return \Redirect::to(route('st4_vid', [$package_id, 'chapter', 0, 0]));

    }

    public function completeVideosProgress($package_id){
        $thisUser = Auth::user();
        $userPackages = DB::table('user_packages')
            ->where('user_packages.user_id', '=', $thisUser->id)
            ->where('user_packages.package_id', '=', $package_id)
            ->join('packages', 'user_packages.package_id', '=', 'packages.id')
            ->select(
                'packages.chapter_included'
            )->limit(1)
            ->groupBy('user_packages.id')
            ->get()->first()->chapter_included;

        $chapters_inc_list = explode(',', $userPackages);

        $packageVideos = DB::table('videos')
            ->whereIn('chapter', $chapters_inc_list)
            ->whereNull('videos.event_id')
            ->leftJoin(DB::raw('(SELECT * FROM video_progresses WHERE package_id='.$package_id.' AND user_id='.$thisUser->id.' GROUP BY video_id) AS video_progresses'),
                'videos.id','=','video_progresses.video_id')
            ->select(
                DB::raw('videos.id AS video_id'),
                DB::raw('(video_progresses.complete) AS watched'),
                DB::raw('(video_progresses.updated_at) AS watched_at'),
                'videos.index_z'
            )
            ->orderBy('index_z')
            ->get();

        $toBeUpdated = $packageVideos->filter(function($row){
            return $row->watched === 0;
        })->pluck(['video_id']);
        $toBeInserted = $packageVideos->filter(function($row){
            return $row->watched === null;
        })->pluck(['video_id']);

        $toBeInsertedStructured = [];

        if(count($toBeUpdated)){
            DB::table('video_progresses')
                ->where('user_id', $thisUser->id)
                ->where('package_id', $package_id)
                ->whereIn('video_id', $toBeUpdated)
                ->update(['complete' => 1]);
        }

        if(count($toBeInserted)){
            foreach($toBeInserted as $video_id){
                $j = [];
                $j['video_id'] = $video_id;
                $j['package_id'] = $package_id;
                $j['user_id'] = $thisUser->id;
                $j['complete'] = 1;
                array_push($toBeInsertedStructured, $j);
            }
            DB::table('video_progresses')
                ->insert($toBeInsertedStructured);

        }
        return back();

    }


    public function st4_vid(Request $request, $package_id, $topic, $topic_id__, $video_id__)
    {
        $locale = new Locale();

        /**
         * (package, user_package | ,package_videos, videos_videosProgress, videos_comments)
         */

        /**
         * Confidentiality: authenticated
         */
        if (!Auth::check()) {
            return back();
        }
        
        $thisUser = Auth::user();

        /**
         * GET Package FUll Data
         * Confidentiality: user have the package
         */
        $userPackages = DB::table('user_packages')
            ->where('user_packages.user_id', '=', Auth::user()->id)
            ->where('user_packages.package_id', '=', $package_id)
            ->join('packages', 'user_packages.package_id', '=', 'packages.id')
            ->leftJoin(DB::raw('(SELECT * FROM ratings WHERE user_id='.Auth::user()->id.' AND package_id='.$package_id.' LIMIT 1) AS ratings'),
                'user_packages.package_id', '=', 'ratings.package_id')
            // ->leftJoin(DB::raw('(SELECT * FROM video_progresses WHERE user_id='.Auth::user()->id.' GROUP BY video_id) AS video_progresses'),
            //     'user_packages.package_id','=','video_progresses.package_id')
            ->leftJoin(DB::raw('(SELECT * FROM certifications WHERE user_id='.Auth::user()->id.' GROUP BY package_id) AS certifications'),
                'user_packages.package_id', '=', 'certifications.package_id')
            ->select(
                // DB::raw('(SUM(CASE WHEN video_progresses.complete IS NULL THEN 0 ELSE video_progresses.complete END)) AS noCompletedVideos'),
                DB::raw('(CASE WHEN ratings.id IS NULL THEN 0 ELSE 1 END) AS userRatePackage'),
                DB::raw('ratings.rate AS thisUserRate'),
                DB::raw('ratings.review AS thisUserRateReview'),
                DB::raw('user_packages.created_at AS havePackageSince'),
                'user_packages.package_id',
                'packages.name',
                'packages.description',
                'packages.chapter_included',
                'packages.expire_in_days',
                'packages.what_you_learn',
                'packages.requirement',
                'packages.who_course_for',
                'packages.certification',
                DB::raw('(certifications.id) AS certification_id')
            )->limit(1)
            ->groupBy('user_packages.id')
            ->get()->first();

        $packageModel = \App\Models\Package\Packages::find($package_id);
        $packageModelTranscode = Transcode::evaluate($packageModel);
        
        /**
         * Confidentiality: package not expired
         */

        if($this->is_package_expiredV3($userPackages->package_id, $userPackages->havePackageSince, $userPackages->expire_in_days)){
            return \Redirect::to(route('user.dashboard'))->with('error', 'This package is expired !');
        }

        /**
         * VideoProgress
         */
        if ($request->has('watched')) {
            $this->VideoComplete($package_id, $request->watched);
        }

        $chapters_inc_list = explode(',',$userPackages->chapter_included);

        /**
         * GET All Videos FUll data
         */
        if($locale->locale == 'en'){
            $packageVideos = DB::table('videos')
                ->whereIn('chapter', $chapters_inc_list)
                ->whereNull('videos.event_id')
                ->leftJoin(DB::raw('(SELECT * FROM video_progresses WHERE package_id='.$package_id.' AND user_id='.Auth::user()->id.' GROUP BY video_id) AS video_progresses'),
                    'videos.id','=','video_progresses.video_id')
                ->join('chapters', 'videos.chapter', '=', 'chapters.id')
                ->leftJoin('materials', 'videos.attachment_url', '=', 'materials.file_url')
                ->select(
                    DB::raw('videos.id AS video_id'),
                    DB::raw('videos.chapter AS chapter_id'),
                    DB::raw('chapters.name AS chapter_name'),
                    'videos.title',
                    'videos.chapter',
                    'videos.attachment_url',
                    DB::raw('(materials.id) AS attachment_id'),
                    'videos.duration',
                    'videos.vimeo_id',
                    DB::raw('(CASE WHEN video_progresses.complete IS NULL THEN 0 ELSE 1 END) AS watched'),
                    DB::raw('(video_progresses.updated_at) AS watched_at'),
                    'videos.index_z',
                    'wr_id',
                    'videos.cover_image'
                )
                ->orderBy('index_z')
                ->get();
        }
        if($locale->locale == 'ar'){
            $packageVideos = DB::table('videos')
                ->whereIn('chapter', $chapters_inc_list)
                ->whereNull('videos.event_id')
                ->leftJoin(DB::raw('(SELECT * FROM video_progresses WHERE package_id='.$package_id.' AND user_id='.Auth::user()->id.' GROUP BY video_id) AS video_progresses'),
                    'videos.id','=','video_progresses.video_id')
                ->join('chapters', 'videos.chapter', '=', 'chapters.id')

                ->leftJoin(DB::raw('(SELECT * FROM transcodes WHERE table_=\'chapters\') AS chapterTranscode'),
                    'chapters.id', '=', 'chapterTranscode.row_')
                ->leftJoin(DB::raw('(SELECT * FROM transcodes WHERE table_=\'videos\' AND column_=\'title\') AS videoTranscode'),
                    'videos.id', '=', 'videoTranscode.row_')

                ->leftJoin('materials', 'videos.attachment_url', '=', 'materials.file_url')

                ->select(
                    DB::raw('videos.id AS video_id'),
                    DB::raw('videos.chapter AS chapter_id'),
                    DB::raw('(CASE WHEN chapterTranscode.transcode IS NULL THEN chapters.name ELSE chapterTranscode.transcode END) AS chapter_name'),
                    DB::raw('(CASE WHEN videoTranscode.transcode IS NULL THEN videos.title ELSE videoTranscode.transcode END) AS title'),
//                    'videos.title',
                    'videos.chapter',
                    'videos.attachment_url',
                    DB::raw('(materials.id) AS attachment_id'),
                    'videos.duration',
                    'videos.vimeo_id',
                    DB::raw('(CASE WHEN video_progresses.complete IS NULL THEN 0 ELSE 1 END) AS watched'),
                    DB::raw('(video_progresses.updated_at) AS watched_at'),
                    'videos.index_z',
                    'wr_id',
                    'videos.cover_image'
                )
                ->orderBy('index_z')
                ->get();

        }




        $topic_id = $topic_id__;
        $video_id = $video_id__;

        if($topic_id__ == 0 && $video_id__ == 0){
            // check if the given data are correct ..
            /**
             * get latest video watched
             */
            $latest_video = null;
            for($i = 0; $i < count($packageVideos); $i++){
                if($packageVideos[$i]->watched_at){
                    if($latest_video){
                        if(\Carbon\Carbon::parse($packageVideos[$i]->watched_at)->gt($latest_video->watched_at)){
                            $latest_video = $packageVideos[$i];
                        }
                    }else{
                        $latest_video = $packageVideos[$i];
                    }
                }
            }

            if(!$latest_video){
                $latest_video = $packageVideos->first();
            }


            $topic_id = $latest_video->chapter_id;
            $video_id = $latest_video->video_id;

        }

        /**
         * GET Video Comments
         */
        $videoComments = DB::table('page_comments')
            ->where('page', '=', 'video')
            ->where('item_id', '=', $video_id)
            ->join('comments', 'page_comments.comment_id', '=', 'comments.id')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->leftJoin('replies', 'page_comments.comment_id', '=', 'replies.reply_to_id')
            ->select(

                'comments.user_id',
                'users.name',
                'user_details.profile_pic',
                DB::raw('comments.id AS comment_id'),
                DB::raw('comments.contant AS comment'),
                'comments.created_at',
                DB::raw('replies.id AS reply_id'),
                DB::raw('(SELECT users.name FROM users WHERE users.id = (SELECT comments.user_id FROM comments WHERE comments.id = replies.comment_id LIMIT 1)) AS reply_name'),
                DB::raw('(SELECT user_details.profile_pic FROM user_details WHERE user_details.user_id = (SELECT comments.user_id FROM comments WHERE comments.id = replies.comment_id LIMIT 1)) AS reply_profile_pic'),
                DB::raw('(SELECT comments.contant FROM comments WHERE comments.id = replies.comment_id LIMIT 1) AS reply_comment'),
                DB::raw('(SELECT comments.created_at FROM comments WHERE comments.id = replies.comment_id LIMIT 1) AS reply_created_at')
            )
            ->orderBy('created_at', 'asc')
            ->get()->groupBy('comment_id');
        /**
         * GENERATE each chapter FULL data
         */
        $packageChapters = [];
        $total_time = [0, 0, 0]; //[hr, min, sec]
        foreach($chapters_inc_list as $chapter_id){

            $thisChapterVideos = $packageVideos->filter(function($video)use($chapter_id){
                return $video->chapter_id == $chapter_id;
            });

            if(count($thisChapterVideos)){

                $x = (object)[];
                $x->id = $chapter_id;
                $x->name = $thisChapterVideos->first()->chapter_name;
                $x->total_hours = 0;
                $x->total_min = 0;
                $x->total_sec = 0;
                $x->total_time_toString = '';
                $x->videos = [];

                foreach($thisChapterVideos as $video){
                    if($video->duration != '' && $video->duration != null){

                        $x->total_min += \Carbon\Carbon::parse($video->duration)->format('i');
                        $x->total_sec += \Carbon\Carbon::parse($video->duration)->format('s');
                        if(\Carbon\Carbon::parse($video->duration)->format('h') != 12){
                            $x->total_hours += \Carbon\Carbon::parse($video->duration)->format('h');
                        }
                    }

                    array_push($x->videos, $video);
                }

                $x->total_time_toString = \Carbon\Carbon::create(2012, 1, 1, 0, 0, 0)->addHours($x->total_hours)->addMinutes($x->total_min)->addSeconds($x->total_sec)->format('H:i:s');

                $total_time[0] += $x->total_hours;
                $total_time[1] += $x->total_min;
                $total_time[2] += $x->total_sec;

                array_push($packageChapters, $x);

            }

        }

        $total_time[1] += $total_time[2]/60;
        $total_time[2] = round($total_time[2]%60);

        $total_time[0] += $total_time[1]/60;
        $total_time[1] = round($total_time[1]%60);
        $total_time[0] = round($total_time[0]);


        


        $video = $packageVideos->filter(function($video)use($video_id){return $video->video_id == $video_id;})->first();

        if(!$video){
            return \redirect(route('index'))->with('error', 'Something went wrong !');
        }
        
        $watch_link = null;
        // if($video->wr_id){
        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, 'https://whitereflect.com/api/v1/watch/'.$video->wr_id.'?key_id='.$thisUser->id);
        //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //         'Authorization: Bearer '.env('WR_TOKEN'),
        //         'Content-Type: application/json',
        //         'Accept: application/json'
        //     ));
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //     $output = curl_exec($ch);
        //     $output = json_decode($output);
            
        //     $watch_link = $output->link;
        // }

        // check videos in the same chapter
        $chapter_id = $video->chapter_id;

        $next_video = $packageVideos->filter(function($row)use($video){
            return $row->chapter_id == $video->chapter_id && $row->index_z > $video->index_z;
        })->first();

        if(!$next_video){
            // check if their is a chapter next !
            // $chapters_inc
            
            // $key = in_array($chapter_id, $chapters_inc_list);
            $key = $this->findItem($chapter_id, $chapters_inc_list);
            
            if( ($key + 1) == count($chapters_inc_list) || $key == -1){
                $next_video = null;
            }else{
                $chapter_id = $chapters_inc_list[$key+1];

                $next_video = $packageVideos->filter(function($row)use($chapter_id){
                    return $row->chapter_id == $chapter_id;
                })->first();
            }

        }

        $noCompletedVideos = DB::table('video_progresses')
            ->where('user_id', $thisUser->id)
            ->where('package_id', $userPackages->package_id)
            ->where('complete', 1)
            ->select(DB::raw('(COUNT(*)) AS count'))->get()->first()->count;

        $percentage = round($noCompletedVideos/count($packageVideos) * 100);


        return view('PremiumQuiz.index-st4-vid')
            ->with('chapter_id', $topic_id)
            ->with('topic_id', $topic_id)
            ->with('video', $video)
            ->with('comments', $videoComments)
            ->with('package', $userPackages)
            ->with('chapters', $packageChapters)
            ->with('percentage', $percentage)
            ->with('noCompletedVideos', $noCompletedVideos)
            ->with('noTotalVideos', count($packageVideos))
            ->with('next_video', $next_video)
            ->with('total_time', $total_time)
            ->with('packageModelTranscode', $packageModelTranscode)
            ->with('watch_link', $watch_link);

    }


    public function findItem($item, $array){
        $index = 0;
        foreach($array as $i){
            if($item == $i){
                return $index;
            }
            $index++;
        }
        return -1;
    }


    /**
     * save answers and continue later :D
     */


    public function SaveAnswersForLaterOn(Request $req){

        
        $quiz = \App\Quiz::where('user_id', '=', Auth::user()->id)
                         ->where('package_id', '=', $req->input('package'))
                         ->where('topic_type', '=', $req->input('topic'))
                         ->where('topic_id', '=', $req->input('topic_id'))
                         ->where('complete', '=', 0)->get()->first();
        
        if(!$quiz){
            // create new quiz !
            $quiz = new \App\Quiz;
            $quiz->user_id = Auth::user()->id;
            $quiz->package_id = $req->input('package');
            $quiz->topic_id = $req->input('topic_id');
            $quiz->topic_type    = $req->input('topic');
            
            $quiz->time_left    = $req->input('time_left'); // how much time did user take in seconds
            
            $quiz->answered_question_number = 0;
            $quiz->questions_number = $req->input('questions_number');  //user it first time only !
            $quiz->start_part = $req->input('start_from_');
            $quiz->save();
            
        }            
        
        
        
        
        // store ones answer
        $answer = \App\ActiveAnswer::where('question_id', '=', $req->input('question_id'))
                                ->where('quiz_id', '=', $quiz->id)->get()->first();
        if(!$answer){
            $answer = new \App\ActiveAnswer;
            $answer->quiz_id = $quiz->id;
            $answer->question_id = $req->input('question_id');
        }
        $answer->user_answer = $req->input('user_answer');
        if($req->input('flaged')){
            $answer->flaged = 1;
        }else{
            $answer->flaged = 0;
        }

        $answer->save();


        // update quiz answered question number 
        $answers_number = count(\App\ActiveAnswer::where('quiz_id', '=', $quiz->id)->get());
        $quiz->answered_question_number = $answers_number;
        $quiz->time_left += $req->input('time_left');
        $quiz->save();

        return $quiz->id;

    }

    public function QuizHistoryShow(Locale $locale){
        $quizzes = \App\Quiz::where('user_id', '=',  Auth::user()->id)->where('complete','=', 1)->orderBy('created_at', 'desc')->paginate(25);
        return view('QuizHistory.show')->with('quizzes', $quizzes);
    }
    

    public function material_show($course_id){
        $locale = new Locale();
        // check if user is subjected to this course
        $has = 0;
        $userPackages = \App\UserPackages::where('user_id', '=', Auth::user()->id)->get();
        if($userPackages){
            foreach($userPackages as $i){
                $package = \App\Models\Package\Packages::find($i->package_id);
                if($package->course_id == $course_id && ($package->contant_type == 'combined' || $package->contant_type == 'video') ){
                    $has = 1;
                    break;
                }
            }
        }

        if(!$has){
            return back()->with('error','You are not enrolled in this course !');
        }

        return view('user.material')->with('course_id', $course_id);
    }

    public function download_material($id){
        $m= \App\Material::find($id);
        if($m){
            return response()->download(storage_path('app/'.$m->file_url), $m->title.'-'.$m->created_at.'.'.pathinfo($m->file_url, PATHINFO_EXTENSION));
        }else{
            return 'error';
        }
    }

    public function studyPlan_show($id){
        $locale = new Locale();
        // course id -> $id
        $comments_id = \App\PageComment::where('page', '=', 'study_plan')->where('item_id', '=', $id)->pluck('comment_id')->toArray();
        $comments = \App\Comment::whereIn('id', $comments_id)->orderBy('created_at', 'desc')->get();

        $plans = \App\StudyPlan::where('course_id', '=', $id)->orderBy('created_at', 'desc')->get();
        return view('user.studyPlan')->with('plans', $plans)->with('comments', $comments)->with('id', $id);
    }

    public function flashCard_index(Locale $locale){
        return view('flashCard.index');
    }
    
    public function flashCard_show($id){
        $comments_id = \App\PageComment::where('page', '=', 'flashcard')->where('item_id', '=', $id)->pluck('comment_id')->toArray();
        $comments = \App\Comment::whereIn('id', $comments_id)->orderBy('created_at', 'desc')->get();

        return view('flashCard.show')->with('flashCard', \App\FlashCard::find($id))->with('comments', $comments);
    }

    public function faq_index(Locale $locale){
        $comments_id = \App\PageComment::where('page', '=', 'faq')->where('item_id', '=', 1)->pluck('comment_id')->toArray();
        $comments = \App\Comment::whereIn('id', $comments_id)->orderBy('created_at', 'desc')->get();
        return view('faq.index')->with('comments', $comments)->with('id',1);
    }

    public function VideoComplete($package_id, $video_id){
        $complete = \App\VideoProgress::where('user_id', Auth::user()->id)->where('package_id', $package_id)->where('video_id', $video_id)->get()->first();
        if(!$complete){
            $complete= new \App\VideoProgress;
            $complete->user_id = Auth::user()->id;
            $complete->package_id = $package_id;
            $complete->video_id =  $video_id;
            $complete->complete = 1;
            $complete->save();
        }
        $complete->complete = 1;
        $complete->save();
    }

    public function EventVideoComplete($event_id, $video_id){
        $complete = \App\VideoProgress::where('user_id', Auth::user()->id)->where('event_id', $event_id)->where('video_id', $video_id)->get()->first();
        if(!$complete){
            $complete= new \App\VideoProgress;
            $complete->user_id = Auth::user()->id;
            $complete->event_id = $event_id;
            $complete->video_id =  $video_id;
            $complete->complete = 1;
            $complete->save();
        }
        $complete->complete = 1;
        $complete->save();
    }

    public function feedback_index(Locale $locale){
        return view('user.feedback');
    }

    public function feedback_store(Request $req){
        $this->validate($req, [
            'rate' => 'numeric|required',
            'title' => 'required',
            'feedback'  =>  'required'
        ]);

        

        $f = new \App\Feedback;
        $f->feedback = $req->input('feedback');
        $f->user_id = Auth::user()->id;
        $f->title = $req->input('title');
        $f->rate = $req->input('rate');
        $f->save();

        return back()->with('success', 'feedback sent .');
    }

    public function feedback_delete($id){
        $feed = \App\Feedback::find($id);

        if($feed){
            if($feed->user_id == Auth::user()->id){
                $feed->disable = 1;
                $feed->save();

                return back()->with('success', 'Feedback deleted.');
            }else{
                return back()->with('error');    
            }
        }else{
            return back()->with('error');
        }
    }

    public function rate(Request $req){
        if($req->has('package_id')) {

            $rate = \App\Rating::where('user_id', Auth::user()->id)->where('package_id', $req->input('package_id'))->get()->first();
            if (!$rate) {
                $rate = new \App\Rating;
            }

            $rate->user_id = Auth::user()->id;
            $rate->package_id = $req->input('package_id');
            $rate->rate = $req->input('rate');
            $rate->save();


        }else if($req->has('event_id')){
            $rate = \App\Rating::where('user_id', Auth::user()->id)->where('event_id', $req->input('event_id'))->get()->first();
            if (!$rate) {
                $rate = new \App\Rating;
            }

            $rate->user_id = Auth::user()->id;
            $rate->event_id = $req->input('event_id');
            $rate->rate = $req->input('rate');
            $rate->save();
        }
        return 0;
    }

    public function storeReview(Request $req){
        if($req->has('package_id')){
            $rate = \App\Rating::where('user_id', Auth::user()->id)->where('package_id', $req->input('package_id'))->get()->first();
            if($rate){
                $rate->review = $req->input('user_review');
                $rate->save();
            }
        }else if($req->has('event_id')){
            $rate = \App\Rating::where('user_id', Auth::user()->id)->where('event_id', $req->input('event_id'))->get()->first();
            if($rate){
                $rate->review = $req->input('user_review');
                $rate->save();
            }
        }

        return 0;
    }



    public function myPackages_view(Locale $locale){

        $UserPackage = DB::table('user_packages')
            ->where('user_packages.user_id', '=', Auth::user()->id)
            ->join('packages', 'user_packages.package_id', '=', 'packages.id')
            ->leftJoin('ratings', 'user_packages.package_id', '=', 'ratings.package_id')
            ->join('courses', 'packages.course_id', '=', 'courses.id')
            ->select(
                'packages.*',
                'user_packages.*',
                DB::raw('AVG(ratings.rate) AS rating'), // created_at belongs to user_packages table
                DB::raw('courses.title AS course_title'),
                'courses.title AS course_title'
            )
            ->groupBy('user_packages.id')
            ->get();

        $expired_exam_package_list = [];
        $expired_video_package_list = [];
        /**
         * Working with question Package
         */
        $exam_package_list_ = $UserPackage->filter(function($row){
            return ($row->contant_type == 'question' || $row->contant_type == 'combined');
        });

        
        $exam_package_list_by_course = [];
        $exam_courses = [];
        foreach($exam_package_list_ as $package){
            if(!in_array($package->course_title, $exam_courses)){
                array_push($exam_courses, $package->course_title);
            }

            $i = (object)[];
            $i->package = $package;
            $i->meta_data = [];

            $chapter_included = [0];
            if($package->chapter_included){
                $chapter_included = explode(',', $package->chapter_included);
            }
            $process_group_included = [0];
            if($package->process_group_included){
                $process_group_included = explode(',', $package->process_group_included);
            }
            $exams = [0];
            if($package->exams){
                $exams = explode(',', $package->exams);
            }

            Cache::forget('package'.$package->package_id.'QuestionsNumber');
            $packageQuestionsNumber = Cache::remember('package'.$package->package_id.'QuestionsNumber', 1440, function()use($chapter_included, $process_group_included, $exams){
                // return DB::table('questions')
                //     ->whereIn('questions.chapter', $chapter_included)
                //     ->orWhere(function($q)use($process_group_included){
                //         $q->whereIn('questions.process_group', $process_group_included);
                //     })
                //     ->orWhere(function($q)use($exams){
                //         foreach($exams as $exam){
                //             $q->orWhere('questions.exam_num', 'LIKE', '%'.$exam.'%');
                //         }
                //     })
                //     ->select(DB::raw('COUNT(*) AS question_number'))
                //     ->first()->question_number;
                $chapter = DB::table('questions')
                    ->whereIn('questions.chapter', $chapter_included)->get()->count();
                $process = DB::table('questions')
                    ->whereIn('questions.process_group', $process_group_included)->get()->count();
                $exam = DB::table('questions')
                    ->where(function($q)use($exams){
                        foreach($exams as $exam){
                            $q->orWhere('questions.exam_num', 'LIKE', '%'.$exam.'%');
                        }
                    })
                    ->get()->count();
                    
                return $chapter + $process + $exam;
                
            });


            $i->meta_data['packageQuestionsNumber'] = $packageQuestionsNumber;
            $i->meta_data['packageExamsNumber'] = count($chapter_included) + count($process_group_included)+ count($exams);
            $i->meta_data['expire_date'] = $this->packageNotExpired($package);
            if($this->packageNotExpired($package)){
                if(!array_key_exists($package->course_id, $exam_package_list_by_course)){
                    $exam_package_list_by_course[$package->course_id] = [];
                }
                array_push($exam_package_list_by_course[$package->course_id], $i);

            }else{
                array_push($expired_exam_package_list, $i);
            }


        }
        /**
         * End of Questions package
         */
         
        
        

        /**
         * Working with Video Package
         */
        $video_package_list_ = $UserPackage->filter(function($row){
            return ($row->contant_type == 'video' || $row->contant_type == 'combined');
        });
        $video_package_list_by_course = [];
        $video_courses = [];
        foreach($video_package_list_ as $package) {
            if (!in_array($package->course_title, $video_courses)) {
                array_push($video_courses, $package->course_title);
            }

            $i = (object)[];
            $i->package = $package;
            $i->meta_data = [];
            $i->meta_data['no_of_completed_lectures'] = 0;
            $i->meta_data['no_of_lectures'] = 0;

            $total_min = 0;
            $total_sec = 0;
            $total_hours = 0;

            $chapter_included = [0];
            if($package->chapter_included){
                $chapter_included = explode(',', $package->chapter_included);
            }


            $packageVideos = DB::table('videos')
                ->whereIn('chapter', $chapter_included)
                ->whereNull('videos.event_id')
                ->leftJoin(
                    DB::raw('(select * from video_progresses where user_id='.$package->user_id.' AND package_id='.$package->package_id.' GROUP BY video_id) AS video_progresses'),
                    'video_progresses.video_id', '=', 'videos.id')
                ->select(
                    'videos.duration',
                    DB::raw('video_progresses.complete AS watched')
                )
                ->get();



            $i->meta_data['no_of_lectures'] = count($packageVideos);

            foreach($packageVideos as $v){
                if($v->watched){
                    $i->meta_data['no_of_completed_lectures']++;
                }
                if($v->duration != '' && $v->duration != null){
                    $total_min += \Carbon\Carbon::parse($v->duration)->format('i');
                    $total_sec += \Carbon\Carbon::parse($v->duration)->format('s');
                    if(\Carbon\Carbon::parse($v->duration)->format('h') != 12){
                        $total_hours += \Carbon\Carbon::parse($v->duration)->format('h');
                    }

                }
            }

            $total_min += floor($total_sec / 60);
            $total_sec = $total_sec % 60;

            $total_hours += floor($total_min / 60);
            $total_min = $total_min % 60;

            $i->meta_data['packageTime'] = [round($total_hours), round($total_min), round($total_sec)];
            $i->meta_data['expire_date'] = $this->packageNotExpired($package);
            $i->meta_data['progress'] = $this->progress($i->meta_data['no_of_completed_lectures'], $i->meta_data['no_of_lectures']);

            if($this->packageNotExpired($package)){
                if(!array_key_exists($package->course_id, $video_package_list_by_course)){
                    $video_package_list_by_course[$package->course_id] = [];
                }
                array_push($video_package_list_by_course[$package->course_id], $i);
            }else{
                array_push($expired_video_package_list, $i);
            }




        }
        
        // dd($video_package_list_by_course, $video_courses);
        /**
         * End of Questions package
         */

        /**
         * Working with Events
         */
        $userEvents = DB::table('event_user')
            ->where('event_user.user_id', '=', Auth::user()->id)
            ->join('events', 'event_user.event_id', '=', 'events.id')
            ->leftJoin('ratings', 'event_user.event_id', '=', 'ratings.event_id')
            ->join('courses', 'events.course_id', '=', 'courses.id')
            ->select(
                'event_user.*',
                'events.*',
                DB::raw('AVG(ratings.rate) AS rating'), // created_at belongs to user_packages table
                DB::raw('courses.title AS course_title'),
                'courses.title AS course_title'
            )
            ->groupBy('event_user.id')
            ->get();
            
            // dd($userEvents);
        
        // dd($expired_video_package_list);
        return view('user/myPackage')
            ->with('exam_courses', $exam_courses)
            ->with('exam_package_list_by_course', $exam_package_list_by_course)
            ->with('video_courses', $video_courses)
            ->with('video_package_list_by_course', $video_package_list_by_course)
            ->with('userEvents', $userEvents)
            ->with('expired_exam_package_list', $expired_exam_package_list)
            ->with('expired_video_package_list', $expired_video_package_list);
    }

    // 0 => expired
    // 1 => active

    public function packageNotExpired($userPackage /** row include userPackage data[id, ..,created_at] and some data of the package itself */){
        if(!$userPackage){
            return 0;
        }

        if(\Carbon\Carbon::parse($userPackage->created_at)->addDays($userPackage->expire_in_days)->gte(\Carbon\Carbon::now())){ // original package still not expired
            return \Carbon\Carbon::parse(   $userPackage->created_at    )->addDays($userPackage->expire_in_days)->toFormattedDateString();

        }else{
            $extension = \App\PackageExtension::where('user_id', '=', Auth::user()->id)->where('package_id', '=', $userPackage->package_id)->orderBy('expire_at', 'desc')->first();
            if(!$extension){
                return  0;

            }else{
                
                if(\Carbon\Carbon::parse($extension->expire_at)->gte(\Carbon\Carbon::now())){
                    
                    return \Carbon\Carbon::parse( $extension->expire_at )->toFormattedDateString();

                }else{

                    return 0;
                }
            }
        }

    }

    public function progress($part, $all){
        if($all == 0){
            return 0;
        }
        return $part/$all *100;
    }
}

