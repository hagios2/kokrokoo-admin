@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4 class="page-header">Create admin <small></small></h4>


                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('store.admin')}}">
                        @csrf
                        <div class="form-group">
                            <label for="client_name" class="control-label col-md-3 col-sm-3 col-xs-12">Full name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12 {{ $errors->has('name') ? 'errors' : '' }}" id="client_name" name="name" value="{{old('name')}}" required>
                                 @if ($errors->has('name'))
                                                <span class="text-danger animated fadeIn error-text" role="alert">{{ $errors->first('name') }}</span>
                                       @endif
                            </div>
                        </div>

                    <div class="form-group">
                        <label for="client_id" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" class="form-control col-md-7 col-xs-12 {{ $errors->has('email') ? 'errors' : '' }}" id="client_id" name="email"  value="{{old('email')}}" }} required>
                             @if ($errors->has('email'))
                                                <span class="text-danger animated fadeIn error-text" role="alert">{{ $errors->first('email') }}</span>
                                       @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sub_id" class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12 {{ $errors->has('phone') ? 'errors' : '' }}" id="sub_id" name="phone" value="{{old('phone')}}" required>
                             @if ($errors->has('phone'))
                                                <span class="text-danger animated fadeIn error-text" role="alert">{{ $errors->first('phone') }}</span>
                                       @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="trans_id_id" class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12  {{ $errors->has('name') ? 'errors' : '' }}" id="trans_id" name="title" value="{{old('title')}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="trans_id_id" class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12 {{ $errors->has('role') ? 'errors' : '' }}" id="trans_id" name="role" value="{{old('role')}}" required>
                                <option>Super_admin</option>
                                <option>Admin</option>
                            </select>
                             @if ($errors->has('role'))
                                                <span class="text-danger animated fadeIn error-text" role="alert">{{ $errors->first('role') }}</span>
                                       @endif
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type='submit'  class="btn btn-primary btn-large">Create admin</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection








