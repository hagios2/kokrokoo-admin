<?php

namespace App\Http\Resources;

use App\Models\Ad;
use App\Models\ScheduledAd;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SubscriptionTransactionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function($scheduledAd){

            return [
                'id' => $scheduledAd->id,

                'client_id' => $scheduledAd->client_id,

                'client_company_id' => $scheduledAd->company_id,

                'rate_card_title' => [

                    'id' => $scheduledAd->rate_card_title_id,

                    'title' => $scheduledAd->ratecardTitle->rate_card_title,

                    'file_types' => json_decode($scheduledAd->ratecardTitle->file_types),
                ],

                'company' => [

                    'media_house_id' =>  $scheduledAd->ratecardTitle->company->id,

                    'media_house' => $scheduledAd->ratecardTitle->company->media_house,

                    'media_type' => $scheduledAd->ratecardTitle->company->mediaType->mediaType,
                ],

                'ad_duration' => $this->retrieveAd($scheduledAd->id),

                'generated_id' => $scheduledAd->generated_id,

                'status' => $scheduledAd->status,

                'title' => $scheduledAd->title,

                'cart_id' => $scheduledAd->cart,

                'pay_later' => $scheduledAd->pay_later,

                'date' => Carbon::parse($scheduledAd->created_at)->format('F dS Y'),

                'time' =>  Carbon::createFromFormat('Y-m-d H:i:s', $scheduledAd->created_at)->format('H:i'),

                'total_amount' => $this->calculatePayment(ScheduledAd::find($scheduledAd->id))

            ];
        });
    }

    public function calculatePayment(ScheduledAd $scheduledAd)
    {

        $subscriptions = $scheduledAd->subscription;

        $subscription_payable_amount_list = collect();

        $subscriptions->map(function($subscription) use
        ($subscription_payable_amount_list) {

            if($subscription->isAPrintSubscription)
            {

                $total_amount_without_rollover = $subscription->ratecard->cost;

                $total_amount_with_rollover = ($total_amount_without_rollover * (1 + $subscription->no_of_weeks));

            }else{

                $amountList = collect();

                $subscription->subscriptionDetail->map(function($subscription_detail) use ($amountList) {

                    $amount = $subscription_detail->selected_spots*$subscription_detail->duration->rate;

                    $amountList->push($amount);

                });

                $total_amount_without_rollover = $amountList->sum();

                $total_amount_with_rollover = ($total_amount_without_rollover * (1 + $subscription->no_of_weeks));

            }

            $subscription_payable_amount_list->push($total_amount_with_rollover);

        });

        return $total_rollover_cost_amount = $subscription_payable_amount_list->sum();

        // $payable_amount_with_tax = (1.125 * $total_rollover_cost_amount);

        // $grand_total = (1.05 * $payable_amount_with_tax); #payable_amount_with_tax_5percent


        // return [

        //   'grand_total' => $grand_total,

        //   'total_rollover_cost_amount' => $total_rollover_cost_amount #this is the amount
        // ];

    }

    public function retrieveAd($scheduledAd)
    {
        $ad = Ad::where('scheduled_ad_id', $scheduledAd)->latest()->first();

        return $ad->file_duration ?? null;

    }

}


