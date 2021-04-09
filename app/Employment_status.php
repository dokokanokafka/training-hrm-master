<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Employment_status extends Model
{
    //

    protected $fillable = [
        'name',
    ];

    public function engineers()
    {
        return $this->hasMany('App\Engineer','employment_status_id','id');
        // return $this->belongsTo('App\Engineer','employment_status_id','id');
    }
}
