<?php

namespace App\Http\Controllers;

use App\Models\ScheduledAd;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_users  = User::all()->count();
        $active_users  = User::where('isActive','active')->count();
        $inactive_users  = User::where('isActive','inactive')->count();
        $new_users  = User::where('isActive','pending')->count();

         $date = new \Carbon\Carbon;
         $date->subWeek();
         $lweek_users =   User::where('created_at','>',$date->toDateTimeString())->count();

         $subs_counts = ScheduledAd::all()->count();
         $active_subs  = ScheduledAd::where('status','active')->count();
         $subs_incart  = ScheduledAd::where('status','in cart')->count();
         $new_subs  = ScheduledAd::where('status','in cart')->count();
         $live_subs  = ScheduledAd::where('status','live')->count();
         $rej_subs  = ScheduledAd::where('status','rejected')->count();
         $total_trans = Transaction::all('amount')->sum();





        return view('home')->with(['total_users'=>$total_users,'active_users'=>$active_users,'inactive_users'
        => $inactive_users, 'new_users' => $new_users,'lweek_users'=> $lweek_users,'subs_counts'=>$subs_counts,'active_subs'=>$active_subs,
             'usbs_incart' => $subs_incart, 'new_subs' => $new_subs,'live_subs' => $live_subs,'rej_subs'=>$rej_subs,'total_trans' => $total_trans]);
    }
}
