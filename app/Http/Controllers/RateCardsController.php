<?php

namespace App\Http\Controllers;

use App\Models\RateCard;
use App\Models\RateCardTitle;
use App\Models\ScheduledAd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RateCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $rate_cards  =  DB::table('rate_cards')
                ->join('rate_card_titles', 'rate_cards.rate_card_title_id','=','rate_card_titles.rate_card_title_id')
                ->join('users', 'rate_cards.media_house_id','=','users.client_id')
                ->select('rate_cards.*','rate_card_titles.rate_card_title', 'users.media_house')
                ->get();
            return datatables()->of($rate_cards)
                ->addColumn('action', function($row){

                    $btn =  '<a href="ratecard/'.$row->rate_card_id.'" data-toggle="tooltip"     data-id="'.$row->rate_card_id.'" 
                    data-original-title="view" class="edit btn btn-success btn-sm view-sub"><i class="fa fa-eye"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return  view('admin.rateCards.rate_cards');
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
        $client  = RateCard::select('media_house_id','rate_card_title_id','segments','weekend_segments')->where('rate_card_id','=',$id)->get();
        $media_id  = $client[0]->media_house_id;
        $segmentData = $client[0]->segments;
        $wSegmentData = $client[0]->weekend_segments;
        $rate_card_title_id = $client[0]->rate_card_title_id;

        $username = User::select('name')->where('client_id','=',$media_id)->get();
        $media_house = User::select('media_house','media')->where('client_id','=', $media_id)->get();
        $rate_card = RateCardTitle::select('rate_card_title')->where('rate_card_title_id','=', $rate_card_title_id)->get();
         $d = $segmentData;
         $wd = $wSegmentData;

       //  dd($wd);

        return view('admin.rateCards.rate_card_details')->with(['username'=>$username,'rate_card_id'=> $id,'media_house_id'=>$media_id,
            'media_house'=>$media_house,'rate_card'=> $rate_card,'d'=> $d,'wd'=>$wd]);
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
