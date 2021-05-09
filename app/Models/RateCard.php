<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RateCard extends Model
{
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
