<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class ChapterTopic extends Model
{
    protected $fillable = [
        'title',
        'chapter_id',
    ];
}
