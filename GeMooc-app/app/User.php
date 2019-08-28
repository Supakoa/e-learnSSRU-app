<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Notifications\ResetPassword;
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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
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
        return $this->belongsToMany('App\course', 'course_user')->withPivot('role')->withTimestamps();
    }
    public function course(course $course)
    {
        return $this->belongsToMany('App\course', 'course_user')->withPivot('role')->withTimestamps()->wherePivot('course_id',$course->id);
    }
    public function scores()
    {
        return $this->belongsToMany('App\quiz', 'scores')->withPivot('score', 'time')->withTimestamps();
    }

    public function reports()
    {
        return $this->hasMany('App\report', 'user_id');
    }

    public function progresses()
    {
        return $this->belongsToMany('App\content', 'progresses')->withPivot('percent')->withTimestamps();
    }
    public function progresse(content $content)
    {
        return $this->belongsToMany('App\content', 'progresses')->withPivot('percent')->withTimestamps()->wherePivot('content_id', $content->id);
    }

    public function records(){
        return $this->belongsToMany('App\content', 'records')->withPivot('record','percent')->withTimestamps();
    }
}
