<?php

namespace App\Http\Resources;

use App\Models\ScheduledAd;
use App\Services\PaymentCalculation;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionCampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $payment_calculation = (new PaymentCalculation);

        $scheduledAd_discount = $this->scheduledAdDiscount ?? $payment_calculation->calculateInvoiceCampaignPayment(ScheduledAd::find($this->scheduledAd->id));

        return [

            'id' => $this->id,

            'rate_card_title' => [

                'id' => $this->scheduledAd->rate_card_title_id,

                'title' => $this->scheduledAd->ratecardTitle->rate_card_title,
            ],

            'cart_id' => $this->scheduledAd->cart_id,

            'company' => [

                'media_house_id' =>  $this->scheduledAd->ratecardTitle->company->id,

                'media_house' => $this->scheduledAd->ratecardTitle->company->media_house,

                'media_type' => $this->scheduledAd->ratecardTitle->company->mediaType->mediaType,
            ],

            'title' => $this->scheduledAd->title,

            'date' => Carbon::parse($this->created_at)->format('D, d F Y'),

            'time' =>  Carbon::parse($this->created_at)->format('g:i A'),

            'total_amount' => $scheduledAd_discount,

            'subscriptions' => SubscriptionDetailsResource::collection($this->scheduledAd->subscription)

        ];

    }
}
