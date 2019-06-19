<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
