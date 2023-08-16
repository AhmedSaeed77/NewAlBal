<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $fillable = [
        'question_id',
        'exam_id',
    ];
}
