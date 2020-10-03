@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
                <h4 class="page-header">Manage Admins<small></small></h4>
                <table id="laravel_datatable" class="table table-striped table-bordered table-custome">

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

@endsection

@section('scripts')
    <script src="{{ asset('js/manage_admin.js') }}"></script>
@stop