<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class PartChapter extends Model
{
    protected $fillable = [
        'title',
        'part_id',
    ];
}
