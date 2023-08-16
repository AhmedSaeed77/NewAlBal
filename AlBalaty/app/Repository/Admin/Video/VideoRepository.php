<?php


namespace App\Repository\Admin\Video;


use App\Repository\Admin\VideoRepositoryInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VideoRepository implements VideoRepositoryInterface
{

    /**
     * return Current Auth user videos
     * @param array $query
     * @param int $pagination
     * @return mixed
     */
    public function currentAdminVideos($query = [], $pagination = 10)
    {
        $builder = DB::table('videos')->where(function($q)use($query){
                if(count($query ?? [])){
                    $q->where($query);
                }

                if(Auth::guard('admin')->check()){
                    $q->where('admin_id', Auth::user()->id);
                }else{ $q->whereNull('admin_id'); }

            })
            ->leftJoin('video_distributions', 'videos.id', '=', 'video_distributions.video_id');
        return $this->leftJoinOnDistributionTables($builder)
            ->select([
                'paths.title AS path_title', 'paths.id AS path_id',
                'path_courses.title AS course_title', 'path_courses.id AS course_id',
                'course_parts.title AS part_title', 'course_parts.id AS part_id',
                'part_chapters.title AS chapter_title', 'part_chapters.id AS chapter_id',
                'chapter_topics.title AS topic_title', 'chapter_topics.id AS topic_id',
                'topic_skills.title AS skill_title', 'topic_skills.id AS skill_id',
                'videos.*',
            ])
            ->orderBy('updated_at', 'desc')
            ->paginate($pagination);
    }

    /**
     * join with distribution tables
     * @param Builder $builder
     * @return Builder
     */
    private function leftJoinOnDistributionTables(Builder $builder){
        return $builder->leftJoin('paths', 'video_distributions.path_id', '=', 'paths.id')
            ->leftJoin('path_courses', 'video_distributions.course_id', '=', 'path_courses.id')
            ->leftJoin('course_parts', 'video_distributions.part_id', '=', 'course_parts.id')
            ->leftJoin('part_chapters', 'video_distributions.chapter_id', '=', 'part_chapters.id')
            ->leftJoin('chapter_topics', 'video_distributions.topic_id', '=', 'chapter_topics.id')
            ->leftJoin('topic_skills', 'video_distributions.skill_id', '=', 'topic_skills.id');
    }
}
