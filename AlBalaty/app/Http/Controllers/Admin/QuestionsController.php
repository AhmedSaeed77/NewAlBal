<?php

namespace App\Http\Controllers\Admin;

use App\Helper\QuestionHelper;
use App\Http\Controllers\Controller;
use App\Models\Material\Question\Passage;
use App\Models\Material\Question\QuestionAnswer;

use App\Models\Material\Question\QuestionCenterDragdrop;
use App\Models\Material\Question\QuestionDragdrop;
use App\UserRole\Page;
use App\UserRole\Permission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Supportب\Facades\Storage;
use App\Models\Material\Question;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller
{
    
    public $pagination = 20;
    public $dropzone;

    use QuestionHelper;

    public function __construct()
    {
        $this->middleware('auth:admin'); //default auth --->> auth:web
        $this->dropzone = app('App\Http\Controllers\DropzoneController');
        $this->PremiumQuizController = app('App\Http\Controllers\Users\PremiumQuizController');
    }

    public function markAsReviewed(Request $request)
    {
        $question = Question::find($request->question_id);
        if($question)
        {
            $question->updated_at = Carbon::now();
            $question->save();
            return response()->json([], 200);
        }
        return response()->json([], 404);
    }

    public function review($id){
        $question = Question::find($id);
        if($question)
        {
            $question->reviewed = 1;
            $question->save();
        }
        //return response()->json(['data'=>'done'],200);;
        return back();
    }

    public function review_error(Request $request,$id){
        $question = Question::find($id);
        if($question){
            $question->reviewed = 2;
            $question->reason = $request->reason;
            $question->save();
        }
        //return response()->json(['data'=>'done'],200);;
        return back();
    }
    public function preview($question_id){
        return view('admin.questions.review')
            ->with('question_id', $question_id);
    }

    public function preview_loader(Request $request){
        $question = DB::table('questions')
            ->where('questions.id', $request->question_id)
            ->leftJoin('passages', 'questions.passage_id', '=', 'passages.id')
            ->select('questions.*', 'passages.passage')
            ->first();
        if($question){

            $img = null;
            if($question->img){
                $img = asset('storage/questions/'.basename($question->img));
            }
            $answers = QuestionAnswer::where('question_id', $question->id)->get();
            $answers_arr = [];
            foreach($answers as $answer){
                array_push($answers_arr, [
                    'answer'        => $answer->answer,
                    'is_correct'    => $answer->is_correct,
                ]);
            }

            return response()->json([
                'img'           => $img,
                'title'         => $question->title,
                'answers'       => $answers_arr,
                'feedback'      => $question->feedback,
                'passage'       => $question->passage,
            ], 200);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(!Permission::hasPermission(Page::QUESTION, 'read'))
        {
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }

        $word = request()->word;
        $path_id = \request()->path_id;
        $course_id = \request()->course_id;
        $part_id = \request()->part_id;
        $chapter_id = \request()->chapter_id;
        $topic_id = \request()->topic_id;
        $skill_id = \request()->skill_id;

        $pagination = \request()->pagination;

        $userWorkScoop = DB::table('teacher_scoops')
            ->where('admin_id', Auth::user()->id)
            ->select('teacher_scoops.part_id', 'teacher_scoops.content_full_access', 'teacher_scoops.admin_id')
            ->get();

        $questions = DB::table('questions')
            ->where(function($query)use($userWorkScoop)
            {
                if(count($userWorkScoop))
                {
                    foreach($userWorkScoop as $scoop)
                    {
                        if($scoop->content_full_access)
                        { // have permission to access to all data even if not owned by this user
                            $query->orWhere([
                                'question_distributions.part_id' => $scoop->part_id,
                            ]);
                        }
                        else
                        {
                            $query->orWhere(function($q)use($scoop)
                            {
                                $q->where([
                                    'question_distributions.part_id'  => $scoop->part_id,
                                    'admin_created_by'                => $scoop->admin_id,
                                ]);
                            });
                        }     
                    }
                }
            })
            ->orWhere(function($query)use($path_id)
            {
                if(!$path_id)
                    $query->orWhere('admin_created_by', Auth::user()->id);
            })
            ->leftJoin('question_distributions', 'questions.id', '=', 'question_distributions.question_id')
            ->leftJoin('paths', 'question_distributions.path_id', '=', 'paths.id')
            ->leftJoin('path_courses', 'question_distributions.course_id', '=', 'path_courses.id')
            ->leftJoin('course_parts', 'question_distributions.part_id', '=', 'course_parts.id')
            ->leftJoin('part_chapters', 'question_distributions.chapter_id', '=', 'part_chapters.id')
            ->leftJoin('chapter_topics', 'question_distributions.topic_id', '=', 'chapter_topics.id')
            ->leftJoin('topic_skills', 'question_distributions.skill_id', '=', 'topic_skills.id')
            ->orderBy('questions.created_at', 'desc')
            ->select(
                'questions.*',
                DB::raw('(paths.title) AS path_title'),
                DB::raw('(path_courses.title) AS course_title'),
                DB::raw('(course_parts.title) AS part_title'),
                DB::raw('(part_chapters.title) AS chapter_title'),
                DB::raw('(chapter_topics.title) AS topic_title'),
                DB::raw('(topic_skills.title) AS skill_title')
            )
            ->where(function($query)use($word, $path_id, $course_id, $part_id, $chapter_id, $topic_id, $skill_id){
                if($word){
                    $query->where('questions.title', 'LIKE', '%'.$word.'%');
                }
                if($path_id){
                    $query->where('question_distributions.path_id', $path_id);
                }
                if($course_id){
                    $query->where('question_distributions.course_id', $course_id);
                }
                if($part_id){
                    $query->where('question_distributions.part_id', $part_id);
                }
                if($chapter_id){
                    $query->where('question_distributions.chapter_id', $chapter_id);
                }
                if($topic_id){
                    $query->where('question_distributions.topic_id', $topic_id);
                }
                if($skill_id){
                    $query->where('question_distributions.skill_id', $skill_id);
                }
            })
            ->groupBy('questions.id')
            ->paginate($pagination ? $pagination: $this->pagination);


        return view('admin.questions.show')
            ->with('questions', $questions)
            ->with('current_page_count', count($questions));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(!Permission::hasPermission(Page::QUESTION, 'add')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }
        return view('admin.questions.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // validate for the img
        if($request->has('images'))
        {
            foreach ($request->input('images') as $file_name) 
            {
                $this->dropzone->upload($file_name, storage_path('app/public/questions/'.$file_name));
                $img_path = 'public/questions/'.$file_name;
            }
        }

        DB::beginTransaction();
        try{
            /** Handle Passage */
            if($request->passage && !$request->passage_id)
            {
                $passageId = DB::table('passages')
                    ->insertGetId([
                        'passage'       => $request->passage,
                        'created_at'    => Carbon::now(),
                        'updated_at'    => Carbon::now(),
                    ]);
            }

            $questionModel = Question::create([
                'title'             => $request->question_title,
                'question_type_id'  => (int)$request->question_type_id,
                'correct_answers_required' => (int)$request->correct_answers_required,
                'passage_id'        => $request->passage_id ? $request->passage_id: (isset($passageId) ? $passageId: null),
                'demo'              => 0,
                'important'         => $request->important == 'true' ? 1: 0,
                'random'            => $request->random == 'true' ? 1: 0,
                'feedback'          => $request->feedback,
                'admin_created_by'  => Auth::user()->id,
                'img'               => isset($img_path) ? $img_path: null,
            ]);

            if($request->question_type_id == 3) 
            {
                /** Matching To Right */
                if (is_iterable($request->drags)) 
                {
                    foreach ($request->drags as $drag) 
                    {
                        $dragModel = QuestionDragdrop::create([
                            'left_sentence' => $drag['left_sentence'],
                            'right_sentence' => $drag['right_sentence'],
                            'question_id' => $questionModel->id,
                        ]);
                    }
                }
            }
            else if ($request->question_type_id == 5)
            {
                /** Matching To Center */
                if (is_iterable($request->dragsCenter)) 
                {
                    foreach ($request->dragsCenter as $drag) 
                    {
                        $dragModel = QuestionCenterDragdrop::create([
                            'correct_sentence' => $drag['correct_sentence'],
                            'center_sentence' => $drag['center_sentence'],
                            'wrong_sentence' => $drag['wrong_sentence'],
                            'question_id' => $questionModel->id,
                        ]);
                    }
                }
            }
            else
            {
                /** For The reset */
                if(is_iterable($request->answers))
                {
                    foreach($request->answers as $answer)
                    {
                        $answerModel = QuestionAnswer::create([
                            'answer'        => $answer['answer'],
                            'is_correct'    => $answer['is_correct'] ? 1:0,
                            'question_id'   => $questionModel->id,
                        ]);
                    }
                }
            }


            if(is_iterable($request->question_distributions))
            {
                $rows = [];
                foreach($request->question_distributions as $dist){
                    array_push($rows, [
                        'question_id'   => $questionModel->id,
                        'path_id'       => $dist['path_id'],
                        'course_id'     => $dist['course_id'],
                        'part_id'       => $dist['part_id'],
                        'chapter_id'    => $dist['chapter_id'],
                        'topic_id'      => $dist['topic_id'],
                        'skill_id'      => $dist['skill_id'],
                        'created_at'    => Carbon::now(),
                        'updated_at'    => Carbon::now(),
                    ]);
                }
                DB::table('question_distributions')->insert($rows);
            }

            if(is_iterable($request->exam_id)){
                if(count($request->exam_id)){
                    DB::table('exam_questions')->where('question_id', $questionModel->id)->delete();
                    $query_arr = [];
                    foreach($request->exam_id as $exam_id){
                        array_push($query_arr, [
                            'question_id'   => $questionModel->id,
                            'exam_id'       => $exam_id,
                            'created_at'    => \Carbon\Carbon::now(),
                            'updated_at'    => \Carbon\Carbon::now(),
                        ]);
                    }

                    DB::table('exam_questions')
                        ->insert($query_arr);
                }
            }

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 200);
        }




        return response()->json([
            'question_id'   => $questionModel->id,
            'passage_id'    => isset($passageId) ? $passageId: null,
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!Permission::hasPermission(Page::QUESTION, 'edit')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }

        return view('admin.questions.edit')
            ->with('question_id', $id);
    }

    /**
     * Edit page loader
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loader(Request $request){
        $thisUser = Auth::user();

        $question = $this->questionLoader($request->question_id);

        if(!$question){
            return response()->json(null, 404);
        }

        if($request->strip_tags){
            $question->question_title = strip_tags($question->question_title);
            $question->feedback = strip_tags($question->feedback);
        }
        $passage = null;
        if($question->passage_id){
            $passage = Passage::find($question->passage_id);
            $passage = $passage->passage;
        }

        $distributions = $this->getQuestionDistribution($question->id);

        return response()->json([
            'question'  => $question,
            'passage'   => $passage,
            'passage_id'=> $question->passage_id,
            'question_distributions'    => $distributions,
        ], 200);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $thisUser = Auth::user();

        $questionModel = Question::where([
            'id'                => $id,
            'admin_created_by'  => $thisUser->id,
        ]);

        if(!$questionModel){
            return response()->json(null, 404);
        }

        $thisQuestion = $questionModel->first();
        
        if($thisQuestion->passage_id){
            $passageModel = Passage::find($thisQuestion->passage_id);
            $passageModel->passage = $request->passage;
            $passageModel->save();
        }

        // validate for the img
        if($request->has('images')){
            foreach ($request->input('images') as $file_name) {
                $this->dropzone->upload($file_name, storage_path('app/public/questions/'.$file_name));
                $img_path = 'public/questions/'.$file_name;
            }
            $oldPath = $questionModel->img;
            if(Storage::exists($oldPath))
            {
                Storage::delete($oldPath);
            }
        }

        $questionModel->update([
            'title'             => $request->question_title,
            'important'         => $request->important == '1' ? 1: 0,
            'demo'              => 0,
            'feedback'          => $request->feedback,
        ]);

        if(isset($img_path)){
            $thisQuestion->img = $img_path;
            $thisQuestion->save();
        }


        if(is_iterable($request->exam_id)){
            if(count($request->exam_id)){
                DB::table('exam_questions')->where('question_id', $id)->delete();
                $query_arr = [];
                foreach($request->exam_id as $exam_id){
                    array_push($query_arr, [
                        'question_id'   => $id,
                        'exam_id'       => $exam_id,
                        'created_at'    => \Carbon\Carbon::now(),
                        'updated_at'    => \Carbon\Carbon::now(),
                    ]);
                }

                DB::table('exam_questions')
                    ->insert($query_arr);
            }
        }

        if($request->question_type_id == 3){
            /** Matching To Right */
            $drags_id = [];
            if (is_iterable($request->drags)) {
                foreach ($request->drags as $drag) {
                    if($drag['id']){
                        $dragModel = QuestionDragdrop::find($drag['id']);
                        $dragModel->update([
                            'left_sentence'  => $drag['left_sentence'],
                            'right_sentence' => $drag['right_sentence'],
                        ]);
                    }else{
                        $dragModel = QuestionDragdrop::create([
                            'left_sentence'  => $drag['left_sentence'],
                            'right_sentence' => $drag['right_sentence'],
                            'question_id'    => $questionModel->id,
                        ]);
                    }
                    array_push($drags_id, $dragModel->id);
                }
            }
            /** remove the rest if any */
            DB::table('question_dragdrops')
                ->where('question_id', $questionModel->id)
                ->whereNotIn('id', $drags_id)
                ->delete();
        }else if ($request->question_type_id == 5){
            /** Matching To Center */
            $drags_id = [];
            if (is_iterable($request->dragsCenter)) {
                foreach ($request->dragsCenter as $drag) {
                    if($drag['id']){
                        $dragModel = QuestionCenterDragdrop::find($drag['id']);
                        $dragModel->update([
                            'correct_sentence' => $drag['correct_sentence'],
                            'center_sentence'  => $drag['center_sentence'],
                            'wrong_sentence'   => $drag['wrong_sentence'],
                        ]);
                    }else{
                        $dragModel = QuestionCenterDragdrop::create([
                            'correct_sentence' => $drag['correct_sentence'],
                            'center_sentence'  => $drag['center_sentence'],
                            'wrong_sentence'   => $drag['wrong_sentence'],
                            'question_id'      => $questionModel->id,
                        ]);
                    }
                    array_push($drags_id, $dragModel->id);
                }
            }
            /** remove the rest if any */
            DB::table('question_center_dragdrops')
                ->where('question_id', $questionModel->id)
                ->whereNotIn('id', $drags_id)
                ->delete();
        }else{
            /** For The reset */
            $answers_id = [];
            if(is_iterable($request->answers)){
                foreach($request->answers as $answer){
                    if($answer['id']){
                        $answerModel = \App\QuestionAnswer::find($answer['id']);
                        $answerModel->update([
                            'answer'        => $answer['answer'],
                            'is_correct'    => $answer['is_correct'] ? 1:0,
                        ]);
                    }else{
                        $answerModel = QuestionAnswer::create([
                            'answer'        => $answer['answer'],
                            'is_correct'    => $answer['is_correct'] ? 1:0,
                            'question_id'   => $questionModel->id,
                        ]);
                    }
                    array_push($answers_id, $answerModel->id);
                }
            }
            /** remove the rest if any */
            DB::table('question_answers')
                ->where('question_id', $questionModel->id)
                ->whereNotIn('id', $answers_id)
                ->delete();
        }

        if(is_iterable($request->question_distributions))
        {
            DB::table('question_distributions')->where('question_id', $thisQuestion->id)->delete();
            $rows = [];
            foreach($request->question_distributions as $dist)
            {
                array_push($rows, [
                    'question_id'   => $thisQuestion->id,
                    'path_id'       => $dist['path_id'],
                    'course_id'     => $dist['course_id'],
                    'part_id'       => $dist['part_id'],
                    'chapter_id'    => $dist['chapter_id'],
                    'topic_id'      => $dist['topic_id'],
                    'skill_id'      => $dist['skill_id'],
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now(),
                ]);
            }
            DB::table('question_distributions')->insert($rows);
        }
        return response()->json(null, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if(!Permission::hasPermission(Page::QUESTION, 'delete')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }
        $question = Question::where([
            'id'                => $id,
            'admin_created_by'  => Auth::user()->id,
        ])->first();

        $oldPath = $question->img;

        if(Storage::exists($oldPath))
        {
            Storage::delete($oldPath);
        }
        $question->delete();
        
        return redirect(route('question.index'))->with('success', 'Question Deleted');
    }

    public function getQuestionDistribution($question_id){
        return (
            DB::table('question_distributions')
                ->where('question_id', $question_id)
                ->leftJoin('paths', 'question_distributions.path_id', '=', 'paths.id')
                ->leftJoin('path_courses', 'question_distributions.course_id', '=', 'path_courses.id')
                ->leftJoin('course_parts', 'question_distributions.part_id', '=', 'course_parts.id')
                ->leftJoin('part_chapters', 'question_distributions.chapter_id', '=', 'part_chapters.id')
                ->leftJoin('chapter_topics', 'question_distributions.topic_id', '=', 'chapter_topics.id')
                ->leftJoin('topic_skills', 'question_distributions.skill_id', '=', 'topic_skills.id')
            ->select(
                DB::raw('(paths.id) AS path_id'),
                DB::raw('(paths.title) AS path_title'),
                DB::raw('(path_courses.id) AS course_id'),
                DB::raw('(path_courses.title) AS course_title'),
                DB::raw('(course_parts.id) AS part_id'),
                DB::raw('(course_parts.title) AS part_title'),
                DB::raw('(part_chapters.id) AS chapter_id'),
                DB::raw('(part_chapters.title) AS chapter_title'),
                DB::raw('(chapter_topics.id) AS topic_id'),
                DB::raw('(chapter_topics.title) AS topic_title'),
                DB::raw('(topic_skills.id) AS skill_id'),
                DB::raw('(topic_skills.title) AS skill_title')
            )
            ->get()->map(function($row){
                return [
                    'path'     => [
                        'id'    => $row->path_id,
                        'title' => $row->path_title,
                    ],
                    'course'     => [
                        'id'    => $row->course_id,
                        'title' => $row->course_title,
                    ],
                    'part'     => [
                        'id'    => $row->part_id,
                        'title' => $row->part_title,
                    ],
                    'chapter'     => [
                        'id'    => $row->chapter_id,
                        'title' => $row->chapter_title,
                    ],
                    'topic'     => [
                        'id'    => $row->topic_id,
                        'title' => $row->topic_title,
                    ],
                    'skill'     => [
                        'id'    => $row->skill_id,
                        'title' => $row->skill_title,
                    ],
                ];
            }));
    }



}
