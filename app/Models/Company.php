<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(\string[][] $array)
 */
class Company extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function client()
    {
        return $this->hasMany('App\Client', 'user_id');
    }

    public function mediaType()
    {

        return $this->belongsTo('App\Models\MediaType', 'media_type');
    }

    public function avatar()
    {
        return $this->hasOne('App\Models\Avatar');
    }

    public function rateCardTitle()
    {

        return $this->hasMany(RateCardTitle::class);

    }

    public function addRateCardTitle($title)
    {
        return $this->rateCardTitle()->create($title);
    }

    public function bank()
    {
        return $this->hasOne(BankDetail::class);
    }
}
