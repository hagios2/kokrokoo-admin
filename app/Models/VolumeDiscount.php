<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolumeDiscount extends Model
{
    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'media_company_id');
    }
}
