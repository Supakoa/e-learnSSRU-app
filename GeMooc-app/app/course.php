<?php

namespace App;
use App\user as user;

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

       public function not_users()
       {
        return user::whereNotIn('id', $this->users->modelKeys())->get();
       }
}
