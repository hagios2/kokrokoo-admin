<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolumeDiscountRequest;
use App\Http\Resources\POResource;
use App\Http\Resources\SubscriptionTransactionResource;
use App\Http\Resources\VolumeDiscountResource;
use App\Mail\ApprovedPOMail;
use App\Mail\RejectedPOMail;
use App\Models\Cart;
use App\Models\Client;
use App\Models\Company;
use App\Models\POPayment;
use App\Models\RegistrationPaymentAmount;
use App\Models\Role;
use App\Models\ScheduledAd;
use App\Models\User;
use App\Models\VolumeDiscount;
use App\Services\SendTextMessage;
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

        $po->cart->update(['payment_status' => 'paid']);

        $sendMsg = new SendTextMessage(env("SMS_USERNAME"), env("SMS_PASSWORD"));

        $role = Role::query()->where('role', 'super_admin')->first();

        $user = Client::query()->where([['role_id', $role->id], ['company_id', $po->company->id]])->first();

        $msg = "Hello {$user->name}, Your PO has been approved. Thanks for doing business with us!";

        $sendMsg->sendSms($user->name, $user->phone1, $msg);

        Mail::to($po->company->company_email)->send(new ApprovedPOMail($po->company));

        return response()->json(['message' => 'approved']);
    }

    public function rejectPO(POPayment $po)
    {
        $po->update(['status' => 'rejected']);

        $po->cart->update(['payment_status' => 'unpaid']);

        $sendMsg = new SendTextMessage(env("SMS_USERNAME"), env("SMS_PASSWORD"));

        $role = Role::query()->where('role', 'super_admin')->first();

        $user = Client::query()->where([['role_id', $role->id], ['company_id', $po->company->id]])->first();

        $msg = "Hello {$user->name}, Your PO has been denied. For further information please mail us via support@kokrokooad.com or contact us for further information on your transaction.!";

        $sendMsg->sendSms($user->name, $user->phone1, $msg);

        Mail::to($po->company->company_email)->send(new  RejectedPOMail($po->company));

        return response()->json(['message' => 'rejected']);

    }

    public function fetchInvoice(Cart $cart)
    {
       $scheduledAds = ScheduledAd::where('cart_id', $cart->id)->latest()->paginate(15);

        return new SubscriptionTransactionResource($scheduledAds);
    }

}
#