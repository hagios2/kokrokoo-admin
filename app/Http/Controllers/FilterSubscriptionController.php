<?php

namespace App\Http\Controllers;

use App\Models\ScheduledAd;
use App\Models\User;
use Illuminate\Http\Request;

class FilterSubscriptionController extends Controller
{
     public  function filter(Request $request){
         $users  = User::all('client_id','media_house');
//
//         if(request()->ajax()) {
//             $schedAds  = ScheduledAd::all();
//             return datatables()->of($schedAds)
//                 ->addColumn('action', function($row){
//                     $btn = '<div class="btn-group btn-group-sm"> ';
//                     $btn =$btn.  '<a href="/admin/subscriptions/'.$row->subscription_id.'" data-toggle="tooltip"     data-id="'.$row->subscription_id.'" data-original-title="view" class="edit btn btn-success btn-sm view-sub"><i class="fa fa-eye"></i></a>';
//                     //$btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-primary btn-sm unblock-user"><i class="fa fa-unlock"></i> </button>';
//                     // $btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-danger btn-sm block-user"><i class="fa fa-lock"></i> </button>';
//                     $btn = $btn . '</div';
//                     return $btn;
//                 })
//                 ->rawColumns(['action'])
//                 ->addIndexColumn()
//                 ->make(true);
//         }
         return view('admin.subscriptions.filter_subs')->with(['users'=>$users]);
     }

     public function subs(Request $request){
//         if($request->ajax()) {
//             $schedAds  = ScheduledAd::all()->where('media_house_id','=',$request->get('id'))->get();
//             return datatables()->of($schedAds)
//                 ->addColumn('action', function($row){
//                     $btn = '<div class="btn-group btn-group-sm"> ';
//                     $btn =$btn.  '<a href="/admin/subscriptions/'.$row->subscription_id.'" data-toggle="tooltip"     data-id="'.$row->subscription_id.'" data-original-title="view" class="edit btn btn-success btn-sm view-sub"><i class="fa fa-eye"></i></a>';
//                     //$btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-primary btn-sm unblock-user"><i class="fa fa-unlock"></i> </button>';
//                     // $btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-danger btn-sm block-user"><i class="fa fa-lock"></i> </button>';
//                     $btn = $btn . '</div';
//                     return $btn;
//                 })
//                 ->rawColumns(['action'])
//                 ->addIndexColumn()
//                 ->make(true);
//         }
//         return  view('admin.subscriptions.subscriptions');
     }

     public function test(Request $request){

         if(request()->ajax()) {
             $schedAds  = ScheduledAd::all();
             return datatables()->of($schedAds)
                 ->addColumn('action', function($row){
                     $btn = '<div class="btn-group btn-group-sm"> ';
                     $btn =$btn.  '<a href="/admin/subscriptions/'.$row->subscription_id.'" data-toggle="tooltip"     data-id="'.$row->subscription_id.'" data-original-title="view" class="edit btn btn-success btn-sm view-sub"><i class="fa fa-eye"></i></a>';
                     //$btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-primary btn-sm unblock-user"><i class="fa fa-unlock"></i> </button>';
                     // $btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-danger btn-sm block-user"><i class="fa fa-lock"></i> </button>';
                     $btn = $btn . '</div';
                     return $btn;
                 })
                 ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
         }
       //  return  view('admin.subscriptions.subscriptions');
     }
}
