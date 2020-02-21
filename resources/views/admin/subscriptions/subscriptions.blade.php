@extends('layouts.app')
@section('content')
        <div class="x_panel">
                <h4 class="page-header">Subscriptions</h4>
                
                <table id="laravel_datatable" class="table table-striped table-bordered table-responsive table-custome">
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
                        <th>Status</th>
                        <th>File name</th>
                        <th>Segment duration</th>
                        <th>Media house</th>
                        <th>Rate card</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
        </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/subscriptions.js') }}"></script>
@stop