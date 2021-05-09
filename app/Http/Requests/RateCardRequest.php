<?php

namespace App\Http\Requests;

use App\Models\RateCardTitle;
use Illuminate\Foundation\Http\FormRequest;

class RateCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        dd(request()->route()->parameters());

        if($ratecard_title->company->mediaType->mediaType == 'Print')
        {
            return [

                'details' => 'required|array',

                'day_id' => 'required|integer',

                'rate_card_title' => 'required|string',

                'other_days' => 'nullable',
            ];

        }else{

            return [

                'start_time' => 'required|string',
                'end_time' => 'required|string',
                'durations' => 'required',
                'day_id' => 'required|integer',
                'no_of_spots' => 'required|integer',
                'rate_card_title' => 'required|string',
                'other_days' => 'nullable',
                #'rate' => 'required|numeric',
            ];

        }
    }
}
