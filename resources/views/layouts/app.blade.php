<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'admin.Kokrokooad.com') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body class="nav-md">

        <div  class="container body"  style="width: 100%;">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="{{route('welcome')}}" class="site_title"><span> <img class="img-fluid" src="/images/kokro-yellow.png" alt="Kokrokoo" /></span></a>
                        </div>


                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            @auth()
                            <div class="profile_pic">
{{--                                <img src="/images/img.jpg" alt="..." class="img-circle profile_img">--}}
                            </div>
                            @endauth
                            <div class="profile_info">
{{--                                <span>Welcome,</span>--}}
                                @auth()
{{--                                <h2>{{Auth()->user()->name}}</h2>--}}
                                    @endauth
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                @auth()
                                <h3>Role : {{Auth()->user()->role}}</h3>
                                    @endauth
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('home')}}">Dashboard</a></li>

                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-user"></i> User Management <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('all.users')}}">Users</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-desktop"></i> Subscriptions <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('all.subs')}}">subscriptions</a></li>
{{--                                            <li><a href="{{route('subs.filter')}}">Filter</a></li>--}}



                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-audio-description"></i> Rate card  <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('rate.cards')}}">rate cards</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-table"></i> Transactions <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('transactions')}}">Transactions</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-windows"></i> Audit Trail <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('audits')}}">Audit Trail</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                            @auth()
                            @if(auth()->user()->role == 'Super_admin')
                            <div class="menu_section">
                                <h3>Admin Management</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-user-plus"></i> Admin <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('create.admin')}}">Create</a></li>
                                            <li><a href="{{route('admin.index')}}">users</a></li>
                                        </ul>
                                    </li>
{{--                                    <li><a><i class="fa fa-windows"></i> Audit Trail <span class="fa fa-chevron-down"></span></a>--}}
{{--                                        <ul class="nav child_menu">--}}
{{--                                            <li><a href="#">Audit Trail</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>
                                @endif
                                @endauth

                        </div>
                        <!-- /sidebar menu -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            @if(session()->has('admin-created'))

                                <div class="alert alert-success text-center animated fade-in" >
                                    <p>{{session('admin-created')}}</p>
                                </div>
                            @endif

                            @if(session()->has('not_super_admin'))

                                <div class="alert alert-danger text-center" >
                                    <p>{{session('not_super_admin')}}</p>
                                </div>
                            @endif

                            @if(session()->has('approve-user'))

                                <div class="alert alert-success text-center animated fade-in" id="approve-user" style="position: absolute;z-index: 999;width: 100%">
                                    <p>{{session('approve-user')}}</p>
                                </div>
                            @endif
                            @if(session()->has('profile_edit'))

                                <div class="alert alert-success text-center animated fade-in">
                                    <p>{{session('profile_edit')}}</p>
                                </div>
                            @endif

                            <div class="alert alert-success text-center animated fade-in" id="status" style="display: none;position: absolute;z-index: 10;width: 100%">
                                <p id="message"></p>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        @auth()
{{--                                        <img src="/images/img.jpg" alt="">--}}{{Auth()->user()->name}}
                                        @endauth
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="{{route('profile')}}"> Profile</a></li>

                                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>


{{--                                <li role="presentation" class="dropdown">--}}
{{--                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">--}}
{{--                                        <i class="fa fa-envelope-o"></i>--}}
{{--                                        <span class="badge bg-green">6</span>--}}
{{--                                    </a>--}}
{{--                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">--}}
{{--                                        <li>--}}
{{--                                            <a>--}}
{{--                                                <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>--}}
{{--                                                <span>--}}
{{--                          <span>John Smith</span>--}}
{{--                          <span class="time">3 mins ago</span>--}}
{{--                        </span>--}}
{{--                                                <span class="message">--}}
{{--                          Film festivals used to be do-or-die moments for movie makers. They were where...--}}
{{--                        </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a>--}}
{{--                                                <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>--}}
{{--                                                <span>--}}
{{--                          <span>John Smith</span>--}}
{{--                          <span class="time">3 mins ago</span>--}}
{{--                        </span>--}}
{{--                                                <span class="message">--}}
{{--                          Film festivals used to be do-or-die moments for movie makers. They were where...--}}
{{--                        </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a>--}}
{{--                                                <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>--}}
{{--                                                <span>--}}
{{--                          <span>John Smith</span>--}}
{{--                          <span class="time">3 mins ago</span>--}}
{{--                        </span>--}}
{{--                                                <span class="message">--}}
{{--                          Film festivals used to be do-or-die moments for movie makers. They were where...--}}
{{--                        </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a>--}}
{{--                                                <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>--}}
{{--                                                <span>--}}
{{--                          <span>John Smith</span>--}}
{{--                          <span class="time">3 mins ago</span>--}}
{{--                        </span>--}}
{{--                                                <span class="message">--}}
{{--                          Film festivals used to be do-or-die moments for movie makers. They were where...--}}
{{--                        </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="text-center">--}}
{{--                                                <a>--}}
{{--                                                    <strong>See All Alerts</strong>--}}
{{--                                                    <i class="fa fa-angle-right"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div id="app">
                        @yield('content')

                    </div>
                </div>
                <!-- /page content -->


            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/adminAccountManagement.js') }}"></script>

        @yield('scripts')

        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
{{--        <script src="{{asset('/vendors/datatables.net-bs/js/dataTables.bootstrap.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/datatables.net-buttons/js/dataTables.buttons.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/datatables.net-buttons/js/buttons.flash.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/datatables.net-buttons/js/buttons.html5.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/datatables.net-buttons/js/buttons.print.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/datatables.net-keytable/js/dataTables.keyTable.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/datatables.net-responsive/js/dataTables.responsive.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/datatables.net-scroller/js/dataTables.scroller.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/jszip/dist/jszip.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/pdfmake/build/pdfmake.js')}}"></script>--}}
{{--        <script src="{{asset('/vendors/pdfmake/build/vfs_fonts.js')}}"></script>--}}

</body>
</html>
