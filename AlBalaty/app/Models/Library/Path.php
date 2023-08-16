<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    protected $fillable = [
        'title', 'country_id',
    ];
}
