@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Profile <small></small></h2>


                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('profile.edit')}}">
                    @csrf
                    <div class="form-group">
                        <label for="client_name" class="control-label col-md-3 col-sm-3 col-xs-12">Full name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12" id="client_name" name="name" value="{{$name}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="client_id" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" class="form-control col-md-7 col-xs-12" id="client_id" name="email"  value="{{$email}}" }} required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sub_id" class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12" id="sub_id" name="phone" value="{{$phone}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="trans_id_id" class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12" id="trans_id" name="title" value="{{$title}}" required>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type='submit'  class="btn btn-primary btn-large">Edit profile</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection








