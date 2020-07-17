<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 05 May 2020 06:31:31 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class KokrokooAdmin
 * 
 * @property int $id
 * @property string $admin_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $title
 * @property string $status
 * @property string $role
 * @property \Carbon\Carbon $last_login
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class KokrokooAdmin extends Eloquent
{
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
		'title',
		'status',
		'role',
		'last_login',
		'password',
		'remember_token'
	];
}
