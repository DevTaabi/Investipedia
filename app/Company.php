<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use Notifiable;

    protected $table = 'companies';

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
        'company_name',
        'owner_name',
        'phone_number',
        'country',
        'company_type',
        'description',
        'path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    protected $hidden = [
        'remember_token'
    ];
}
