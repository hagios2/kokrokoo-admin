@extends('layouts.app')
@section('content')
   <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
               <h4 class="page-header">TV & Radio</h4>
               <table class="table table-striped table-bordered data-table table-custome">

                   <thead>
                   <tr style="font-weight:100!important">
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


             <rate-card></rate-card>
       </div>
    </div> 
@endsection

@section('scripts')
    <script src="{{ asset('js/rate_card.js') }}"></script>
@stop