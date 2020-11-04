<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VolumeDiscountResource extends JsonResource
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

            'amount_range' => $this->amount_range,
            'media_house' => $this->company->media_house,
            'discount_percentile' => $this->discount_percentile
        ];
    }
}
