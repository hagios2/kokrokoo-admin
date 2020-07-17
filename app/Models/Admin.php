<?php

namespace App\Models;



use SMartins\PassportMultiauth\HasMultiAuthApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
 

class Admin extends Authenticatable
{

	use Notifiable, HasMultiAuthApiTokens;


	protected $casts = [
		'status' => 'bool'
	];

	protected $dates = [
		'last_login'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'admin_id',
		'name',
		'email',
		'phone',
		'status',
		'title',
		'last_login',
		'password',
		'logo',
		'remember_token'
	];


	public function findForPassport($username)
    {
        $user = $this->where([['email', $username], ['isActive', 'active']])->first();

        if($user)
        {
            $user->update(['last_login' => now()]);

            return $user;
        }

        return $user;
    }
}
