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
           return $this->belongsToMany('App\user','course_user')->withPivot('role');
       }
       public function students()
       {
           return $this->belongsToMany('App\user','course_user')->withPivot('role')->where('type_user','student');
       }
       public function users_main()
       {
           return $this->belongsToMany('App\user','course_user')->withPivot('role')->wherePivot('role',1);
       }

       public function not_users()
       {
        return user::whereNotIn('id', $this->users->modelKeys())->get();
       }
}
