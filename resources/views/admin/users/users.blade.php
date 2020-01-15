@extends('layouts.app')
@section('content')
        <div class="x_panel">
            <div class="x_title">
                <h2>Users <small></small></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
{{--                <p class="text-muted font-13 m-b-30">--}}
{{--                    The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.--}}
{{--                </p>--}}
{{--                <table id="datatable-buttons" class="table table-striped table-bordered">--}}
                <div class="col-md-offset-9">
                    <input type="text" class="form-control pull-right" placeholder="search" id="search" style="border-radius: 15px;margin-bottom: -10px;">
                </div>
                <table id="laravel_datatable" class="table table-striped table-bordered">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone1</th>
                        <th>Account</th>
                        <th>Industry</th>
                        <th>Company</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Last login</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th width="110px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/users.js') }}"></script>
    @stop