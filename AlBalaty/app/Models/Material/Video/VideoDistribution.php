<?php

namespace App\Models\Material\Video;

use Illuminate\Database\Eloquent\Model;

class VideoDistribution extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'video_id', 'path_id', 'course_id', 'part_id', 'chapter_id', 'topic_id', 'skill_id',
    ];
}
