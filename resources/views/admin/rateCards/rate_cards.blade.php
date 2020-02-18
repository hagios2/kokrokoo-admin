@extends('layouts.app')
@section('content')
   <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
           <div class="x_title">
               <h2>Rate cards <small></small></h2>

               <div class="clearfix"></div>
           </div>
           <div class="x_content">
               <input type="text" class="form-control pull-right" placeholder="search" id="search" style="width: 50%;border-radius: 15px;line-height: 160px;margin-bottom: -20px;">

               <table id="laravel_datatable" class="table table-striped table-bordered table-responsive">

                   <thead>
                   <tr>
                       <th>ID</th>
                       <th>#</th>
                       <th>Rate card ID</th>
                       <th>Media house</th>
                       <th>Rate card</th>
                       <th>Created at</th>
                       <th>Updated at</th>
                       <th>Action</th>
                   </tr>
                   </thead>
               </table>
            </div>


             <example-component></example-component>
       </div>
    </div> 
@endsection

@section('scripts')
    <script src="{{ asset('js/rate_card.js') }}"></script>
@stop