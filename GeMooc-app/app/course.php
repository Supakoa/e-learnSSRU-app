<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    //
    // protected $primaryKey = 'course_id';

    public function subject()
    {
        return $this->belongsTo('App\subject');
    }

    public function lessons()
    {
        return $this->hasMany('App\lesson','course_id');
    }
    public function users()
       {
           return $this->belongsToMany('App\user','course_user');
       }
}
