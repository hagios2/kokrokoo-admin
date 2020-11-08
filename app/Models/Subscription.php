<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = ['id'];

    public function subscriptionDetail()
    {
        return $this->hasMany('App\Models\SubscriptionDetail');
    }

}
