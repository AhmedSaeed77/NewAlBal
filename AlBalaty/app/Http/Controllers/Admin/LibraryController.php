<?php

namespace App\Http\Controllers\Admin;

use App\Models\Library\ChapterTopic;
use App\Models\Library\CoursePart;
use App\Models\Library\Exam;
use App\Models\Library\PartChapter;
use App\Models\Library\Path;
use App\Models\Library\PathCourse;
use App\Models\Library\QuestionTag;
use App\Models\Material\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends \App\Http\Controllers\Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    private function getExams($id = null){
        return Exam::where(function($query) use($id) {
            if($id){
                $query->where('id', $id);
            }
            $query->where('admin_created_by', Auth::user()->id);
        })->get();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('admin.library.index');
    }

    /**
     * Insert New Exam
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeExam(Request $request){
        $examModel = Exam::create([
            'duration_minutes' => intval($request->duration_minutes),
            'name' => $request->exam_title,
            'admin_created_by'  => Auth::user()->id,
        ]);
        return response()->json($examModel, 201);
    }

    /**
     * All Exams
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexExam(){
        $exams = $this->getExams()->toArray();
        return response()->json($exams);
    }

    /**
     * Delete Exam
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyExam($id){
        $exam = $this->getExams($id)->first();
        if($exam){
            $exam->delete();
            return response()->json(null, 200);
        }
        return response()->json(null, 404);
    }


    /**
     * Update Exam
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateExam(Request $request, $id){
        $exam = $this->getExams($id)->first();
        if($exam){
            $exam->name = $request->exam_title;
            $exam->duration_minutes = $request->duration_minutes;
            $exam->save();
            return response()->json(null, 200);
        }
        return response()->json(null, 404);
    }

    private function getTags($id = null){
        return QuestionTag::where(function($query) use($id) {
            if($id){
                $query->where('id', $id);
            }
            $query->where('admin_created_by', Auth::user()->id);
        })->get();
    }

    /**
     * Insert New Tag
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeTag(Request $request){
        $tagModel = QuestionTag::create([
            'title' => $request->value,
            'admin_created_by' => Auth::user()->id,
        ]);
        return response()->json($tagModel, 201);
    }

    /**
     * All Tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexTag(){
        $tags = $this->getTags()->toArray();
        return response()->json($tags);
    }

    /**
     * Delete Tag
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyTag($id){
        $tag = $this->getTags($id)->first();
        if($tag){
            $tag->delete();
            return response()->json(null, 200);
        }
        return response()->json(null, 404);
    }

    /**
     * Update Tag
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTag(Request $request, $id){
        $tag = $this->getTags($id)->first();
        if($tag){
            $tag->title = $request->value;
            $tag->save();
            return response()->json(null, 200);
        }
        return response()->json(null, 404);
    }
}
