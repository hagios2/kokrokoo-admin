@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Manage Admins<small></small></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {{--                <p class="text-muted font-13 m-b-30">--}}
                {{--                    The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.--}}
                {{--                </p>--}}
                {{--                <table id="datatable-buttons" class="table table-striped table-bordered">--}}
                <input type="text" class="form-control pull-right" placeholder="search" id="search" style="width: 50%;border-radius: 15px;line-height: 160px;margin-bottom: -20px;">

                <table id="laravel_datatable" class="table table-striped table-bordered">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>#</th>
                        <th>Admin ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Last login</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th width="80px">Action</th>
                    </tr>
                    </thead>


                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/manage_admin.js') }}"></script>
@stop