<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id','name', 'email', 'phone','title','role','status', 'password'
    ];

    protected $table = 'kokrokoo_admins';


    /**
     * The attributes that should be hidden for arrays.z
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
