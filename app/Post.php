<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'body',
        'path',
        'category',
        'user_id'
    ];

    protected $hidden=[

    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function company()
    {
        return $this->belognsTo('App\Company');
    }
    public function regular()
    {
        return $this->belognsTo('App\Regular');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function comments()
    {
        return $this->hasMany('App\Like');
    }
}
