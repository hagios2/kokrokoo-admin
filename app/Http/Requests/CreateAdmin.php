<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateAdmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::guard()->check() ||  Auth::guard()->user()->role == 'super_admin') {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:50|unique:admins',
            'title' =>  'required|string|string|max:255',
            'phone' => 'required|digits:10|max:10|unique:admins',
            'role'  => 'required|string|max:14',
        ];
    }

    /**
     * Configure the validator instance.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Validation\Validator  $validator
     *
     */
    public function withValidator($validator)
    {
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        }
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.alpha'   => 'Name field accepts only characters',
            'name.min'      => 'Name  too short. Must be more than (3) characters',
            'name.max'      => 'Name  too long.more than (50) characters',


            'email.required' => 'Email is required',
            'title.required' => 'Job title is required',
            'title.alpha'  => 'Job title field accepts only characters',

            'phone.required' => 'Phone number is required',
            'phone.numeric' => 'Enter valid phone number',
            //   'phone.max' =>  'Enter valid phone number',

        ];
    }
}
