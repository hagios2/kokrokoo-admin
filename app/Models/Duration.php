<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    public function unit()
    {
        return $this->belongsTo('App\Models\Unit', 'unit_id');
    }

}
