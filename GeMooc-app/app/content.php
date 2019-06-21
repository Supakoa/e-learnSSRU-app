<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    //
    // protected $primaryKey = 'con_id';

    public function lesson()
    {
        return $this->belongsTo('App\lesson');
    }
    public function article()
    {
        return $this->hasOne('App\article','id','detail');
    }

    public function quiz()
    {
        return $this->hasOne('App\quiz','id','detail');
    }

    public function progresses()
    {
        return $this->belongsToMany('App\User','progresses')->withPivot('percent')->withTimestamp();
    }
    public function progress_user($id)
    {
        return $this->belongsToMany('App\User','progresses')->wherePivot('user_id',$id)->withPivot('percent');
    }
}
