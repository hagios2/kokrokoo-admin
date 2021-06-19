<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionDetailsResource extends JsonResource
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

            'no_of_weeks' => $this->no_of_weeks,

            'total_amount' => $this->total_amount,

            'day' => $this->day,

            'selected_date' => $this->selected_date,

            'status' => $this->status,

            'details' => DetailsResource::collection($this->subscriptionDetail)
        ];
    }
}
