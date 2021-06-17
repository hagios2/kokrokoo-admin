<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Oct 2019 17:06:30 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Invoice
 * 
 * @property int $id
 * @property string $client_id
 * @property string $subscription_id
 * @property string $media_house_id
 * @property string $invoice_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Invoice extends Model
{
	protected $guarded = ['id'];
}
