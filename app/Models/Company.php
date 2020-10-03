<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function mediaType()
    {
        return $this->belongs('App\Models\MediaType');
    }
}
