<?php

namespace App;

use App\Models\ScheduledAd;
use Illuminate\Database\Eloquent\Model;

class ScheduledAdDiscount extends Model
{
    public function scheduledAd()
    {
        return $this->belongsTo(ScheduledAd::class);
    }
}
