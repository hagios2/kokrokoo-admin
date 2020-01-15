<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Oct 2019 17:06:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Receipt
 * 
 * @property int $id
 * @property int $user_id
 * @property int $ads_id
 * @property int $invoice_id
 * @property int $transaction_id
 * @property string $payment_method
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Receipt extends Eloquent
{
	protected $casts = [
		'user_id' => 'int',
		'ads_id' => 'int',
		'invoice_id' => 'int',
		'transaction_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'ads_id',
		'invoice_id',
		'transaction_id',
		'payment_method'
	];
}
