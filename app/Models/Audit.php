<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 05 May 2020 06:31:31 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Audit
 * 
 * @property int $id
 * @property string $action_by
 * @property string $role
 * @property string $activities
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Audit extends Eloquent
{
	protected $fillable = [
		'action_by',
		'role',
		'activities'
	];
}
