<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regular extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    protected $fillable  = [
        'user_id',
        'username',
        'name',
        'phone_number',
        'gender',
        'country'
    ];
    protected $hidden =[
        'remember_token'
    ];
}
