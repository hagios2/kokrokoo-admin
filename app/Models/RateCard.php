<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Oct 2019 17:06:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RateCard
 * 
 * @property int $id
 * @property string $rate_card_id
 * @property string $media_house_id
 * @property string $rate_card_title_id
 * @property array $segments
 * @property array $weekend_segments
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class RateCard extends Eloquent
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
