<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(array $array)
 */
class Transaction extends Model
{
//	protected $guarded = ['id'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function clientCompany()
    {
        return $this->belongsTo(Company::class, 'client_company_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
