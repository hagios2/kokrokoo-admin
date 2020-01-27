@extends('layouts.app')

@section('content')
    <!-- page content -->
        <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"> <i class="fa fa-user"></i> Total Users</span>
                <div class="count">{{$total_users}}</div>
                <span class="count_bottom"> <i class="green">100% </i> </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"> <i class="fa fa-clock-o"> </i> Users</span>
                <div class="count">{{$lweek_users}}</div>
{{--                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{$lweek_users / $total_users * 100}}% </i> From last Week</span>--}}
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Active Users</span>
                <div class="count green">{{$active_users}}</div>
{{--                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{$active_users / $total_users * 100}}% </i> </span>--}}
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Inactive Users</span>
                <div class="count red">{{$inactive_users}}</div>
{{--                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>{{$inactive_users / $total_users * 100}}% </i> </span>--}}
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> New Users</span>
                <div class="count blue">{{$new_users}}</div>
{{--                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{$new_users / $total_users * 100}}% </i> </span>--}}
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-pencil-square"></i> Total Subscriptions</span>
                <div class="count">{{$subs_counts}}</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{'100'}}% </i> </span>
            </div>
        </div>
        <!-- /top tiles -->

    <!-- page content -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"> <i class="fa fa-pencil-square"></i> New Subscriptions</span>
            <div class="count blue">{{$new_subs}}</div>
{{--            <span class="count_bottom"> <i class="green">{{$new_subs / $subs_counts * 100}}% </i> </span>--}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"> <i class="fa fa-pencil"> </i> Live Subscriptions</span>
            <div class="count green">{{$live_subs}}</div>
{{--            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{$live_subs / $subs_counts * 100}}% </i> From last Week</span>--}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-pencil"></i> Rejected Subscriptions</span>
            <div class="count red">{{$rej_subs}}</div>
{{--            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{$rej_subs / $subs_counts * 100}}% </i> </span>--}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-pencil"></i> Subscriptions</span>
            <div class="count">{{$active_subs}}</div>
{{--            <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>{{$active_subs / $subs_counts * 100}}% </i> To go live today</span>--}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-paypal"></i> Total Transactions</span>
            <div class="count">{{$total_trans}}</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> </i> last week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-paypal"></i> Transactions</span>
            <div class="count">0</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> </i> this Week</span>
        </div>
    </div>
    <!-- /top tiles -->

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">

                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>Subscription analysis <small></small></h3>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="chart_plot_01" class="demo-placeholder"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        <br />





    <!-- /page content -->

@endsection
