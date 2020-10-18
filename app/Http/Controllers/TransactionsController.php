<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Http\Resources\TransactionResource;
use App\Models\ScheduledAd;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function view()
    {
        return TransactionResource::collection(Transaction::all());
    }


}
