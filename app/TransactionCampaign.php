<?php

namespace App;

use App\Models\ScheduledAd;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class TransactionCampaign extends Model
{
    public function scheduledAd()
    {
        return $this->belongsTo(ScheduledAd::class, 'scheduled_ad_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
