<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolumeDiscountRequest;
use App\Http\Resources\POResource;
use App\Http\Resources\VolumeDiscountResource;
use App\Mail\RejectedPOMail;
use App\Models\Company;
use App\Models\POPayment;
use App\Models\RegistrationPaymentAmount;
use App\Models\VolumeDiscount;
use App\VolumnDiscount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function updateVolumeDiscount(VolumeDiscount $volumeDiscount, VolumeDiscountRequest $request)
    {
        $volumeDiscount->update($request->validated());

        return response()->json(['status' => 'updated succussfully']);
    }

    public function deleteVolumeDiscount(VolumeDiscount $volumeDiscount)
    {
        $volumeDiscount->delete();

        return response()->json(['status' => 'deleted']);
    }

    public function downloadPO()
    {
        return response()->download();
    }


    public function viewPendingPO()
    {
        return $this->fetchPO('pending');
    }


    public function viewApprovedPO()
    {
        return $this->fetchPO('approved');
    }

    public function viewRejectPO()
    {
        return $this->fetchPO('rejected');
    }

    public function fetchPO($status)
    {
        $po = POPayment::query()->where('status', $status)->latest()->paginate(15);

        return new POResource($po);
    }

    public function approvePO(POPayment $po)
    {
        $po->update(['status' => 'approved']);

        Mail::to($po->company->company_email)->send(new  RejectedPOMail($po->company->company_name));

        return response()->json(['message' => 'approved']);
    }

    public function rejectPO(POPayment $po)
    {
        $po->update(['status' => 'rejected']);

        Mail::to($po->company->company_email)->send(new  RejectedPOMail($po->company->company_name));

        return response()->json(['message' => 'rejected']);

    }

}
#