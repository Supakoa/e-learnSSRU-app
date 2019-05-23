<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    //
    protected $primaryKey = 'content_id';
    
    public function lesson()
    {
        return $this->belongsTo('App\lesson');
    }
}
