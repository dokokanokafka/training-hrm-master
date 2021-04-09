<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class In_house_status extends Model
{
    //

    protected $fillable = [
        'name',
    ];

    public function engineers()
    {
        return $this->hasMany('App\Engineer','inhouse_status_id','id');
    }
}
