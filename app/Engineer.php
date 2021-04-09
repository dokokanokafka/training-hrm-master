<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//ソフトデリート使用
use Illuminate\Database\Eloquent\SoftDeletes;


class Engineer extends Model
{
    //ソフトデリート使用
    use SoftDeletes;

    //DB接続するテーブル名を入れる
    protected $table = 'engineers';
    
    //ブラックリスト
    protected $guarded = ['id']; 


    // protected $fillable = [
    //     'last_name',
    //     'first_name',
    //     'last_name_furigana',
    //     'first_name_furigana',
    //     'gender',
    //     'birth_date',
    //     'email',
    //     'tel',
    //     'address',
    //     'postal_code',
    //     'closest_station',
    //     'educational_background',
    //     'resume',
    //     'job_history_sheet',
    //     'comment',
    //     'inhouse_status_id',
    //     'employment_status_id',
    //     'engineer_skill_id',
    //     'human_skill_id',
    // ];

    //誕生日より年齢計算
    public function getAgeAttribute(){
    return Carbon::parse($this->attributes['birth_date'])->age;
    }

    public function employment_status()
    {
    return $this->belongsTo('App\Employment_status');
    // return $this->hasMany('App\Employment_status');
    }
    public function In_house_status()
    {
    return $this->belongsTo('App\In_house_status');
    }
    public function Engineer_skill()
    {
    return $this->belongsTo('App\Engineer_skill');
    }
    public function Human_skill()
    {
    return $this->belongsTo('App\Human_skill');
    }

    
}