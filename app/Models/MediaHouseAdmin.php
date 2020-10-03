<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Oct 2019 17:06:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MediaHouseAdmin
 * 
 * @property int $id
 * @property string $client_id
 * @property string $admin_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $title
 * @property string $user_type
 * @property string $media
 * @property string $media_house
 * @property bool $status
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class MediaHouseAdmin extends Eloquent
{
	protected $casts = [
		'status' => 'bool'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'client_id',
		'admin_id',
		'name',
		'email',
		'phone',
		'title',
		'user_type',
		'media',
		'media_house',
		'status',
		'password',
		'remember_token'
	];
}
