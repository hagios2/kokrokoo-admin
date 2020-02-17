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
        if (request()->ajax()) {
            $rate_cards  =  DB::table('rate_cards')
                ->join('rate_card_titles', 'rate_cards.rate_card_title_id', '=', 'rate_card_titles.rate_card_title_id')
                ->join('users', 'rate_cards.media_house_id', '=', 'users.client_id')
                ->select('rate_cards.*', 'rate_card_titles.rate_card_title', 'users.media_house', 'users.media')
                ->get();
            return datatables()->of($rate_cards)
                ->addColumn('action', function ($row) {

                    $btn =  '<button  data-toggle="tooltip"   data-id="' . $row->rate_card_title_id . '"  data-media="' . $row->media . '"
                    data-original-title="view" class="edit btn btn-success btn-sm view-sub viewRateCard"><i class="fa fa-eye"></i></button>';
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
    public function show($id, $media_type)
    {

        if ($media_type != 'Print') {
            $rate_cards  = DB::table('rate_card_titles')
                ->join('rate_cards', 'rate_card_titles.rate_card_title_id', '=', 'rate_cards.rate_card_title_id')
                ->select('rate_card_titles.rate_card_title', 'rate_cards.*')
                ->where('rate_card_titles.rate_card_title_id', '=', $id)->get();
            if (!empty($rate_cards)) {
                $segments = $rate_cards[0]->segments;
                $w_segments = json_decode($rate_cards[0]->weekend_segments);
                $days_of_week = json_decode($rate_cards[0]->days_of_week);
                $days_of_weekends = $rate_cards[0]->days_of_weekend;

                return response()->json(['rate_card' => $rate_cards, 'rate_card_title' => $rate_cards[0]->rate_card_title, 'segments' => $segments, 'days_of_week' => $days_of_week, 'days_of_weekends' => $days_of_weekends, 'w_segments' => $w_segments]);
            } else {

                return response()->json(['response' => 'no records']);
            }
        } else {

            $rate_cards = PrintRateCard::whereMedia_house_id(auth()->user()->client_id)->whereRate_card_title_id(Input::get('rateCardTitleId'))->get();
            $print_segments = json_decode($rate_cards[0]->rate_card_data);
            $rate_cards_title = RateCardTitles::select('rate_card_title')->whereRate_card_title_id(Input::get('rateCardTitleId'))->get();
            if (!empty($rate_cards)) {
                return response()->json(['rate_card' => $print_segments, 'rate_card_title' => $rate_cards_title]);
            } else {

                return response()->json(['response' => 'no records']);
            }
        }
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
