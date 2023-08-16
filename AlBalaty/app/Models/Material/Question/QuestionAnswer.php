<?php

namespace App\Models\Material\Question;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $fillable = [
        'answer',
        'is_correct',
        'question_id',
    ];
}
