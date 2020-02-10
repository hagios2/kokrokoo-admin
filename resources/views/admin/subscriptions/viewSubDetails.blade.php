@extends('layouts.app')

@section('content')

      {{--    <view-rate-cards :message="'{!! \Illuminate\Support\Facades\Session::get('delete') !!}'"  :media="'{!! auth()->user()->media !!}'"></view-rate-cards>--}}

      {{--    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">--}}
      {{--        <div class="modal-dialog modal-lg">--}}
      {{--            <div class="modal-content">--}}
      {{--                <h3>Hello world</h3>--}}
      {{--            </div>--}}
      {{--        </div>--}}
      {{--    </div>--}}

      <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header">
                  <div class="row align-items-end">
                        <div class="col-lg-8">
                              <div class="page-header-title">
                                    <div class="d-inline">
                                          <h4>Subscription Details</h4>
                                    </div>
                              </div>
                        </div>
                        <div class="col-lg-4">
                              <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                          @foreach($sub as $subs)
                                                <span class="float-right">{{$subs->file_name}} | {{$subs->file_size .'kb'}}</span>
                                          @endforeach
                                    </ul>
                              </div>
                        </div>

                  </div>
            </div>
            <!-- Page-header end -->

            <!-- Page-body start -->
            <div class="page-body">
                  <!-- Default Styling table start -->
                  @foreach($sub as $subs)
                  <div class="row">
                        <div class="col-sm-12">
                              <div class="card text-center">
                                    {{--            <search></search>--}}
                                    <div class="card-block ">


                                          @if($subs->file_type === 'mp3' || $subs->file_type === 'wav')
                                                <audio controls src="{{$subs->file_path.$subs->file_name}}" type="audio/*"></audio>
                                          @endif

                                          @if($subs->file_type === 'jpeg' || $subs->file_type == 'jpg' || $subs->file_type == 'png')
                                          <img src="{{$subs->file_path.$subs->file_name}}"  alt="image">
                                                @endif

                                                @if($subs->file_type === 'mp4' || $subs->file_type === 'avi' || $subs->file_type === 'wma')
                                                      <video src="{{$subs->file_path.$subs->file_name}}"  ></video>
                                                      @endif



                                                @if($subs->file_type == 'csv' || $subs->file_type == 'odt' || $subs->file_type == 'xlsx' || $subs->file_type == 'xls' || $subs->file_type == 'docx' || $subs->file_type == 'doc')
                                                <p>Please download file to view</p>
                                                <a href="download-sub/{{$subs->subscription_id}}"  role="button" class="btn btn-primary"> Download file <i class="fa fa-download"></i> </a>
                                                @endif
                                    </div>


                              </div>
                        </div>
{{--                              @if($subs->status === 'pending')--}}
{{--                                    <form method="post" action="{{route('admin.accept.subs')}}">--}}
{{--                                          @csrf--}}
{{--                                          <input type="hidden" value="{{$subs->subscription_id}}" name="sub_id">--}}
{{--                                          <input type="hidden" value="{{$subs->client_id}}" name="user_id">--}}

{{--                                          <button type="submit" role="button" class="btn btn-secondary" style="margin-left: 15px;">Approve</button>--}}
{{--                                    </form>--}}
{{--                                          <form method="post" action="{{route('admin.reject.subs')}}">--}}
{{--                                                @csrf--}}
{{--                                                <input type="hidden" value="{{$subs->subscription_id}}" name="sub_id">--}}
{{--                                                <input type="hidden" value="{{$subs->client_id}}" name="user_id">--}}
{{--                                                <button type="submit" class="btn btn-danger">Reject</button>--}}
{{--                                          </form>--}}

{{--                              @endif--}}

                        <div class="btn-group float-right">
{{--                              <a href="download-sub/{{$subs->subscription_id}}"  role="button" class="btn btn-secondary"> Download <i class="fa fa-download" ></i> </a>--}}
                              <a href="{{route('all.subs')}}" class="btn btn-secondary">Back</a>
                        </div>


                        </div>
                  </div>
                        @endforeach
            </div>



@endsection
@section('datatable-scripts')
      <script src="{{ asset('js/datatable-files/rate_cards.js') }}"></script>
@stop