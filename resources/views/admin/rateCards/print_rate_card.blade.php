@extends('layouts.app')
@section('content')
   <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
               <h4 class="page-header">Print</h4>
               <table id="laravel_datatable" class="table table-striped table-bordered table-responsive table-custome">

                   <thead>
                   <tr>
                       <th>ID</th>
                       <th>#</th>
                       <th>Rate card ID</th>
                       <th>Media</th>
                       <th>Media house</th>
                       <th>Rate card</th>
                       <th>Created at</th>
                       <th>Updated at</th>
                       <th>Action</th>
                   </tr>
                   </thead>
               </table>
            </div>


             <rate-card></rate-card>
       </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/print_rate_card.js') }}"></script>
@stop