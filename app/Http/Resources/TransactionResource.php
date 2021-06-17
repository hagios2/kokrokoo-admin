<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($transaction){

            return [

                'id' => $transaction->id,

                'client_id' => $transaction->client_id,

                'client_company_id' => $transaction->client_company_id,

                'invoice_id' => $transaction->invoice->generated_invoice_id,

                'currency' => $transaction->currency,

                'transaction_status' => $transaction->transaction_status,

                'total_amount_without_charges' => $transaction->total_amount_without_charges,

                'grand_total_amount' => $transaction->grand_total_amount,

                'transaction_reference' => $transaction->txRef,

            ];

        });
    }
}
