<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table = 'roles';


    protected $fillable = [
        'name'
    ];

    public function pages(){
        return $this->hasMany(Page::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }

}
