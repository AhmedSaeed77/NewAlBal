<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    public $table = 'chapters';
    public $primaryKey = 'id';
    public $timestamps = true;

    public $fillable = [
        'name',
    ];

    public $transcodeColumns = [
        'name',
    ];

}
