<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = ['name','quiz_id'];
    public function answers()
       {
           return $this->hasMany('App\answer');
       }
       public function quiz()
       {
           return $this->belongsTo('App\quiz');
       }
}
