<?php

namespace App\Http\Controllers;

use App\Day;
use App\Duration;
use App\Http\Requests\DurationRequest;
use App\Http\Requests\RateCardRequest;
use App\Http\Requests\RateCardTitleRequest;
use App\Http\Resources\AllRatecardDetailResource;
use App\Http\Resources\RateCardResource;
use App\Http\Resources\RateCardTitleResource;
use App\Models\Company;
use App\Models\RateCard;
use App\Models\RateCardTitle;
use App\Unit;
use Illuminate\Http\Request;

class RateCardsController extends Controller
{
    public function getDaysAndUnits()
    {
        $days = Day::all();

        $units = Unit::all();

        return response()->json(['days' => $days, 'units' => $units]);

    }


    public function storeRateCardTitle(RateCardTitleRequest $request)
    {
        $title = $request->except(['file_types']);

        $title['file_types'] = json_encode($request->file_types) ?? null;

        $company = Company::find($request->company);

        $ratecard_title = $company->addRateCardTitle($title);

//        auth()->user()->addAudit([
//
//            'action' => 'Create new ratecard title',
//
//            'request_ip' => $_SERVER['REMOTE_ADDR'],
//
//            'activities' => 'Created ratecard titled: '.$ratecard_title->rate_card_title,
//
//        ]);

        return response()->json(['status' => 'success',
            'media_type' => $company->mediaType,
            'ratecard_title' => [
                'id' => $ratecard_title->id,
                'title' => $ratecard_title->rate_card_title
            ]]);
    }

    public function storeRateCardDetails(RateCardTitle $ratecard_title, RateCardRequest $request)
    {

        if($ratecard_title->rate_card_title != $request->rate_card_title)
        {
            $ratecard_title->update(['rate_card_title' => $request->rate_card_title]);
        }

        if($ratecard_title->company->mediaType->mediaType == 'Print')
        {
            foreach ($request->details as $ratecard_detail)
            {
                $ratecard_title->addRateCardDetails([

                    'isAPrintCard' => true,

                    'day_id' => $request->day_id,

                    'cost' => $ratecard_detail['cost'],

                    'size' => $ratecard_detail['size'],

                    'page_section' => $ratecard_detail['page_section'],

                ]);
            }

            if($request->has('other_days')) {
                foreach ($request->other_days as $day_id) {

                    foreach ($request->details as $ratecard_detail)
                    {
                        $ratecard_title->addRateCardDetails([

                            'isAPrintCard' => true,

                            'day_id' => $day_id,

                            'cost' => $ratecard_detail['cost'],

                            'size' => $ratecard_detail['size'],

                            'page_section' => $ratecard_detail['page_section'],

                        ]);
                    }
                }
            }


//            auth()->guard('api')->user()->addAudit([
//
//                'action' => 'Added ratecard details',
//
//                'request_ip' => $_SERVER['REMOTE_ADDR'],
//
//                'activities' => 'Admin added ratecard details to : '.$ratecard_title->rate_card_title,
//
//            ]);

            return response()->json(['status' => 'saved', 'rate_card_title' => $ratecard_title->rate_card_title]);

        }else{

            $ratecard_detail = $ratecard_title->addRateCardDetails($request->only(['start_time', 'end_time', 'day_id', 'no_of_spots']));

            $this->saveDuration($ratecard_detail, $request->durations);

            if($request->has('other_days')) {
                foreach ($request->other_days as $day_id) {

                    $ratecard_detail_to_store = $request->only(['start_time', 'end_time', 'no_of_spots']);

                    $ratecard_detail_to_store['day_id'] = $day_id;

                    $ratecard_detail = $ratecard_title->addRateCardDetails($ratecard_detail_to_store);

                    $this->saveDuration($ratecard_detail, $request->durations);
                }
            }

//            auth()->guard('api')->user()->addAudit([
//
//                'action' => 'Added ratecard details',
//
//                'request_ip' => $_SERVER['REMOTE_ADDR'],
//
//                'activities' => 'Admin added ratecard details to : '.$ratecard_title->rate_card_title,
//            ]);

            return response()->json(['status' => 'success', 'segments' =>

                RateCardResource::collection($ratecard_title->ratecard->where('day_id', $request->day_id))

            ]);

        }

    }


    public function getAllRateCardDetails(RateCardTitle $ratecard_title)
    {
        $cardDetailsList = collect();

        $days = Day::all();

        if($ratecard_title->company->mediaType->mediaType == 'Print')
        {

            foreach ($days as $day)
            {
                $details = RateCard::where([['rate_card_title_id', $ratecard_title->id],['day_id', $day->id], ['isAPrintCard', true]])->get();

                if($details->isNotEmpty())
                {
                    $cardDetailsList->push([

                        'day' => $day,

                        AllRatecardDetailResource::collection($details)
                    ]);
                }

            }

            return response()->json([

                'rate_card_title_id' => $ratecard_title->id,

                'rate_card_title' => $ratecard_title->rate_card_title,

                'details' => $cardDetailsList
            ]);

        }else{

            foreach ($days as $day)
            {

                $details = RateCard::where([['rate_card_title_id', $ratecard_title->id],['day_id', $day->id], ['isAPrintCard', false]])->get();

                if($details->isNotEmpty())
                {
                    $cardDetailsList->push(

                        AllRatecardDetailResource::collection($details)
                    );
                }

            }

            return response()->json([

                'rate_card_title_id' => $ratecard_title->id,

                'rate_card_title' => $ratecard_title->rate_card_title,

                'details' => $cardDetailsList
            ]);

        }

    }

//    public function updateRateCard(RateCard $ratecard, Request $request)
//    {
//
//       /*  if($ratecard_title->rate_card_title != $request->rate_card_title)
//        {
//            $ratecard_title->update(['rate_card_title' => $request->rate_card_title]);
//        } */
//
//
//        if(auth()->guard('api')->user()->company->mediaType->mediaType == 'Print')
//        {
//
//            foreach ($request->details as $ratecard_detail)
//            {
//                $ratecard_title->addRateCardDetails([
//
//                    'isAPrintCard' => true,
//
//                    'day_id' => $request->day_id,
//
//                    'cost' => $ratecard_detail['cost'],
//
//                    'size' => $ratecard_detail['size'],
//
//                    'page_section' => $ratecard_detail['page_section'],
//
//                ]);
//            }
//
//
//            auth()->guard('api')->user()->addAudit([
//
//                'action' => 'Added ratecard details',
//
//                'request_ip' => $_SERVER['REMOTE_ADDR'],
//
//                'activities' => 'Admin added ratecard details to : '.$ratecard_title->rate_card_title,
//
//            ]);
//
//            return response()->json(['status' => 'saved', 'rate_card_title' => $ratecard_title->rate_card_title]);
//
//        }else{
//
//            $ratecard_detail = $ratecard->update($request->only(['start_time', 'end_time', 'day_id', 'no_of_spots']));
//
//
//
//            //$this->saveDuration($ratecard_detail, $request->durations);
//
//            auth()->guard('api')->user()->addAudit([
//
//                'action' => 'Added ratecard details',
//
//                'request_ip' => $_SERVER['REMOTE_ADDR'],
//
//                'activities' => 'Admin added ratecard details to : '.$ratecard_title->rate_card_title,
//
//            ]);
//
//            return response()->json(['status' => 'success', 'segments' =>
//
//                RateCardResource::collection($ratecard_title->ratecard->where('day_id', $request->day_id))
//
//            ]);
//
//
//
//        $ratecard->update([
//
//            'title' => $request->title,
//
//            'card_details' => json_encode($request->card_details)
//        ]);
//
//        auth()->guard('api')->user()->addAudit([
//
//            'action' => 'Updated ratecard',
//
//            'request_ip' => $_SERVER['REMOTE_ADDR'],
//
//            'activities' => 'Admin updated ratecard'.$ratecard->title,
//
//        ]);
//
//    }
//
//
//        return response()->json(['status' => 'ratecard updated']);
//
//    }

    public function saveDuration(RateCard $ratecard, $durations)
    {


        foreach($durations as $duration)
        {
            $ratecard->addDuration([
                "unit_id"=> $duration['unit_id'],
                "rate" => $duration['rate'],
                "duration" => $duration['duration']
            ]);
        }


    }

    public function addMoreDuration(RateCard $ratecard, DurationRequest $request)
    {
        $this->saveDuration($ratecard, $request->validated());


        return response()->json(['status' => 'saved']);
    }

    public function deleteSingleRateCard(RateCard $ratecard)
    {

        if(!$ratecard->isAPrintCard)
        {

            if($ratecard->duration)
            {
                $ratecard->duration->map(function($duration){

                    $duration->delete();
                });
            }
        }

        $ratecard->delete();

        return response()->json(['status' => 'deleted']);
    }


    public function updateSingleRateCard(RateCard $ratecard, Request $request)
    {
        if($ratecard->isAPrintCard)
        {
            $ratecard->update([
                'size' => $request->size,
                'cost' => $request->cost,
                'page_section' => $request->page_section,
            ]);

        }else{

            $ratecard->update([
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'day_id' => $request->day_id,
                'no_of_spots' => $request->no_of_spots
            ]);

            foreach($request->durations as $duration)
            {
                if(substr($duration['id'], 0, 1) == '#')
                {
                    $ratecard->addDuration([
                        "unit_id"=> $duration['unit']['id'],
                        "rate" => $duration['rate'],
                        "duration" => $duration['duration']
                    ]);

                }else{

                    $fetch_duration = Duration::find($duration['id']);

                    $fetch_duration->update([
                        "unit_id"=> $duration['unit']['id'],
                        "rate" => $duration['rate'],
                        "duration" => $duration['duration']
                    ]);
                }
            }
        }

        return response(['status' => 'saved']);

    }


    public function deleteDuration(Duration $duration)
    {
        $duration->delete();

        return response()->json(['status' => 'deleted']);
    }

    public function storeFromExistingRateCard(RateCardTitle $rateCardTitle, RateCardTitleRequest $request)
    {
        $title = $request->except('file_types');

        $title['file_types'] = json_encode($request->file_types) ?? null;

        $new_ratecard_title = auth()->guard('api')->user()->company->addRateCardTitle($title);

        $rateCardTitle->rateCard->map(function ($ratecard_detail) use ($new_ratecard_title){

            if(auth()->guard('api')->user()->company->mediaType->mediaType == 'Print')
            {
                $new_ratecard_title->addRateCardDetails([
                    'day_id' => $ratecard_detail->day_id,
                    'isAPrintCard' => true,
                    'size'=> $ratecard_detail->size,
                    'cost' => $ratecard_detail->cost,
                    'page_section' => $ratecard_detail->page_section
                ]);
            }else{

                $new_ratecard_detail = $new_ratecard_title->addRateCardDetails([
                    'start_time' => $ratecard_detail->start_time,
                    'end_time' => $ratecard_detail->end_time,
                    'day_id' => $ratecard_detail->day_id,
                    'no_of_spots' => $ratecard_detail->no_of_spots,
                ]);

                $ratecard_detail->duration->map(function($duration) use ($new_ratecard_detail) {

                    $new_ratecard_detail->addDuration([
                        "unit_id"=> $duration->unit_id,
                        "rate" => $duration->rate,
                        "duration" => $duration->duration
                    ]);

                });
            }
        });

//        auth()->guard('api')->user()->addAudit([
//
//            'action' => 'Create new ratecard title',
//
//            'request_ip' => $_SERVER['REMOTE_ADDR'],
//
//            'activities' => 'Created ratecard titled: '. $new_ratecard_title->rate_card_title,
//        ]);

        return response()->json([

            'status' => 'succes',

            'rate_card_title_id' => $new_ratecard_title->id,

            'media' => auth()->guard('api')->user()->company->mediaType

        ]);
    }

    //view  selected rate card by login media
    public function getCompanyRateCards()
    {
        $ratecard_titles = RateCardTitle::where('company_id', auth()->guard('api')->user()->company_id)->get();

        return RateCardTitleResource::collection($ratecard_titles);

    }


    public function RateCardDetails(RateCardtitle $ratecard_title)
    {

        return RateCardResource::collection($ratecard_title->rateCard);

    }

    //view  selected rate card by login media
    public function  deleteRateCard(RateCardTitle $ratecard_title)
    {

        if($ratecard_title->rateCard)
        {
            $ratecard_title->rateCard->map(function($ratecard_detail){

                $ratecard_detail->delete();
            });
        }

        $ratecard_title->delete();

//        auth()->guard('api')->user()->addAudit([
//
//            'action' => 'Deleted ratecard',
//
//            'request_ip' => $_SERVER['REMOTE_ADDR'],
//
//            'activities' => 'Admin deleted ratecard: '.$ratecard_title->rate_card_title,
//
//        ]);

        return response()->json(['status' => 'Ratecard deleted']);
    }


    public function existingTitles(Company $company)
    {
        $existing_ratecard = $company->ratecardTitle;

        if($existing_ratecard)
        {
            $titles = $existing_ratecard->map(function($card){

                return ['id' => $card->id, 'title' => $card->rate_card_title];
            });

            return response()->json(['status' => 'success', 'existing_titles' => $titles ]);

        }else{

            return response()->json(['status' => 'No ratecard found']);

        }

    }

    public function activateRateCard(RateCardTitle $ratecard_title)
    {
        return $this->toggleRatecard($ratecard_title, true);

    }

    public function deactivateRateCard(RateCardTitle $ratecard_title)
    {
        return $this->toggleRatecard($ratecard_title, false);

    }


    public function toggleRatecard(RateCardTitle $ratecard_title, $toggle)
    {

        if($ratecard_title)
        {
            $ratecard_title->update(['isLive' => $toggle]);

            return response()->json(['status' => $toggle ? 'Activated' : 'Deactivated']);

        }

        return response()->json(['status' => 'Ratecard does not exist']);

    }


    public function updateRateCardTitle(RateCardTitle $ratecard_title, RateCardTitleRequest $request)
    {

        $title = $request->except('file_types');

        $title['file_types'] = json_encode($request->file_types) ?? null;

        $ratecard_title->update($title);

        auth()->guard('api')->user()->addAudit([

            'action' => 'Updated ratecard title',

            'request_ip' => $_SERVER['REMOTE_ADDR'],

            'activities' => 'Updated Ratecar titled: '.$ratecard_title->rate_card_title,

        ]);

        return response()->json(['status', 'saved']);

    }

    public function completeRateCardCreate(RateCardTitle $ratecard_title)
    {
        $ratecard_title->update(['isLive' => true]);

        return response()->json(['status', 'saved']);
    }

}
