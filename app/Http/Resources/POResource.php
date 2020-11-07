<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class POResource extends JsonResource
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

            'file_path' => $this->file_path,

            'company' => $this->company,

            'created_at' => Carbon::parse($this->create)->format('F dS Y')

        ];
    }
}
