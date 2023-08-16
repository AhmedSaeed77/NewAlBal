<?php

namespace App\Models\Library;

use App\Models\Auth\Admin;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $table = 'exams';
    protected $fillable = [
        'name', 'duration_minutes', 'admin_created_by',
    ];

}
