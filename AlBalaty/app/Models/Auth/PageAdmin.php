<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Admin;


class PageAdmin extends Model
{
    public $table = 'page_admin';


    protected $guarded = [];
    public $transcodeColumns = [];

    public function roles(){
        return $this->belongsTo(Page::class);
    }

    public function permissions(){
        return $this->belongsTo(Permission::class);
    }

    public function admins(){
        return $this->belongsTo(Admin::class);
    }
}
