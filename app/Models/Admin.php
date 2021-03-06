<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use SMartins\PassportMultiauth\HasMultiAuthApiTokens;

class Admin extends Authenticatable
{

	use Notifiable, HasMultiAuthApiTokens;

	protected $hidden = [
		'password',
		'remember_token',
		'created_at',
		'updated_at'
	];

	protected $fillable = [
		'name',
		'email',
		'phone',
		'status',
		'title',
		'last_login',
		'password',
		'remember_token'
	];


	public function findForPassport($username)
    {
        $admin = $this->where([['email', $username], ['status', 'active']])->first();

        if($admin)
        {
            $admin->update(['last_login' => now()]);

            return $admin;
        }

		return $admin;
		
    }
}
