@extends('layouts.app')
@section('content')
        <div class="x_panel">
                <h2 class="page-header">Audit Trail</h2>
                <table id="laravel_datatable" class="table table-striped table-bordered table-responsive table-custome">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>#</th>
                        <th>Activity by</th>
                        <th>Activities</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                </table>
            </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/audit_trail.js') }}"></script>
@stop