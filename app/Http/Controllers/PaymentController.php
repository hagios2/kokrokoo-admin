<?php

namespace App\Http\Controllers;

use App\Models\RegistrationPaymentAmount;
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

}
