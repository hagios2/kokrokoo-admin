<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionDetail extends Model
{
    public function ratecard()
    {
        return $this->belongsTo('App\Models\RateCard');
    }


    public function duration()
    {
        return $this->belongsTo('App\Models\Duration');
    }
}
