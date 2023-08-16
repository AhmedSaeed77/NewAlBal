<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $table = 'permissions';

    protected $fillable = ['title'];

    public $transcodeColumns = [
        'title'
    ];

    public function page_user(){
        return $this->hasMany(PageUser::class);
    }
}
