<?php

namespace App\Http\Resources\Retailer;

use Illuminate\Http\Resources\Json\JsonResource;

class DurationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,

            'duration' => $this->duration,

            'rate' => $this->rate,

            'unit' => $this->unit
        ];
    }
}
