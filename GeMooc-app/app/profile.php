<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
