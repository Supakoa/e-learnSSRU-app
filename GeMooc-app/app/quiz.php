<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    public function questions()
       {
           return $this->hasMany('App\question');
       }

       public function content()
       {
           return $this->belongsTo('App\content');
       }


       public function scores()
       {
           return $this->belongsToMany('App\User','scores')->withPivot('score','time')->withTimestamps();
       }
}
