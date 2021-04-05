<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\VolumeDiscountResource;
use App\Models\Company;
use App\Models\Transaction;
use App\Models\VolumeDiscount;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function view()
    {
        return new TransactionResource(Transaction::query()->latest()->paginate(10));
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
