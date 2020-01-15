@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Filter Subscriptions <small></small></h2><br><br>
                <select class="form-control" id="selected-media">
                    @foreach($users as $user)
                    <option value="{{$user->client_id}}" >{{$user->media_house}}</option>
                    @endforeach
                </select>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" id="hide-table" style="display: none">
                <input type="text" class="form-control pull-right" placeholder="search" id="search" style="width: 50%;border-radius: 15px;line-height: 160px;margin-bottom: -20px;margin-top: 40px;">

                <table id="laravel_datatable" class="table table-striped table-bordered table-responsive">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>#</th>
                        <th>Subscription ID</th>
                        <th>Title</th>
                        <th>Start date</th>
                        <th>End date</th>
                        {{--                        <th>Subscription data</th>--}}
                        <th>Status</th>
                        <th>File name</th>
                        {{--                        <th>File type</th>--}}
                        <th>File size</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/filter.js') }}"></script>
@stop