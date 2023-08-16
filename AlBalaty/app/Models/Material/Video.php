<?php

namespace App\Models\Material;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $table = 'videos';
    protected $guarded = [];
    protected $fillable = [
        'title', 'description', 'cover_image', 'demo', 'duration', 'index_z',
        'vimeo_id', 'event_id', 'admin_id',
    ];

}
