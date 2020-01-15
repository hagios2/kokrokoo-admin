@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Subscription details <small></small></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            @if($ext == 'xlsx' || $ext == 'odt' || $ext == 'xls' || $ext == 'csv')
                            <a href="view/file/{{$sub_id}}/{{$client_id}}" type='button' class="btn btn-default btn-large">View ad</a>
                             @endif
                            @if($ext == 'mp4' || $ext == 'mp3' || $ext == 'mwv' || $ext == 'mkv')
                                <button  class="btn btn-default btn-large" data-toggle="modal" data-target="#viewFile">View ad</button>
                            @endif
                            @if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png')
                                <button  class="btn btn-default btn-large" data-toggle="modal" data-target="#viewFile">View ad</button>
                            @endif

                        </div>
                    </div>




                <div class="modal fade" id="viewFile" tabindex="-1" role="dialog" style="margin-left: 225px;">
                    <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class-modal-title>{{$file_name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body text-center">
                                    <div>
                                        @if($ext == 'mp4' || $ext == 'mp3' || $ext == 'mkv' || $ext == 'wav' || $ext == 'wmv')
                                        <video
                                                class="embed-responsive-item"
                                                controls  src="/test_uploads/{{$file_name}}" style="width:80%;min-height:400px;" frameborder="0">

                                        </video>
                                            @endif
                                    </div>

                                    <!--if file type is image-->
                                    @if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png')
                                        <img src="/test_uploads/{{$file_name}}" width="320" height="240px" frameborder="0"/>
                                        @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                    </div>
                </div>
                            </div>
                        </div>
                    </div>

@endsection








