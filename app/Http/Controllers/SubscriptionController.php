<?php

namespace App\Http\Controllers;

use App\Models\RateCardTitle;
use App\Models\ScheduledAd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $schedAds  = DB::table('scheduled_ads')
                ->join('users', 'scheduled_ads.media_house_id','=','users.client_id')
                ->join('rate_card_titles', 'scheduled_ads.rate_card_id','=','rate_card_titles.rate_card_title_id')
                ->select('scheduled_ads.*', 'users.media_house','users.id','users.client_id','users.name','rate_card_titles.rate_card_title_id','rate_card_titles.rate_card_title')
                ->get();

           //die($schedAds);

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
        return  view('admin.subscriptions.subscriptions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client  = ScheduledAd::select('file_name','file_path','file_type')->where('subscription_id','=',$id)->get();
        $file_name  = $client[0]->file_name;
        $ext = explode('.',$file_name);

        return view('admin.partials.view_sub_details')->with(['file_name'=>$file_name,'ext'=>$ext[1]]);
    }

    public function download($id ,$m_id){

        $f_name = null;
        $f_type = null;
        $file_name = null;

        if (Auth::guard()->check()) {
            $file_name = ScheduledAd::select('file_name', 'file_type')->whereMedia_house_id($m_id)->whereSubscription_id($id)->get();
        }

        foreach ($file_name as $file) {
            $f_name = $file->file_name;
            $f_type = $file->file_type;
        }
        $ext = explode('/', $f_type);

        $headers = [
            'Content-Type' => 'application/' . $ext[0]
        ];

         $file = Storage::disk('uploads')->url($f_name);

         return response()->download($file, $f_name, $headers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
