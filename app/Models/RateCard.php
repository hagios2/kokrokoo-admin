<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Oct 2019 17:06:30 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RateCard extends Model
{
	protected $casts = [
		'segments' => 'json',
		'weekend_segments' => 'json'
	];

	protected $fillable = [
		'rate_card_id',
		'media_house_id',
		'rate_card_title_id',
		'segments',
		'weekend_segments'
	];
}
