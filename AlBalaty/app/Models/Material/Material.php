<?php

namespace App\Models\Material;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['part_id', 'chapter_id', 'topic_id', 'skill_id', 'level_id', 'admin_id', 'title', 'file_url', 'cover_url', ];
}
