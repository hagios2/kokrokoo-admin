<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


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
