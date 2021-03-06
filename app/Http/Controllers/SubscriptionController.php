<?php

namespace App\Http\Controllers;

use App\Models\RateCardTitle;
use App\Models\ScheduledAd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ScheduledAdResource;
use App\Http\Resources\SubscriptionResource;


class SubscriptionController extends Controller
{
    public function __construction()
    {

        $this->middleware('auth:admin');
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return ScheduledAdResource
     */
    public function index()
    {
        $scheduledAd = ScheduledAd::where('status', '!=', 'pending')->paginate(20);

        return new ScheduledAdResource($scheduledAd);

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show(ScheduledAd $scheduledAd)
    {
        return SubscriptionResource::collection($scheduledAd->subscription);
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


    public function downloadFile($id)
    {
        $f_name = null;
        $f_type = null;
        $file_name = null;

        if (Auth::guard()->check()) {
            $file_name = ScheduledAd::select('file_name', 'file_type')->whereMedia_house_id(auth()->user()->client_id)->whereSubscription_id($id)->get();
        } elseif (Auth::guard('admin')->check()) {
            $file_name = ScheduledAd::select('file_name', 'file_type')->whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereSubscription_id($id)->get();
        }

        foreach ($file_name as $file) {
            $f_name = $file->file_name;
            $f_type = $file->file_type;
        }
        $ext = explode('/', $f_type);

        //  $file_path = public_path() . "/storage/" . $f_name;
        $headers = [
            'Content-Type' => 'application/' . $ext[0]
        ];

        // $file = storage_path('app') . $f_name;
        // $file = env('SUB_FILES_URL').$f_name;
        $file = '/var/www/html/uploads/subscription-files/'.$f_name;


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
