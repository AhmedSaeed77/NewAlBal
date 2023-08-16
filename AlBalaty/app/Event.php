<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $table = 'events';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $guarded = [];

    public $fillable = [
        'name',
        'description',
        'what_you_learn',
        'requirement',
        'who_course_for',
        'whatsapp',
        'zoom',
        'teacher_id',
        'admin_id',

    ];

    public $transcodeColumns = [
        'name',
        'description',
        'what_you_learn',
        'requirement',
        'who_course_for'
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function event_times(){
        return $this->hasMany(EventTime::class);
    }
    public function teacher(){
        return $this->belongsTo(\App\Models\Auth\Admin::class , 'teacher_id', 'id');
    }
}
