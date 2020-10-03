<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduledAdResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  $this->collection->map(function($scheduledAd){

            return [

                'id' => $scheduledAd->id,

                'client' => $scheduledAd->client->id,

                'rate_Card_title_id' => $scheduledAd->rate_card_title_id,

                'title' => $scheduledAd->title,

                'status' => $scheduledAd->status,

                'pay_later' => $scheduledAd->pay_later,

                'cart_id' => $scheduledAd->cart_id
            ];
        });
    }
}
