<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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

            'company_name' => $this->company_name,

            'address' => $this->address,

            'email' => $this->company_email,

            'media_house' => $this->media_house,

            'website' => $this->website,

            'policy' => $this->policy,

            'business_cert' => $this->business_cert,

            'operation_cert' => $this->operation_cert,

            'isPublished' => $this->isPublished,

            'media_type' => $this->mediaType->mediaType,

            'company_type' => $this->company_type,

            'industry_type' => $this->industry_type
        ];
    }
}
