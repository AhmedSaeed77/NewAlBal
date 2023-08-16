<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Package\Packages;
use App\UserPackages;
use App\QuestionRoles;
use App\Question;
use App\Process_group;
use Illuminate\Support\Facades\DB;


class API_PremiumQuizController extends Controller
{
    public function faq(){
        $faq = \App\FAQ::orderBy('created_at', 'desc')->get()->toArray();
        return response()->json($faq, 200);
    }

    /**
     * return my study material
     */
    public function studyMaterial(){

        $myCourses = [];
        $myPackages = \App\UserPackages::where('user_id', Auth::user()->id)->get();
        foreach($myPackages as $item){
            $package = \App\Models\Package\Packages::find($item->package_id);

            if(!in_array($package->course_id, $myCourses)){
                array_push($myCourses, $package->course_id);
            }
        }

        $materials_arr = [];
        foreach($myCourses as $course_id){
            $materials = \App\Material::where('course_id', $course_id)->get();
            $materials_arr_item = (object)[];
            $materials_arr_item->course = (object)[];
            $materials_arr_item->course->id = $course_id;
            $materials_arr_item->course->title = \App\Course::find($course_id)->title;
            $materials_arr_item->materials = [];
            foreach($materials as $m){
                $i = [
                    'title' => $m->title,
                    'url'   => url('storage/material/'.basename($m->file_url))
                ];
                array_push($materials_arr_item->materials, $i);
            }

            array_push($materials_arr, $materials_arr_item);
        }

        return response()->json($materials_arr, 200);



    }

    /**
     * @param $package_id
     * @param $topic
     * @param $topic_id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeAnswer(Request $request){

        $package_id = $request->package_id;
        $topic = $request->topic;
        $topic_id = $request->topic_id;


        $questions_number = $request->questions_number;
        $period_of_time = $request->period_of_time_taken;
        $question_id = $request->question_id;
        $question_answer = $request->question_answer;



        $quiz = \App\Quiz::where('user_id', '=', Auth::user()->id)
            ->where('package_id', '=', $package_id)
            ->where('topic_type', '=', $topic)
            ->where('topic_id', '=', $topic_id)
            ->where('complete', '=', 0)->get()->first();

        if(!$quiz){
            // create new quiz !
            $quiz = new \App\Quiz;
            $quiz->user_id = Auth::user()->id;
            $quiz->package_id = $package_id;
            $quiz->topic_id = $topic_id;
            $quiz->topic_type    = $topic;
            $quiz->time_left    = $period_of_time; // how much time did user take in seconds

            $quiz->answered_question_number = 0;
            $quiz->questions_number = $questions_number;  //user it first time only !
            $quiz->save();

        }




        // store ones answer
        $answer = \App\ActiveAnswer::where('question_id', '=', $question_id)
            ->where('quiz_id', '=', $quiz->id)->get()->first();
        if(!$answer){
            $answer = new \App\ActiveAnswer;
            $answer->quiz_id = $quiz->id;
            $answer->question_id = $question_id;
        }
        $answer->user_answer = $question_answer;
        $answer->save();


        // update quiz answered question number
        $answers_number = count(\App\ActiveAnswer::where('quiz_id', '=', $quiz->id)->get());
        $quiz->answered_question_number = $answers_number;
        $quiz->time_left += $period_of_time;
        $quiz->save();

        return response()->json([], 201);

    }

    function generate($package_id, $topic, $topic_id, $quiz_id, $request){

        $package = Packages::where('id', '=', $package_id)->get()->first();
        if(!$package){
            return response()->json([
                'meta' => [
                    'code' => 404,
                    'error' => 'Package not found'
                ]
            ]);

        }

        $security = UserPackages::where('package_id', '=', $package_id)->where('user_id', '=', Auth::user()->id )->get()->first();

        if(!$security){
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'error' => 'Please, buy the package so that you have full access'
                ]
            ]);
        }

        if(!$this->isIncluded($package_id, $topic, $topic_id)){
            return response()->json([
                'meta' => [
                    'code' => 404,
                    'error' => 'This topic is not included in this package'
                ]
            ]);
        }

        $answers_all = null;
        $quiz = null;

        if($quiz_id){

            // questions review
            $quiz= \App\Quiz::find($quiz_id);
            if(!$quiz){
                return response()->json([
                    'error' => 'Quiz not found'
                ], 404);
            }
            $answers_all = \App\ActiveAnswer::where('quiz_id', $quiz->id)->get();

        }else{
//            realtime quiz
            $quiz = \App\Quiz::where('user_id','=',Auth::user()->id)
                ->where('package_id','=',$package_id)
                ->where('topic_type','=',$topic)
                ->where('topic_id','=',$topic_id)
                ->where('complete', '=', 0)
                ->get()->first();

            if($quiz){
                $answers_number = $quiz->answered_question_number;
                $answers_all = \App\ActiveAnswer::where('quiz_id', $quiz->id)->get();
            }
        }

        $res = $this->GenerateQuestionResponse($topic, $topic_id, $answers_all);
        $questionsCount = count($res);
        if($request->paginate == 1){

            $numberOfPages = ceil(count($res) / $request->questionsPerPage);
            $res = array_slice($res, ($request->page-1)*$request->questionsPerPage, $request->questionsPerPage);
            return response()->json(
                [
                    'package_id'       => $package_id,
                    'topic'            => $topic,
                    'topic_id'         => $topic_id,
                    'questions_number' => $questionsCount,
                    'paginate'         => [
                        'current_page' => $request->page,
                        'numberOfPages' => $numberOfPages
                    ],
                    'questions'        => $res
                ],
                200
            );
        }



        return response()->json(
            [
                'package_id'       => $package_id,
                'topic'            => $topic,
                'topic_id'         => $topic_id,
                'questions_number' => count($res),
                'paginate'         => null,
                'questions'        => $res
            ],
            200
        );


    }

    public function GenerateQuestionResponse($topic, $topic_id, $answers_all ){

        $questions_array = [];


        // it's a chapter ..
        $questions = Question::where($topic,'=',$topic_id)->get();


        foreach($questions as $i){
            array_push($questions_array, $this->respose($i, $answers_all));
        }


        return $questions_array;

    }



    public function generate_bychapter($package_id, $topic_id, Request $request){

        $quiz = null;
        if($request->quiz_id){
            $quiz = $request->quiz_id;
        }

        return $this->generate($package_id, 'chapter', $topic_id, $quiz, $request);

    }


    public function generate_byprocess($package_id, $topic_id , Request $request){

        $quiz = null;
        if($request->quiz_id){
            $quiz = $request->quiz_id;
        }

        return $this->generate($package_id, 'process_group', $topic_id, $quiz, $request);

    }

    public function generate_exam($package_id, $topic_id, Request $request){
        $topic = 'exam';

        $quiz = null;
        $answers_all = null;

        if($request->quiz_id){

            // questions review
            $quiz= \App\Quiz::find($request->quiz_id);
            if(!$quiz){
                return response()->json([
                    'error' => 'Quiz not found'
                ], 404);
            }
            $answers_all = \App\ActiveAnswer::where('quiz_id', $quiz->id)->get();

        }else{
//            realtime quiz
            $quiz = \App\Quiz::where('user_id','=',Auth::user()->id)
                ->where('package_id','=',$package_id)
                ->where('topic_type','=',$topic)
                ->where('topic_id','=',$topic_id)
                ->where('complete', '=', 0)
                ->get()->first();

            if($quiz){
                $answers_number = $quiz->answered_question_number;
                $answers_all = \App\ActiveAnswer::where('quiz_id', $quiz->id)->get();
            }
        }

        $questions_array = [];

        $package = Packages::where('id', '=', $package_id)->get()->first();
        if(!$package){
            return response()->json([
                'meta' => [
                    'code' => 404,
                    'error' => 'Package not found'
                ]
            ]);

        }

        $security = UserPackages::where('package_id', '=', $package_id)->where('user_id', '=', Auth::user()->id )->get()->first();
        if(!$security){
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'error' => 'Please, buy the package so that you have full access'
                ]
            ]);
        }

        $exams_included = explode(',', $package->exams);
        if(! in_array($topic_id, $exams_included)){
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'error' => 'This exam is not included in this package'
                ],

            ]);
        }


        // exams ..
        $question = Question::where(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,'.$topic_id.',%')->get();
        if($question->first()){
            foreach($question as $q){
                array_push($questions_array, $this->respose($q,$answers_all));
            }

            $questionsCount = count($questions_array);

            if($request->paginate == 1){

                $numberOfPages = ceil(count($questions_array) / $request->questionsPerPage);
                $questions_array = array_slice($questions_array, ($request->page-1)*$request->questionsPerPage, $request->questionsPerPage);
                return response()->json(
                    [
                        'package_id'       => $package_id,
                        'topic'            => $topic,
                        'topic_id'         => $topic_id,
                        'questions_number' => $questionsCount,
                        'paginate'         => [
                            'current_page' => $request->page,
                            'numberOfPages' => $numberOfPages
                        ],
                        'questions'        => $questions_array
                    ],
                    200
                );
            }

            return response()->json(
                [
                    'package_id'       => $package_id,
                    'topic'            => $topic,
                    'topic_id'         => $topic_id,
                    'questions_number' => count($questions_array),
                    'paginate'         => null,
                    'questions'        => $questions_array
                ],
                200
            );

        }else{
            // no question attached to this exam !
            return '404';
        }
    }

    public function generate_all($package_id, $q_num){
        $questions_array = [];
        $package = Packages::where('id', '=', $package_id)->get()->first();
        if(!$package){
            return response()->json([
                'meta' => [
                    'code' => 404,
                    'error' => 'Package not found'
                ]
            ]);

        }

        // $security = UserPackages::where('package_id', '=', $package_id)->where('user_id', '=', Auth::user()->id )->get()->first();
        // if(!$security){
        //     return response()->json([
        //         'meta' => [
        //             'code' => 500,
        //             'error' => 'Please, buy the package so that you have full access'
        //             ]
        //         ]);
        // }
        // load all question by chapter
        $chapter = $package->chapter_included;
        if($chapter != null){

            $chapter = explode(',', $chapter);
            $questionRole = QuestionRoles::where('package_id', '=',$package_id)->get();
            if($questionRole->first()){
                foreach($questionRole as $q){
                    foreach($chapter as $c){
                        $question = Question::where('id', '=', $q->question_id)->where('chapter','=', $c)->get()->first();
                        if($question){
                            if( ! $this->is_exist($questions_array, $question->title)){
                                array_push($questions_array, $this->respose($question));
                            }
                        }
                    }
                }
            }
        }


        // load all question by process group
        $process = $package->process_group_included;
        if($process != null){
            $process = explode(',', $process);
            $questionRole = QuestionRoles::where('package_id', '=',$package_id)->get();
            if($questionRole->first()){
                foreach($questionRole as $q){
                    foreach($process as $p){
                        $question = Question::where('id', '=', $q->question_id)->where('process_group','=', $p)->get()->first();
                        if($question){
                            if(! $this->is_exist($questions_array, $question->title)){
                                array_push($questions_array, $this->respose($question));
                            }
                        }
                    }
                }
            }
        }

        shuffle($questions_array);

        return response()->json( [ 'data' => array_slice($questions_array, 0, $q_num) ]);
    }

    public function respose($q, $answers_all){
        $question = [];
        $question['id'] = $q->id;
        $question['title'] = $q->title;
        $question['answers']['a'] = $q->a;
        $question['answers']['b'] = $q->b;
        $question['answers']['c'] = $q->c;
        $question['answers']['d'] = $q->correct_answer;
        shuffle($question['answers']);
        $question['correct_answer'] = $q->correct_answer;
        $question['feedback'] = $q->feedback;

        $process_group = Process_group::where('id','=',$q->process_group)->get()->first();
        if($process_group){
            $question['process_group'] = ['id' => $process_group->id, 'name' => $process_group->name];
        }else{
            $question['process_group'] = rand(1,10000000);
        }

        $question['img'] = NULL;
        if($q->img){
            $question['img'] = trim(env('APP_URL'), '/').'/storage/questions/'.basename($q->img);
        }

        if($answers_all){
            $answer = $answers_all->first(function($item) use($q){
                return $item->question_id == $q->id;
            });
            if($answer){
                $question['user_saved_answer'] = $answer->user_answer;
            }else{
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

    public function isIncluded($package_id, $topic, $topic_id)
    {

        $package = \App\Models\Package\Packages::find($package_id);
        $topic_id_arr = [];
        switch ($topic) {
            case 'chapter':
                $topic_id_arr = explode(',', $package->chapter_included);
                break;
            case 'process_group':
                $topic_id_arr = explode(',', $package->process_group_included);
                break;
        }

        if (! in_array($topic_id, $topic_id_arr ) ){
            return 0;
        }
        return 1;

    }

    /**
     * @param $package_id
     * @param $topic
     * @param $topic_id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeScore(Request $request){
        $score = $request->score;
        $package_id = $request->package_id;
        $topic = $request->topic;
        $topic_id = $request->topic_id;

        $quiz = \App\Quiz::where('user_id', '=', Auth::user()->id)
            ->where('package_id', '=', $package_id)
            ->where('topic_type', '=', $topic)
            ->where('topic_id', '=', $topic_id)
            ->where('complete','=', 0)
            ->get()->first();

        if($quiz){
            $quiz->complete = 1;
            $quiz->score = $score;
            $quiz->save();
        }else{
            return response()->json([
                'error'=>'Quiz not found !'
            ], 404);
        }


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
            )
            ->get();

        // convert from [{}, ..] to [[], ..]
        $correctAnswers_arr = [];
        $correctAnswers = $answers->filter(function($row){
            return $row->user_answer == $row->correct_answer;
        });
        foreach($correctAnswers as $c){
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
        $wrongAnswers = $answers->filter(function($row){
            return $row->user_answer != $row->correct_answer;
        });
        foreach($wrongAnswers as $c){
            array_push($wrongAnswers_arr, [
                'quiz_id' => $c->quiz_id,
                'question_id' => $c->question_id,
                'user_answer' => $c->user_answer,
                'flaged' => $c->flaged,
                'created_at' => $c->created_at,
                'updated_at' => $c->updated_at,
            ]);
        }


        $archiveAnswer = DB::table('correct_answers')
            ->insert($correctAnswers_arr);
        $archiveAnswer = DB::table('wrong_answers')
            ->insert($wrongAnswers_arr);

        // delete from active_answers
        DB::table('active_answers')
            ->where('quiz_id', $quiz->id)
            ->delete();


        /**
         * delete all, but the latest 3 history records
         */
        $quizzes = \App\Quiz::where('user_id', Auth::user()->id)
            ->where('package_id', '=', $package_id)
            ->where('topic_type', '=', $topic)
            ->where('topic_id', '=', $topic_id)
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

        return response()->json([], 201);
    }

    public function showQuiz(Request $request){


        if($request->has('package_id') && $request->has('topic') && $request->has('topic_id')){
            $quiz = \App\Quiz::where('user_id', Auth::user()->id)
                ->where('topic_type', $request->topic)
                ->where('topic_id', $request->topic_id)
                ->where('package_id', $request->package_id)
                ->orderBy('created_at','desc')
                ->where('complete', 1)
                ->get();

        }else{
            if($request->has('package_id')){
                $quiz = \App\Quiz::where('user_id', Auth::user()->id)
                    ->where('package_id', $request->package_id)
                    ->where('complete', 1)
                    ->orderBy('created_at','desc')
                    ->get();
            }else{
                $quiz = \App\Quiz::where('user_id', Auth::user()->id)
                    ->where('complete', 1)
                    ->orderBy('created_at','desc')
                    ->get();
            }
        }



        $quiz_list = [];

        foreach($quiz as $q){
            $package = \App\Models\Package\Packages::find($q->package_id);

            if($q->topic_type == 'process_group'){
                $topic = \App\Process_group::find($q->topic_id);
                if($topic){
                    $topic_name = $topic->name;
                }
            }elseif ($q->topic_type == 'exam'){
                $topic_name = 'Exam '. $q->topic_id;
            }elseif ($q->topic_type == 'chapter'){
                $topic = \App\Chapters::find($q->topic_id);
                if($topic){
                    $topic_name = $topic->name;
                }
            }else{
                continue;
            }

            if($package && $topic_name){
                $i = (object)[];
                $i->id = $q->id;
                $i->pacakge_id = $q->package_id;
                $i->package_name = $package->name;
                $i->user_id = $q->user_id;
                $i->topic = $q->topic_type;
                $i->topic_id = $q->topic_id;
                $i->topic_name = $topic_name;
                $i->questions_number = $q->questions_number;
                $i->answered_question_number = $q->answered_question_number;
                $i->score = $q->score;
                $i->created_at = $q->created_at;
                $i->updated_at = $q->updated_at;
                array_push($quiz_list, $i);
            }

        }
        return response()->json($quiz_list, 200);
    }
}
