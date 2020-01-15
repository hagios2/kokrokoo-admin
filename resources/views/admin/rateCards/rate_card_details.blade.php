@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                @foreach($rate_card as $card)
                    <h2>Weekdays Segments</h2>
                    <h2><small style="color: #8a6343"> {{$card->rate_card_title}} rate card</small></h2>
                @endforeach
                @foreach($media_house as $media)
                    <h2 class="pull-right"><span style="color: orangered"></span>  <small style="color: #0a4d8c">{{$media->media}}:{{$media->media_house}}</small></h2>

                @endforeach

                <div class="clearfix"></div>
            </div>
            <div class="x_content">


    <table id="simpletable" class="table  table-striped table-bordered nowrap">
        <thead>
        <tr>
            <th>{{$d['dura']['mon']}} </th>
            <th>{{$d['dura']['tue']}}</th>
            <th>{{$d['dura']['wed']}}</th>
            <th>{{$d['dura']['thu']}}</th>
            <th>{{$d['dura']['fri']}}</th>
            @if($d['dura']['sec1'] != '0')
            <th>{{$d['dura']['sec1']}}{{$d['dura']['time1']}}</th>
            @endif
            @if($d['dura']['sec2'] != '0')

            <th>{{$d['dura']['sec2']}}{{$d['dura']['time2']}}</th>
            @endif
                @if($d['dura']['sec3'] != '0')

                <th>{{$d['dura']['sec3']}}{{$d['dura']['time3']}}</th>
                @endif
                    @if($d['dura']['sec4'] != '0')

                    <th>{{$d['dura']['sec4']}}{{$d['dura']['time4']}}</th>
                    @endif
                        @if($d['dura']['sec5'] != '0')

                        <th>{{$d['dura']['sec5']}}{{$d['dura']['time5']}}</th>
                @endif

        </tr>
        </thead>
        <tbody>

        <tr>
            <td>{{$d['mon_duration']}}-{{$d['mon_b_duration']}}</td>
            <td>{{$d['tue_duration']}}-{{$d['tue_b_duration']}}</td>
            <td>{{$d['wed_duration']}}-{{$d['wed_b_duration']}}</td>
            <td>{{$d['thu_duration']}}-{{$d['thu_b_duration']}}</td>
            <td>{{$d['fri_duration']}}-{{$d['fri_b_duration']}}</td>
            @if($d['dura']['sec1'] != 0)

            <td>{{$d['sec1_rate']}}</td>
            @endif
                @if($d['dura']['sec2'] != 0)

                <td>{{$d['sec2_rate']}}</td>
            @endif
                    @if($d['dura']['sec3'] != 0)

                    <td>{{$d['sec3_rate']}}</td>
            @endif
                        @if($d['dura']['sec4'] != 0)

                        <td>{{$d['sec4_rate']}}</td>
            @endif
                            @if($d['dura']['sec5'] != 0)

                            <td>{{$d['sec5_rate']}}</td>
                                @endif

        </tr>
        </tbody>
    </table>

                <hr>


                <h2>Weekends Segments <span style="color: orangered"></span> <small></small></h2>


                <table  class="table  table-striped table-bordered nowrap">
                    <thead>
                    <tr>
                        <th>{{$wd['wdura']['sat']}} </th>
                        <th>{{$wd['wdura']['sun']}}</th>

                        @if($wd['wdura']['wsec1'] != '0')
                            <th>{{$wd['wdura']['wsec1']}}{{$wd['wdura']['time1']}}</th>
                        @endif
                        @if($wd['wdura']['wsec2'] != '0')

                            <th>{{$wd['wdura']['wsec2']}}{{$wd['wdura']['time2']}}</th>
                        @endif
                        @if($wd['wdura']['wsec3'] != '0')

                            <th>{{$wd['wdura']['wsec3']}}{{$wd['wdura']['time3']}}</th>
                        @endif
                        @if($wd['wdura']['wsec4'] != '0')

                            <th>{{$wd['wdura']['wsec4']}}{{$wd['wdura']['time4']}}</th>
                        @endif
                        @if($wd['wdura']['wsec5'] != '0')

                            <th>{{$wd['wdura']['wsec5']}}{{$wd['wdura']['time5']}}</th>
                        @endif

                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$wd['sat_duration']}}-{{$wd['sat_b_duration']}}</td>
                        <td>{{$wd['sun_duration']}}-{{$wd['sun_b_duration']}}</td>
                        @if($wd['wdura']['wsec1'] != 0)

                            <td>{{$wd['wsec1_rate']}}</td>
                        @endif
                        @if($wd['wdura']['wsec2'] != 0)

                            <td>{{$wd['wsec2_rate']}}</td>
                        @endif
                        @if($wd['wdura']['wsec3'] != 0)

                            <td>{{$wd['wsec3_rate']}}</td>
                        @endif
                        @if($wd['wdura']['wsec4'] != 0)

                            <td>{{$wd['wsec4_rate']}}</td>
                        @endif
                        @if($wd['wdura']['wsec5'] != 0)

                            <td>{{$wd['wsec5_rate']}}</td>
                        @endif

                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>













{{--            <div class="modal fade" id="viewFile" tabindex="-1" role="dialog" style="margin-left: 225px;">--}}
{{--                <div class="modal-dialog modal-lg" role="document">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header">--}}
{{--                            <h4 class-modal-title></h4>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}

{{--                        <div class="modal-body text-center">--}}

{{--                             <view-rate-cards></view-rate-cards>--}}

{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
@endsection








