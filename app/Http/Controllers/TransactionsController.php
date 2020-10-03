<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Models\ScheduledAd;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function transactions(){
//        if(request()->ajax()) {
//            $trans = Transaction::all();
//            return datatables()->of($trans)
//                ->addIndexColumn()
//                ->make(true);
//        }
//        return view('admin.transactions.transactions');

        if(request()->ajax()) {
            $trans  = Transaction::all();
            return datatables()->of($trans)
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group btn-group-sm"> ';
                    $btn =$btn.  '<a href="/admin/subscriptions/'.$row->transaction_id.'" data-toggle="tooltip"     data-id="'.$row->transaction_id.'" data-original-title="view" class="edit btn btn-success btn-sm view-sub"><i class="fa fa-eye"></i></a>';
                    //$btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-primary btn-sm unblock-user"><i class="fa fa-unlock"></i> </button>';
                    // $btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-danger btn-sm block-user"><i class="fa fa-lock"></i> </button>';
                    $btn = $btn . '</div';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return  view('admin.transactions.transactions');


    }
}
