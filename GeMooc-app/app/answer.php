<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
   protected $fillable = ['name','correct','question_id','order'];

   public function question()
   {
       return $this->belongsTo('App\question');
   }

   public function users()
   {
       return $this->belongsToMany('App\user','user_answer');
   }

}
