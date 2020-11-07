<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id'];

    public function scheduledAd()
    {
        return $this->hasMany(ScheduledAd::class);
    }
}
