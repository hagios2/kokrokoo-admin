@extends('layouts.app')
@section('content')
        <div class="x_panel">
            <div class="x_title">
                <h2>Audit Trail <small></small></h2>

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
                        <th>Activity by</th>
                        <th>Activities</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/audit_trail.js') }}"></script>
@stop