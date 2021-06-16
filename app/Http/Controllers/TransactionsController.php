<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionCampaignResource;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\VolumeDiscountResource;
use App\Models\Company;
use App\Models\Transaction;
use App\Models\VolumeDiscount;
use App\TransactionCampaign;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return new TransactionResource(Transaction::query()->latest()->paginate(15));
    }

    public function fetchTransactionDetails(Transaction $transaction)
    {
        $transaction_campaign = TransactionCampaign::query()->where('transaction_id', $transaction->id)->get();

        return TransactionCampaignResource::collection($transaction_campaign);
    }


    public function viewVolumeDiscount()
    {
        return VolumeDiscountResource::collection(VolumeDiscount::all());
    }

    public function addVolumeDiscount(Request $request, Company $company)
    {
        $discount =  $request->validate([
            'amount_range' => 'required',
            'discount_percentile' => 'required',
        ]);

        $discount['media_company_id'] = $company->id;

        VolumeDiscount::create($discount);

        return response()->json(['status' => 'success']);

    }


}
