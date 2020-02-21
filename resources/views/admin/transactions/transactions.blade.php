@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
                <h4 class="page-header">Transactions <small></small></h4>
                <table id="laravel_datatable" class="table table-striped table-bordered table-responsive table-custome">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>#</th>
                        <th>Transaction ID</th>
                        <th>Invoice number</th>
                        <th>Phone</th>
                        <th>Service</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Channel</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/transactions.js') }}"></script>
@stop