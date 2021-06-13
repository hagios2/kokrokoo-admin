<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivatedMediaResource extends  ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
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

                        'id' => $user->company->id ?? 'N\A',

                        'name' => $user->company->company_name ?? 'N\A',

                        'media_type' => $user->company->mediaType->mediaType ?? 'N\A',

                        'isPublished' => $user->company->isPublished
                    ],

                'created_at' => [

                    'time' => Carbon::parse($user->created_at)->format('g:i A'),

                    'date' => Carbon::parse($user->created_at)->format('D, d F Y')
                ],

                'last_login' => $user->last_login
            ];

        });
    }
}
