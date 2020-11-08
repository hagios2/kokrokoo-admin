<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class RateCardTitle extends Model
{
	protected $guarded = ['id'];

	public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
