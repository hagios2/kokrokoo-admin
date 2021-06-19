<?php

namespace App\Http\Resources;

use App\Http\Resources\Retailer\DurationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailsResource extends JsonResource
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

            'ratecard' => $this->ratecard,

            'duration' => $this->duration ? new DurationResource($this->duration) : null,

            'selected_spots' => $this->selected_spots,

            'amount' => $this->amount,

            'saved' => true,
        ];
    }
}
