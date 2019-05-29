<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    //
    // protected $primaryKey = 'course_id';

    public function subject()
    {
        return $this->belongsTo('App\subject')->withDefault();
    }

    public function lessons()
    {
        return $this->hasMany('App\lesson','course_id');
    }
}
