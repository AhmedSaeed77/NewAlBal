<?php

namespace App\Models\Material\Video;

use Illuminate\Database\Eloquent\Model;

class VideoAttachments extends Model
{
    protected $guarded = [];
    protected $fillable = ['admin_id', 'video_id', 'file_url', 'title'];

}
