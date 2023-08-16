<?php

namespace App\Models\Package;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    public $table = 'packages';
    public $primaryKey = 'id';
    public $timestamps = true;

    public $fillable = [
        'admin_id', 'slug', 'name', 'original_price', 'price', 'discount',
        'description', 'what_you_learn', 'requirement', 'who_course_for', 'enroll_msg',
        'lang', 'img', 'preview_video_url', 'renew_period_in_days',
        'active', 'popular', 'certification', 'certification_title'
    ];

    public $transcodeColumns = [
        'name',
        'description',
        'what_you_learn',
        'requirement',
        'who_course_for'
    ];
}
