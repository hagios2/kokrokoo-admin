<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaHouseResource extends JsonResource
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

            'company_email' => $this->company_email,

            'media_house' => $this->media_house,

            'media_type' => $this->mediaType->mediaType,

            'address' => $this->address,

            'website' => $this->website,

            'purpose' => $this->purpose,

            'operation_cert' => $this->operation_cert,

            'business_cert' => $this->business_cert,

            'logo' => $this->avatar->logo,

            'isPublished' => $this->isPublished,

            'region' => json_decode($this->region),

            'hasBankDetails' => $this->bank ? true : false,

            'bank_details' => $this->bank,

            'reviewed' => $this->reviewed ? true : false,

            'created_at' => Carbon::parse($this->created_at)->format('D, d F Y')
        ];
    }
}
