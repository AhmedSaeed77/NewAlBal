<?php

namespace App\Http\Controllers\Admin;

use App\Models\Library\ChapterTopic;
use App\Models\Library\CoursePart;
use App\Models\Library\PartChapter;
use App\Models\Library\Path;
use App\Models\Library\PathCourse;
use App\UserRole\Page;
use App\UserRole\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExplanationController extends Controller
{
    public $pagination = 20;

    public function __construct()
    {
        $this->middleware('auth:admin'); //default auth --->> auth:web
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Permission::hasPermission(Page::EXPLANATION, 'read')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }

        $word = request()->word;
        $path_id = \request()->path_id;
        $course_id = \request()->course_id;
        $part_id = \request()->part_id;
        $chapter_id = \request()->chapter_id;
        $topic_id = \request()->topic_id;

        $pagination = \request()->pagination;

        $explanations = DB::table('explanations')
            ->where('admin_created_by', Auth::user()->id)
            ->leftJoin('paths', 'explanations.path_id', '=', 'paths.id')
            ->leftJoin('path_courses', 'explanations.course_id', '=', 'path_courses.id')
            ->leftJoin('course_parts', 'explanations.part_id', '=', 'course_parts.id')
            ->leftJoin('part_chapters', 'explanations.chapter_id', '=', 'part_chapters.id')
            ->leftJoin('chapter_topics', 'explanations.topic_id', '=', 'chapter_topics.id')
            ->leftJoin('exam_questions', 'explanations.id', '=', 'exam_questions.question_id')
            ->orderBy('explanations.created_at', 'desc')
            ->select(
                'explanations.*',
                DB::raw('(paths.title) AS path_title'),
                DB::raw('(path_courses.title) AS course_title'),
                DB::raw('(course_parts.title) AS part_title'),
                DB::raw('(part_chapters.title) AS chapter_title'),
                DB::raw('(chapter_topics.title) AS topic_title')
            )
            ->where(function($query)use($word){
                if($word){
                    $query->where('explanations.title', 'LIKE', '%'.$word.'%');
                }
            })
            ->where(function($query)use($path_id){
                if($path_id){
                    $query->where('explanations.path_id', $path_id);
                }
            })
            ->where(function($query)use($course_id){
                if($course_id){
                    $query->where('explanations.course_id', $course_id);
                }
            })
            ->where(function($query)use($part_id){
                if($part_id){
                    $query->where('explanations.part_id', $part_id);
                }
            })
            ->where(function($query)use($chapter_id){
                if($chapter_id){
                    $query->where('explanations.chapter_id', $chapter_id);
                }
            })
            ->where(function($query)use($topic_id){
                if($topic_id){
                    $query->where('explanations.topic_id', $topic_id);
                }
            })
            ->paginate($pagination ? $pagination: $this->pagination);

        return view('admin.explanation.index')
            ->with('explanations', $explanations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Permission::hasPermission(Page::EXPLANATION, 'add')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }
        return view('admin.explanation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Permission::hasPermission(Page::EXPLANATION, 'add')){
            return response()->json(null, 403);
        }

        $explanation = DB::table('explanations')->insert([
            'admin_created_by'  => Auth::user()->id,
            'explanation_title' => $request->explanation_title,
            'text'      => $request->explanation_text,
            'path_id'   => $request->path_id,
            'course_id' => $request->course_id,
            'part_id'   => $request->part_id,
            'chapter_id'=> $request->chapter_id,
            'topic_id'  => $request->topic_id,
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now(),
        ]);

        return response()->json(null, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Permission::hasPermission(Page::EXPLANATION, 'read')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Permission::hasPermission(Page::EXPLANATION, 'edit')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }

        return view('admin.explanation.edit')
            ->with('explanation_id', $id);
    }

    public function editLoader(Request $request){
        $explanation = DB::table('explanations')->where('id', $request->explanation_id)->first();
        if($explanation){
            $paths = Path::get(['id', 'title']);
            $courses = PathCourse::where([
                'path_id'           => $explanation->path_id,
            ])->get(['id', 'title']);
            $parts = CoursePart::where([
                'course_id'         => $explanation->course_id,
            ])->get(['id', 'title']);
            $chapters = PartChapter::where([
                'part_id'           => $explanation->part_id,
            ])->get(['id', 'title']);
            $topics = ChapterTopic::where([
                'chapter_id'        => $explanation->chapter_id,
            ])->get(['id', 'title']);
            return response()->json([
                'explanation'   => $explanation,
                'paths'         => $paths,
                'courses'       => $courses,
                'parts'         => $parts,
                'chapters'      => $chapters,
                'topics'        => $topics,
            ], 200);
        }
        return response()->json(null, 404);

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
        if(!Permission::hasPermission(Page::EXPLANATION, 'edit')){
            return response()->json(null, 403);
        }


        $explanation = DB::table('explanations')
            ->where('id', $id)
            ->where('admin_created_by', Auth::user()->id)
            ->update([
                'explanation_title' => $request->explanation_title,
                'text'      => $request->explanation_text,
                'path_id'   => $request->path_id,
                'course_id' => $request->course_id,
                'part_id'   => $request->part_id,
                'chapter_id'=> $request->chapter_id,
                'topic_id'  => $request->topic_id,
                'updated_at'=> \Carbon\Carbon::now(),
        ]);

        return response()->json(null, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Permission::hasPermission(Page::EXPLANATION, 'delete')){
            return redirect()->route('admin.dashboard')->with('error', 'Permission Denied');
        }
    }
}
