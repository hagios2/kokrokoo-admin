<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected  $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

}
