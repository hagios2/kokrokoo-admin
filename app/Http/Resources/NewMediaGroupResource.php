<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NewMediaGroupResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        return $this->collection->map(function($company) {

            return [

                'id' => $company->id,

                'company_name' => $company->company_name,

                'company_email' => $company->company_email,

                'media_house' => $company->media_house,

                'media_type' => $company->mediaType->mediaType,

                'address' => $company->address,

                'website' => $company->website,

                'purpose' => $company->purpose,

                'operation_cert' => $company->operation_cert,

                'business_cert' => $company->business_cert,

                'logo' => $company->avatar->logo,

                'isPublished' => $company->isPublished,

                'hasBankDetails' => $company->bank ? true : false,

                'bank_details' => $this->company->bank
            ];

        });
    }
}
