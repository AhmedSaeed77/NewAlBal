<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Library\ChapterTopic;
use App\Models\Library\CoursePart;
use App\Models\Library\Exam;
use App\Models\Library\PartChapter;
use App\Models\Library\Path;
use App\Models\Library\PathCourse;
use App\Models\Library\SkillLevel;
use App\Models\Library\TopicSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LibraryController extends \App\Http\Controllers\Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,admin,super-admin')->except([

        ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paths = Path::leftJoin('countries', 'paths.country_id', '=', 'countries.id')
            ->select(['paths.*', 'countries.name AS country'])
            ->get()->groupBy('country_id');

        return view('super-admin.library.index')
            ->with('CountryPaths', $paths);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.library.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** validate Path Title */
        if(!$request->has('path_title')){
            return response()->json(['error' => 'path Title is required'], 200);
        }

        if(!$request->country_id){
            return response()->json(['error' => 'country is required '], 200);
        }

        $thisUser = Auth::user();
        $path_title = $request->path_title;

        /** Create New Path */
        $pathModel = Path::create([
            'title'             => $path_title,
            'country_id'        => $request->country_id,
        ]);

        if(!isset($request->courses)){
            return $this->successJsonResponse();
        }
        if(!is_iterable($request->courses)){
            return $this->successJsonResponse();
        }
        foreach($request->courses as $course)
        {
            /**
             * it has title (string), parts (array)
             */
            $courseModel = PathCourse::create([
                'title'             => $course['title'],
                'path_id'           => $pathModel->id,
            ]);
            if(!isset($course['parts']))
            {
                continue;
            }
            if(!is_iterable($course['parts'])){
                continue;
            }
            foreach($course['parts'] as $part)
            {
                /**
                 * it has title (string), chapters (array)
                 */
                $partModel = CoursePart::create([
                    'title'             => $part['title'],
                    'course_id'         => $courseModel->id,
                ]);
                if(!isset($part['chapters']))
                {
                    continue;
                }
                if(!is_iterable($part['chapters']))
                {
                    continue;
                }
                foreach($part['chapters'] as $chapter)
                {
                    $chapterModel = PartChapter::create([
                        'title'             => $chapter['title'],
                        'part_id'           => $partModel->id,
                    ]);

                    if(!isset($chapter['topics']))
                    {
                        continue;
                    }
                    if(!is_iterable($chapter['topics']))
                    {
                        continue;
                    }

                    foreach($chapter['topics'] as $topic) 
                    {
                        $topicModel = ChapterTopic::create([
                            'title' => $topic['title'],
                            'chapter_id' => $chapterModel->id,
                        ]);

                        if(!isset($topic['skills']))
                        {
                            continue;
                        }
                        if(!is_iterable($topic['skills']))
                        {
                            continue;
                        }
                        foreach($topic['skills'] as $skill)
                        {
                            $skillModel = TopicSkill::create([
                                'title' => $skill['title'],
                                'topic_id'  => $topicModel->id,
                            ]);

                            if(!isset($skill['levels']))
                            {
                                 continue;
                            }
                            if(!is_iterable($skill['levels']))
                            {
                                 continue;
                            }
                            foreach($skill['levels'] as $level)
                            {
                                $levelModel = SkillLevel::create([
                                    'title' => $level['title'],
                                    'skill_id' => $skillModel->id,
                                ]);
                            }
                        }
                    }
                }
            }
        }
        return $this->successJsonResponse();
    }

    public function singleStore(Request $request, $topic_type)
    {
        switch ($topic_type)
        {
            case 'course':
                $courseModel = PathCourse::create([
                                                        'title'             => $request->title,
                                                        'path_id'           => $request->parent_id,
                                                ]);
                break;

            case 'part':
                $partModel = CoursePart::create([
                                                    'title'             => $request->title,
                                                    'course_id'         => $request->parent_id,
                                                ]);
                break;

            case 'chapter':
                $chapterModel = PartChapter::create([
                                                        'title'             => $request->title,
                                                        'part_id'           => $request->parent_id,
                                                    ]);
                break;

            case 'topic':
                $topicModel = ChapterTopic::create([
                                                        'title'             => $request->title,
                                                        'chapter_id'        => $request->parent_id,
                                                    ]);
                break;

            case 'skill':
                $skillModel = TopicSkill::create([
                                                    'title' => $request->title,
                                                    'topic_id'  => $request->parent_id,
                                                ]);
                break;

            case 'level':
                $levelModel = SkillLevel::create([
                                                    'title' => $request->title,
                                                    'skill_id'  => $request->parent_id,
                                                ]);
                break;

            default:
                break;
        }
        return response()->json([], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->getPath($id);
    }

    public function getPath($path_id)
    {
        $path = Path::find($path_id);
        $courses = [];
        $coursesModel = PathCourse::where('path_id', $path_id)->get();
        if(is_iterable($coursesModel))
        {
            foreach($coursesModel as $course)
            {
                $course_item = [
                    'id'    => $course->id,
                    'title' => $course->title,
                    'parts' => [],
                ];

                $partsModel = CoursePart::where('course_id', $course->id)->get();
                if(is_iterable($partsModel))
                {
                    foreach($partsModel as $part)
                    {
                        $part_item = [
                            'id'        => $part->id,
                            'title'     => $part->title,
                            'chapters'  => [],
                        ];
                        $chapterModel = PartChapter::where('part_id', $part->id)->get();
                        if(is_iterable($chapterModel))
                        {
                            foreach($chapterModel as $chapter)
                            {
                                $chapter_item = [
                                    'id'        => $chapter->id,
                                    'title'     => $chapter->title,
                                    'topics'    => [],
                                ];
                                $topicsModel = ChapterTopic::where('chapter_id', $chapter->id)->get();
                                if(is_iterable($topicsModel))
                                {
                                    foreach($topicsModel as $topic)
                                    {
                                        $topic_item = [
                                            'id'        => $topic->id,
                                            'title'     => $topic->title,
                                            'skills'    => [],
                                        ];
                                        $skillModel = TopicSkill::where('topic_id', $topic->id)->get();
                                        foreach($skillModel as $skill)
                                        {
                                            $skill_item = [
                                                'id'    => $skill->id,
                                                'title' => $skill->title,
                                                'levels'=> [],
                                            ];
                                            $skillLevels = SkillLevel::where('skill_id', $skill->id)->get();
                                            if(is_iterable($skillLevels))
                                            {
                                                foreach($skillLevels as $level)
                                                {
                                                    $level_item = [
                                                        'id'    => $level->id,
                                                        'title' => $level->title,
                                                    ];
                                                    array_push($skill_item['levels'], $level_item);
                                                }
                                            }
                                            array_push($topic_item['skills'], $skill_item);
                                        }
                                        array_push($chapter_item['topics'], $topic_item);
                                    }
                                }
                                array_push($part_item['chapters'], $chapter_item);
                            }
                        }
                        array_push($course_item['parts'], $part_item);
                    }
                }
                array_push($courses, $course_item);
            }
        }

        return [
            'id'            => $path->id,
            'country_id'    => $path->country_id,
            'title'         => $path->title,
            'courses'       => $courses
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('super-admin.library.edit')
            ->with('path_id', $id);
    }

    /**
     * Edit page Loader
     * @param $path_id
     * @return array
     */
    public function loader($path_id){
        return $this->getPath($path_id);
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
        /** Only update the Path title */
        $path = Path::find($id);
        if($path){
            $path->country_id = $request->country_id;
            $path->title = $request->path_title;
            $path->save();
        }
    }

    public function singleUpdate(Request $request, $topic_type){

        if($request->value == ''){
            return response()->json('empty ?', 422);
        }

        $topic = $this->modelByTopicType($topic_type, $request->topic_id);

        if($topic){
            $topic->title = $request->value;
            $topic->save();
        }

        return response()->json([], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = Path::where([
            'id'                => $id,
        ])->first();
        if($path){
            $path->delete();
        }
        return back()->with('success', config('library.path.en').' Deleted.');
    }

    public function singleDestroy(Request $request, $topic_type){

        $topic = $this->modelByTopicType($topic_type, $request->topic_id);

        if($topic){
            $topic->delete();
        }

        return response()->json([], 200);
    }



    public function successJsonResponse(){
        return response()->json(null, 200);
    }

    public function fetchLibrary(Request $request){

        switch($request->topic_required){
            case 'path':
                if(Auth::guard('admin')->check()){
                    $paths = DB::table('paths')
                        ->join(DB::raw('(SELECT path_id FROM teacher_scoops WHERE admin_id=\''.Auth::user()->id.'\') AS teacher_scoops'),
                            'teacher_scoops.path_id', '=', 'paths.id')
                        ->select('paths.id', 'paths.title')
                        ->groupBy('paths.id')
                        ->get();
                }else{
                    $paths = Path::query()
                        ->join('countries', 'countries.id', 'paths.country_id')
                        ->select(['paths.id', 'paths.title', 'countries.code AS country_code'])
                        ->get()
                        ->map(function($row){
                            $row->title = $row->title.' - '.$row->country_code;
                            return $row;
                        });
                }
                return response()->json($paths, 200);
                break;
            case 'course':
                if(Auth::guard('admin')->check()){
                    $courses = DB::table('path_courses')
                        ->where('path_courses.path_id', $request->parent_topic_id)
                        ->join(DB::raw('(SELECT course_id FROM teacher_scoops WHERE admin_id=\''.Auth::user()->id.'\') AS teacher_scoops'),
                            'teacher_scoops.course_id', '=', 'path_courses.id')
                        ->select('path_courses.id', 'path_courses.title')
                        ->groupBy('path_courses.id')
                        ->get();
                }else{
                    $courses = PathCourse::where([
                        'path_id'           => $request->parent_topic_id,
                    ])
                    ->get(['id', 'title']);
                }
                return response()->json($courses, 200);
                break;
            case 'part':
                $course_arr = [];
                if(!is_iterable($request->parent_topic_id)){
                    array_push($course_arr, $request->parent_topic_id);
                }else{
                    $course_arr = $request->parent_topic_id;
                }

                if(Auth::guard('admin')->check()){
                    $parts = DB::table('course_parts')
                        ->whereIn('course_parts.course_id', $course_arr)
                        ->join(DB::raw('(SELECT part_id FROM teacher_scoops WHERE admin_id=\''.Auth::user()->id.'\') AS teacher_scoops'),
                            'teacher_scoops.part_id', '=', 'course_parts.id')
                        ->select('course_parts.id', 'course_parts.title')
                        ->groupBy('course_parts.id')
                        ->get();
                }else {
                    $parts = CoursePart::whereIn(
                        'course_id', $course_arr
                    )->join('path_courses', 'course_parts.course_id', '=', 'path_courses.id')
                    ->get(['course_parts.id', 'course_parts.title', 'path_courses.title AS course_title']);
                }
                return response()->json($parts, 200);
                break;
            case 'chapter':
                $chapters = PartChapter::where([
                    'part_id'           => $request->parent_topic_id,
                ])
                ->get(['id', 'title']);
                return response()->json($chapters, 200);
                break;
            case 'topic':
                $topics = ChapterTopic::where([
                    'chapter_id'        => $request->parent_topic_id,
                ])
                ->get(['id', 'title']);
                return response()->json($topics, 200);
                break;
            case 'skill':
                $skills = TopicSkill::where([
                    'topic_id'        => $request->parent_topic_id,
                ])
                ->get(['id', 'title']);
                return response()->json($skills, 200);
                break;
            case 'level':
                $skills = SkillLevel::where([
                    'skill_id'        => $request->parent_topic_id,
                ])
                    ->get(['id', 'title']);
                return response()->json($skills, 200);
                break;
            case 'exams':
                if(Auth::guard('admin')->check()){
                    $exams = Exam::where('admin_created_by', Auth::user()->id)->get();
                }else{
                    $exams = [];
                }
                return response()->json($exams, 200);
                break;
            default:
                return response()->json([], 200);
        }
    }

    public function modelByTopicType($topic_type, $topic_id){
        switch ($topic_type){
            case 'course':
                $topic = PathCourse::find($topic_id);
                break;
            case 'part':
                $topic = CoursePart::find($topic_id);
                break;
            case 'chapter':
                $topic = PartChapter::find($topic_id);
                break;
            case 'topic':
                $topic = ChapterTopic::find($topic_id);
                break;
            case 'skill':
                $topic = TopicSkill::find($topic_id);
                break;
            case 'level':
                $topic = SkillLevel::find($topic_id);
                break;
            default:
                $topic = null;
                break;
        }
        return $topic;
    }

}
