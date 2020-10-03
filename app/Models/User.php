<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;


class User extends Eloquent
{
    use Notifiable;

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [];
}
