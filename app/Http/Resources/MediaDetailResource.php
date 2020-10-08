<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaDetailResource extends JsonResource
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

            'user' => [

                'id' => $this->id,

                'name' => $this->name,

                'email' => $this->email,

                'title' => $this->title,

                'phone1' => $this->phone1,

                'phone2' => $this->phone2,

                'role' => $this->role,

                'isActive' => $this->isActive,

                'last_login' => $this->last_login
            ],

            'company' => [

                'id' => $this->company->id,

                'company_name' => $this->company->company_name,

                'media_house' => $this->company->media_house,

                'media_type' => $this->company->mediaType->mediaType,

                'address' => $this->company->address,

                'website' => $this->company->website,

                'purpose' => $this->company->purpose,

                'operation_cert' => $this->company->operation_cert,

                'business_cert' => $this->company->business_cert,

                'logo' => $this->company->avatar->logo,

                'isPublished' => $this->company->isPublished,

                'hasBankDetails' => $this->company->bank ? true : false
            ]
        ];
    }
}
