@extends('layouts.app')
@section('content')
        <div class="x_panel">
            <div class="x_title">
                <h2>Subscriptions <small></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-offset-9">
                    <input type="text" class="form-control pull-right" placeholder="search" id="search" style="border-radius: 15px;margin-bottom: -10px;">
                </div>
                <table id="laravel_datatable" class="table table-striped table-bordered table-responsive" style="font-size: 10px;">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Media house ID</th>
                        <th>Client ID</th>
                        <th>Client name</th>
                        <th>#</th>
                        <th>Subscription ID</th>
                        <th>Title</th>
                        <th>Start date</th>
                        <th>End date</th>
{{--                        <th>Subscription data</th>--}}
                        <th>Status</th>
                        <th>File name</th>
                        <th>Segment duration</th>
                        {{--                        <th>File type</th>--}}
                        <th>Media house</th>
                        <th>Rate card</th>
                        <th>Created</th>
{{--                        <th>Updated</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/subscriptions.js') }}"></script>
@stop