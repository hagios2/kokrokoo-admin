<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaAdminResource extends JsonResource
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
        

            'name' => $this->name,

            'email' => $this->email,

            'phone1' => $this->phone,

            'industry' => $this->industry_type,

            'company' => $this->company ? 
            
            [ 
                'id' => $this->company->id,

                'name' => $this->company->company_name
            ] : null,

            'created_at' => [

                'time' => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('H:i:s'), 

                'date' => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d')
            ]
        
        ];
        
    }
}
