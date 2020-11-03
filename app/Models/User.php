<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    use Notifiable;

	protected $hidden = [
		'password',
		'remember_token'
	];

    protected  $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
