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
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        return $this->collection->map(function($client) {

            return [

                'id' => $client->id,

                'name' => $client->name,

                'email' => $client->email,

                'phone1' => $client->phone1,

                'isActive' => $client->isActive,

                'company' => $client->company ?

                    [
                        'id' => $client->company->id,

                        'name' => $client->company->company_name
                    ] : null,

                'created_at' => [

                    'time' => Carbon::createFromFormat('Y-m-d H:i:s', $client->created_at)->format('H:i'),

                    'date' => Carbon::createFromFormat('Y-m-d H:i:s', $client->created_at)->format('Y-m-d')
                ],

                'last_login' => $client->last_login
            ];

        });
    }
}
