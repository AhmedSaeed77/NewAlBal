<?php

namespace App\Models\Package;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];
    protected $fillable = ['user_id', 'package_id', 'start', 'end'];
    public $timestamps = true;
}
