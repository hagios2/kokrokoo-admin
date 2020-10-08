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

	protected $fillable = [];
}
