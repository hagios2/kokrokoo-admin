@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Transactions <small></small></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-offset-9">
                    <input type="text" class="form-control pull-right" placeholder="search" id="search" style="border-radius: 15px;margin-bottom: -10px;">
                </div>
                <table id="laravel_datatable" class="table table-striped table-bordered table-responsive">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>#</th>
{{--                        <th>Client ID</th>--}}
                        <th>Transaction ID</th>
                        <th>Invoice number</th>
{{--                        <th>Media house ID</th>--}}
                        <th>Phone</th>
                        <th>Service</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Channel</th>
                        <th>Created at</th>
                        <th>Updated at</th>

                        {{--                        <th>Action</th>--}}
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/transactions.js') }}"></script>
@stop