<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class CoursePart extends Model
{
    protected $fillable = [
        'title',
        'course_id',
    ];
}
