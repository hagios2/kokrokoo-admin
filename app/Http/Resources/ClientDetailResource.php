<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if(!$this->company)
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

                    'isActive' => $this->isAcitve,

                    'last_login' => $this->last_login
                ],

            ];

        }else{

            return [

                'user' => [

                    'id' => $this->id,

                    'name' => $this->name,

                    'email' => $this->email,

                    'title' => $this->title,

                    'phone1' => $this->phone1,

                    'phone2' => $this->phone2,

                    'role' => $this->role,

                    'isActive' => $this->isAcitve,

                    'last_login' => $this->last_login

                ],

                'company' => [

                    'id' => $this->company->id,

                    'company_name' => $this->company->company_name,

                    'company_profile' => $this->company->company_profile,

                    'address' => $this->company->address,

                    'website' => $this->company->website,

                    'industry_type' => $this->company->industry_type,

                    'business_cert' => $this->company->business_cert,

                    'logo' => $this->company->avatar->logo,

                    'company_email' => $this->company->company_email,

                    'country' => $this->company->country

                ],
            ];
        }
    }
}
