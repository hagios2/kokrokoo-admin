<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->isAPrintSubscription)
        {
            return [
 
                 'id' => $this->id,
            
                 'day' => $this->day,
 
                 'no_of_weeks' => $this->no_of_weeks,
 
                 'selected_date' => $this->selected_date,
 
                 'pay_later' => $this->pay_later,
 
                 'ratecard' => $this->ratecard,
             ];
 
        
        }else{
 
             return [
 
                 'id' => $this->id,
 
                 'no_of_weeks' => $this->no_of_weeks,
 
                 'total_amount' => $this->total_amount,
 
                 'day' => $this->day,
 
                 'selected_date' => $this->selected_date,
 
                 'pay_later' => $this->pay_later,
 
                 'details' => DetailsResource::collection($this->subscriptionDetail)
            ];
        }
    }
}
