<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Oct 2019 17:06:30 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static select(string $string, string $string1)
 */
class ScheduledAd extends Model
{
	
	protected $guarded = ['id'];


	public  function  client()
    {
        return  $this->belongsTo('App\Models\Client');
	}

    public  function cart()
    {
        return  $this->belongsTo('App\Models\Cart');
    }
	
	 public function subscription()
     {
         return $this->hasMany('App\Models\Subscription');
     }

    public function ratecardTitle()
    {
        return $this->belongsTo('App\Models\RateCardTitle', 'rate_card_title_id');
    }

}
