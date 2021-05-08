<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RateCardTitleRequest extends FormRequest
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
        return [
            'rate_card_title' => 'required|string',
            'service_description' => 'required|string',
            'file_types' => 'nullable',
            'company_id' => 'required|integer'
        ];
    }
}
