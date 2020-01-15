@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>New <small>Users</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {{--                <p class="text-muted font-13 m-b-30">--}}
                {{--                    The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.--}}
                {{--                </p>--}}
                {{--                <table id="datatable-buttons" class="table table-striped table-bordered">--}}
                <input type="text" class="form-control pull-right" placeholder="search" id="search" style="width: 30%;border-radius: 15px;line-height: 160px;margin-bottom: -20px;">

                <table id="laravel_datatable" class="table table-striped table-bordered">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone1</th>
                        <th>Account</th>
                        <th>Industry</th>
                        <th>Company</th>
                        {{--                        <th>Industry</th>--}}
                        <th>Title</th>
                        <th>Status</th>
                        <th>Last login</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th width="110px">Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    {{--                    <tr>--}}
                    {{--                        <td>Garrett Winters</td>--}}
                    {{--                        <td>Accountant</td>--}}
                    {{--                        <td>Tokyo</td>--}}
                    {{--                        <td>63</td>--}}
                    {{--                        <td>2011/07/25</td>--}}
                    {{--                        <td>$170,750</td>--}}
                    {{--                        <td>Tiger Nixon</td>--}}
                    {{--                        <td>System Architect</td>--}}
                    {{--                        <td>Edinburgh</td>--}}
                    {{--                        <td>61</td>--}}
                    {{--                        <td>2011/04/25</td>--}}
                    {{--                        <td>$320,800</td>--}}
                    {{--                        <td>2011/04/25</td>--}}
                    {{--                        <td>--}}
                    {{--                            <div class="btn-group btn-group-sm">--}}
                    {{--                                <button type="button" class="btn btn-default"><i class="fa fa-eye" ></i> </button>--}}
                    {{--                                <button type="button" class="btn btn-info"><i class="fa fa-edit"></i> </button>--}}
                    {{--                                <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> </button>--}}
                    {{--                            </div>--}}
                    {{--                        </td>--}}
                    {{--                    </tr>--}}


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection