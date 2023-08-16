<?php

namespace App\Models\Material;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table = 'questions';
    public $primaryKey = 'id';
    public $timestamps = true;


    protected $fillable = [
        'title',
        'feedback',
        'passage_id',
//        'path_id',
//        'course_id',
//        'part_id',
//        'chapter_id',
//        'topic_id',
//        'skill_id',
        'img',
        'demo',
        'reviewed',
        'important',
        'random',
        'reason',
        'admin_created_by'
    ];
}
