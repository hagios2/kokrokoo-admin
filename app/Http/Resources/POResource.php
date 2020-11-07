<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class POResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($po){

            return [
                'id' => $po->id,

                'file_path' => $po->file_path,

                'company' => $po->company,

                'created_at' => Carbon::parse($po->create)->format('F dS Y')

            ];

        });

    }
}