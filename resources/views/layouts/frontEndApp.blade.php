
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Invnetory System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- C3 charts css -->
        <link href="{{asset('assets/plugins/c3/c3.min.css" rel="stylesheet')}}" type="text/css"  />
         <!-- Sweet Alert -->
        <link href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        {{-- <link href="{{ asset('assets/css/dataTables.css') }}" rel="stylesheet" type="text/css" /> --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <link href="{{ asset('assets/tost/toastr.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        @yield('addNewCss')


        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                                <span>
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="" height="25">
                                </span>
                        <i>
                            <img src="{{ asset('assets/images/logo_sm.png') }}" alt="" height="28">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-bell noti-icon"></i>
                                <span class="badge badge-pink noti-icon-badge">4</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><span class="badge badge-danger float-right">5</span>Notification</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="icon-bubble"></i></div>
                                    <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="icon-user"></i></div>
                                    <p class="notify-details">New user registered.<small class="text-muted">1 min ago</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="icon-like"></i></div>
                                    <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">1 min ago</small></p>
                                </a>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
                                    View All
                                </a>

                            </div>
                        </li>

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                               {{ Auth::user()->name }}
                                <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">

                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Welcome ! {{Auth::user()->name}} </small> </h5>
                                </div>

                                <!-- item-->
                                {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-settings"></i> <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="ala();">
                                    <i class="zmdi zmdi-lock-open"></i> <span>Lock Screen</span> --}}
                                    {{-- <button type="button" class="" id="sa-warning">Click me</button> --}}

                                {{-- </a> --}}

                                <!-- item-->
                                {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                </a> --}}
                                <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                    onclick="

                                    event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        @yield('searchpanel')
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Navigation</li>
                            <li>
                            <a href="{{__('/')}}">
                                    <i class="fi-air-play"></i><span class="badge badge-success pull-right">2</span> <span> Dashboard </span>
                                </a>
                                {{-- <ul class="nav-second-level" aria-expanded=false>
                                    <li><a href="index.html">Dashboard 1</a></li>
                                    <li><a href="dashboard-2.html">Dashboard 2</a></li>
                                </ul> --}}
                            </li>
                            <li>
                                <a href="{{ Route('category') }}"><i class="fi-target"></i> <span> Category </span></a>
                                {{-- <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ Route('addCategory') }}">Add Category</a></li>
                                    <li><a href="admin-sweet-alert.html">Sweet Alert</a></li>
                                </ul> --}}
                            </li>

                            <li>
                                <a href=" {{Route('supplier')}} "><i class="fi-briefcase"></i> <span> Supplier </span></a>

                            </li>

                            <li>
                                <a ><i class="fi-help"></i><span> Stock </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href=" {{Route('viewStock')}} ">View Stock</a></li>
                                    <li><a href=" {{Route('products')}} ">Products</a></li>
                                    <li><a href=" {{Route('stockManager')}} ">Stock Manager</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-box"></i><span> Sale </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href=" {{Route("saleProduct")}} ">Sale Product</a></li>
                                    <li><a href=" {{Route("queue")}} ">Queue</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span> Report </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href=" {{Route('allBill')}} ">All Bills</a></li>
                                    <li><a href=" {{Route('showEachBill')}} ">Show Each Bill</a></li>
                                </ul>
                            </li>



                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">@yield('pageHeading')</h4>

                                    <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{__('/')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active">@yield('pageHeading')</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
















                        <div class="row ">
                            <div class="col-12 d-flex justify-content-center">
                                @yield('content')
                            </div>
                        </div>
                        <!-- end row -->















                    </div> <!-- container -->

                </div> <!-- content -->

                {{-- <footer class="footer text-right">
                    2017 © Adminox. - Coderthemes.com
                </footer> --}}

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->


        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/tether.min.js') }}"></script><!-- Tether for Bootstrap -->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>

        <!-- Counter js  -->
        <script src="{{ asset('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

        <!--C3 Chart-->
        <script type="text/javascript" src="{{ asset('assets/plugins/d3/d3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/c3/c3.min.js') }}"></script>

        <!--Echart Chart-->
        <script src="{{ asset('assets/plugins/echart/echarts-all.js') }}"></script>

        <!-- Dashboard init -->
        <script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
        {{-- <script src="{{ asset('assets/js/dataTables.js') }}"></script> --}}

                <!-- Sweet-Alert  -->
        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/pages/jquery.sweet-alert.init.js') }}"></script>
        <script src="{{ asset('assets/tost/jquery3.4.1.min.js') }}"></script>
        <script src="{{ asset('assets/tost/toastr.min.js') }}"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
            <script>
                @if(Session::has('greenStatus'))
                            toastr.success("{{ Session::get('greenStatus') }}");
                @endif
            </script>
            <script>
                @if(Session::has('redStatus'))
                            toastr.error("{{ Session::get('redStatus') }}");
                @endif
            </script>
            <script>
                @if(Session::has('yellowStatus'))
                            toastr.warning("{{ Session::get('yellowStatus') }}");
                @endif
            </script>
            <script>
                @if($errors->all())
                        toastr.error("Error Occared ! Please Check The Form Requirements 😢");
                        @foreach ($errors->all() as $item)
                            toastr.warning("{{ $item }}");
                        @endforeach
                @endif
            </script>
        @yield('addNewScript');

    </body>
</html>
