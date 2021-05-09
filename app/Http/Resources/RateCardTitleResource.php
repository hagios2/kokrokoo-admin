<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RateCardTitleResource extends JsonResource
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

            'rate_card_title' => $this->rate_card_title,

            'status' => $this->isLive,

            'service_description' => $this->service_description,

            'file_types' => json_decode($this->file_types)
        ];
    }
}
