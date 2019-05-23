<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    //
    // protected $table = 'subjects';

    protected $primaryKey = 'subject_id';

    public $timestamps = true;



       public function courses()
       {
           return $this->hasMany('App\course','subject_id');
       }


}
