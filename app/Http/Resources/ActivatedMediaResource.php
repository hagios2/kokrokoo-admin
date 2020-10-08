<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivatedMediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function($user) {

            return [

                'id' => $user->id,

                'name' => $user->name,

                'email' => $user->email,

                'phone1' => $user->phone1,

                'isActive' => $user->isActive,

                'company' => [

                        'id' => $user->company->id,

                        'name' => $user->company->company_name,

                         'media_type' => $user->company->mediaType->mediaType,
                    ],

                'created_at' => [

                    'time' => Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('H:i'),

                    'date' => Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('Y-m-d')
                ],

                'last_login' => $user->last_login
            ];

        });
    }
}
