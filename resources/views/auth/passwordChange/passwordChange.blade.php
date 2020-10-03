@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Change Password <small></small></h2>


                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('change.password')}}">
                    @csrf
                    <div class="form-group">
                        <label for="client_name" class="control-label col-md-3 col-sm-3 col-xs-12">Old Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" class="form-control col-md-7 col-xs-12 {{ $errors->has('current_password') ? 'errors' : '' }}" id="client_name" name="current_password"  required>
                                       @if ($errors->has('current_password'))
                                                <span class="text-danger animated fadeIn error-text" role="alert">{{ $errors->first('current_password') }}</span>
                                       @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="client_id" class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" class="form-control col-md-7 col-xs-12 {{ $errors->has('new_password') ? ' errors' : '' }}" id="client_id" name="new_password" required>
                              @if ($errors->has('new_password'))
                                                <span class="text-danger animated fadeIn error-text" role="alert">{{ $errors->first('new_password') }}</span>
                                       @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sub_id" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm New Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" class="form-control col-md-7 col-xs-12 {{ $errors->has('new_confirm_password') ? 'errors' : '' }}" id="sub_id" name="new_confirm_password"  required>
                              @if ($errors->has('current_password'))
                                                <span class="text-danger animated fadeIn error-text" role="alert">{{ $errors->first('new_confirm_password') }}</span>
                                       @endif
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type='submit'  class="btn btn-primary btn-large">Change Password</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection








