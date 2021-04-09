<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engineer_skill extends Model
{
    //
    protected $fillable = [
        'level',
    ];

    public function engineers()
    {
        return $this->hasMany('App\Engineer','engineer_skill_id','id');
    }
}
