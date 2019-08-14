<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    public function content()
    {
        return $this->belongsTo('App\content');
    }
}
