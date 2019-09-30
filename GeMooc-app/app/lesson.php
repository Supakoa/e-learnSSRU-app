<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    //
    // protected $primaryKey = 'lesson_id';

    public function course()
    {
        return $this->belongsTo('App\course');
    }

    public function contents()
    {
        return $this->hasMany('App\content')->orderBy('order', 'asc');
    }
}
