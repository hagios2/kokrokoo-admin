<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivatedClientResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  $this->collection->map(function($client) {

            return [

                'name' => $client->name,

                'email' => $client->email,

                'phone1' => $client->phone,

                'industry' => $client->industry_type,

                'company' => $client->company ?

                    [
                        'id' => $client->company->id,

                        'name' => $client->company->company_name
                    ] : null,

                'created_at' => [

                    'time' => Carbon::createFromFormat('Y-m-d H:i:s', $client->created_at)->format('H:i'),

                    'date' => Carbon::createFromFormat('Y-m-d H:i:s', $client->created_at)->format('Y-m-d')
                ]
            ];

        });
    }
}
