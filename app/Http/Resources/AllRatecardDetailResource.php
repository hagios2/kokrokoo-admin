<?php

namespace App\Http\Resources;

use App\Http\Resources\Retailer\DurationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AllRatecardDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->rateCardTitle->company->mediaType->mediaType == 'Print')
        {
            return [

                'id' => $this->id,
                'size'=> $this->size,
                'cost'=> $this->cost,
                'page_section'=> $this->page_section,
                // 'day'=> $this->day,

            ];

        }else{

            return [

                'id' => $this->id,
                'start_time'=> $this->start_time,
                'end_time'=> $this->end_time,
                'duration' => DurationResource::collection($this->duration),
                'day'=> $this->day,
                'no_of_spots'=> $this->no_of_spots,
                //'isAPrintCard'=> $this->isPrintCard,
            ];
        }
    }
}
