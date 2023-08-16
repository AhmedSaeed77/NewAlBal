<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $table = 'pages';

    protected $fillable = [
        'page', 'role_id',
    ];

    public $transcodeColumns = [
        'page',
    ];

    public function page_user(){
        return $this->hasMany(PageUser::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }


}
