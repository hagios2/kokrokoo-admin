<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = ['id'];

    public function subscriptionDetail()
    {
        return $this->hasMany(SubscriptionDetail::class);
    }

    public function scheduledAd()
    {
        return $this->belongsTo(ScheduledAd::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
