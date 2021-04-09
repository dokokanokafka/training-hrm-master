<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Human_skill extends Model
{
    //
    protected $fillable = [
        'level',
    ];

    public function engineers()
    {
        return $this->hasMany('App\Engineer','human_skill_id','id');
    }
}
