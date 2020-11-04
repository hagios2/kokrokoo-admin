<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolumeDiscountRequest;
use App\Http\Resources\VolumeDiscountResource;
use App\Models\Company;
use App\Models\RegistrationPaymentAmount;
use App\Models\VolumeDiscount;
use App\VolumnDiscount;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function setAmount(Request $request)
    {
        $amount_param = $request->validate(['amount' => 'required', 'currency' => 'required']);

        $setAmount = RegistrationPaymentAmount::query()->first();

        if($setAmount)
        {
            $setAmount->update($amount_param);

            return response()->json(['status' => 'amount updated successfully']);

        }else{

            RegistrationPaymentAmount::create($amount_param);

            return response()->json(['status' => 'amount created successfully']);
        }

    }

    public function volumeDiscount(Company $company)
    {
        $volume = VolumeDiscount::query()->where('media_company_id', $company->id)->get();

        return VolumeDiscountResource::collection($volume);
    }


    public function createVolumeDiscount(VolumeDiscountRequest $request)
    {
        VolumeDiscount::create($request->validated());


        return response()->json(['status' => 'success']);
    }


}
