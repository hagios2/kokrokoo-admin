<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Oct 2019 17:06:30 +0000.
 */

namespace App\Models;

use App\Duration;
use Illuminate\Database\Eloquent\Model;

class RateCard extends Model
{
	protected $casts = [
		'segments' => 'json',
		'weekend_segments' => 'json'
	];

	protected $guarded = ['id'];

    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id');
    }

    public function duration()
    {
        return $this->hasMany(Duration::class);
    }


    public function addDuration($duration)
    {
        $this->duration()->create($duration);
    }
}
