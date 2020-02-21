@extends('layouts.app')
@section('content')
        <div class="x_panel">
                <h2 class="page-header">Users</h2>
                <table id="laravel_datatable" class="table table-striped table-bordered table-custome">
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

@endsection

@section('scripts')
    <script src="{{ asset('js/users.js') }}"></script>
    @stop