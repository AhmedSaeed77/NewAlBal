<?php

namespace App\Models\Material\Video;

use Illuminate\Database\Eloquent\Model;

class VideoUploadHistory extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'admin_id', 'file_name', 'storage_path', 'vimeo_uploaded', 'vimeo_transcoded', 'video_id',
    ];
}
