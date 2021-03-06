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
 * @property array $rate_card_data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class PrintRateCard extends Eloquent
{
    protected $casts = [
        'rate_card_data' => 'json',
    ];

    protected $fillable = [
        'rate_card_id',
        'media_house_id',
        'rate_card_title_id',
        'rate_card_data',
    ];
}
