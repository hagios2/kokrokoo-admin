<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Oct 2019 17:06:30 +0000.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $client_id
 * @property string $name
 * @property string $title
 * @property string $email
 * @property string $phone1
 * @property string $phone2
 * @property string $address
 * @property string $media
 * @property string $media_house
 * @property string $website
 * @property string $company_profile
 * @property string $company_name
 * @property string $industry_type
 * @property string $policies
 * @property string $logo
 * @property string $file_path
 * @property string $file_size
 * @property string $role
 * @property bool $is_admin
 * @property string $isActive
 * @property string $activation_code
 * @property string $last_login
 * @property string $account_type
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class User extends Eloquent
{
    use Notifiable;

    //protected $primaryKey = 'client_id';


    protected $casts = [
		'is_admin' => 'bool',
		'isActive' => 'string'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'client_id',
		'name',
		'title',
		'email',
		'phone1',
		'phone2',
		'address',
		'media',
		'media_house',
		'website',
		'company_profile',
		'company_name',
		'industry_type',
		'policies',
		'logo',
		'file_path',
		'file_size',
		'role',
		'is_admin',
		'isActive',
		'activation_code',
		'last_login',
		'account_type',
		'password',
		'remember_token'
	];
}
