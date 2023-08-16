<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class VideoProgressController extends Controller
{
    
    public function index(){
        $packageVideos = DB::table('video_distributions')
            ->join('videos', 'video_distributions.video_id', 'videos.id')
            ->leftJoin('paths', 'video_distributions.path_id', '=', 'paths.id')
            ->leftJoin('path_courses', 'video_distributions.course_id', '=', 'path_courses.id')
            ->leftJoin('course_parts', 'video_distributions.part_id', '=', 'course_parts.id')
            ->leftJoin('part_chapters', 'video_distributions.chapter_id', '=', 'part_chapters.id')
            ->leftJoin('chapter_topics', 'video_distributions.topic_id', '=', 'chapter_topics.id')
            ->leftJoin('topic_skills', 'video_distributions.skill_id', '=', 'topic_skills.id')
            ->select([
                'paths.title AS path_title', 'paths.id AS path_id',
                'path_courses.title AS course_title', 'path_courses.id AS course_id',
                'course_parts.title AS part_title', 'course_parts.id AS part_id',
                'part_chapters.title AS chapter_title', 'part_chapters.id AS chapter_id',
                'chapter_topics.title AS topic_title', 'chapter_topics.id AS topic_id',
                'topic_skills.title AS skill_title', 'topic_skills.id AS skill_id',
                'videos.*', 'video_distributions.*', 'videos.created_at',
            ])->get();
        return view('student.progress',compact('packageVideos'));
    }
}
