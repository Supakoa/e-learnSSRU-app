<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    // use LaratrustUserTrait;
    use Notifiable;

    /** Laratrust */
    // use LaratrustUserTrait; // เรียกใช้ trait

    public function canInside()
    {
        return !($this->type_user != 'admin' && $this->type_user != 'teach');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_user',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function adjusts()
    {
        return $this->hasMany('App\adjust', 'user_id');
    }

    public function Profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function answers()
    {
        return $this->belongsToMany('App\answer', 'user_answer')->withTimestamps();
    }
    
    public function courses()
    {
        return $this->belongsToMany('App\course', 'course_user')->withPivot('role');
    }

    public function scores()
    {
        return $this->belongsToMany('App\quiz', 'scores')->withPivot('score', 'time')->withTimestamps();
    }
}
