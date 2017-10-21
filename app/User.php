<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use \Illuminate\Auth\Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
    protected $casts = [
        'role' => 'integer',
    ];

    public function regular()
    {
        return $this->hasOne('App\Regular');
    }

    public function company()
    {
        return $this->hasOne('App\Company');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function comments()
    {
        return $this->hasMany('App\Like');
    }
    public function followers()
    {
        return $this->hasMany('App\Like');
    }

}
