<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Oct 2019 17:06:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AdminAuditTrail
 * 
 * @property int $id
 * @property string $action_by
 * @property string $activities
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AdminAuditTrail extends Eloquent
{
	protected $fillable = [
		'action_by',
		'activities'
	];
}
