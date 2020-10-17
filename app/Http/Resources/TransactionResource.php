<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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

            'client_id' => $this->client_id,

            'client_company_id' => $this->client_company_id,

            'invoice_id' => $this->invoice->generated_invoice_id,

            'currency' => $this->currency,

            'transaction_status' => $this->transaction_status,

            'total_amount_without_charges' => $this->total_amount_without_charges,

            'grand_total_amount' => $this->grand_total_amount,

            'transaction_reference' => $this->txRef,

        ];
    }
}
