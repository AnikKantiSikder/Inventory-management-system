<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
         <!-- Base Css Files -->
        <link href="{{asset('public/Admin/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{asset('public/Admin/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/Admin/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/Admin/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('public/Admin/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{asset('public/Admin/css/waves-effect.css')}}" rel="stylesheet">


        <!-- Custom Files -->
        <link href="{{asset('public/Admin/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/Admin/css/style.css')}}" rel="stylesheet" type="text/css" />

        <script src="{{asset('public/Admin/js/modernizr.min.js')}}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
         <script src="https://use.fontawesome.com/21f8408d1d.js"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <!-- DataTables -->
        <link href="{{asset('public/Admin/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- sweet alerts -->
        <link href="{{asset('public/Admin/assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">

    <!-- Styles -->
  
</head>
<body>
           <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
                        <!-- Authentication Links -->
                        @guest

                        @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"></a>
                                </li>
                            @endif
                            @else
                                        <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="md md-terrain"></i> <span>Admin </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{URL::to('public/Admin/images/avatar-1.jpg')}}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                           <i class="md md-settings-power"></i> Logout</a>

                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}" class="waves-effect active">
                                <i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li>
                                <a href="{{ route('pos') }}" class="waves-effect">
                                <i class="md-keyboard"></i><span class="text-primary"> <b>POS</b> </span></a>
                            </li>

                        <!--For employees------------------------------------------------------------------------------------------------------------------------------------------->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-users" aria-hidden="true"></i>
                                <span> Employees</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">

                                    <li><a href="{{ route('all.employee') }}">All employees</a></li>
                                    
                                    <li><a href="{{ route('add.employee') }}">Add employee</a></li>
                                
                                </ul>
                            </li>
                            <!--For customers------------------------------------------------------------------------------------------------------------------------------------------->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-people" aria-hidden="true"></i>
                                <span> Customers </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">

                                    <li><a href="{{ route('all.customers') }}">All customers</a></li>
                                    
                                    <li><a href="{{ route('add.customers') }}">Add customers</a></li>
                                
                                </ul>
                            </li>
                            <!--For suppliers------------------------------------------------------------------------------------------------------------------------------------------->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-people-outline"></i> <span> Suppliers</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('all.suppliers')}}">All suppliers</a></li>
                                    <li><a href="{{route('add.suppliers')}}">Add suppliers</a></li>
                                </ul>
                            </li>

                            <!--For advance salaries------------------------------------------------------------------------------->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-local-atm"></i> <span> Advance salary(EMP)</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('all.advancesalaries')}}">All advance salaries</a></li>
                                    <li><a href="{{route('advance.salaries')}}">Add advance salaries</a></li>
                                </ul>
                            </li>

                            
                            <!--For pay salary------------------------------------------------------------------------------------------------------------------------------------------->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-attach-money"></i> <span> Salaries(EMP)</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('pay.salaries')}}">Pay salary</a></li>
                                    <li><a href="">Last month salary</a></li>
                                </ul>
                            </li>

                            <!--For category------------------------------------------------------------------------------------------------------------------------------------------->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-now-widgets"></i> <span>Category</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('all.categories')}}">All category</a></li>
                                    <li><a href="{{route('add.categories')}}">Add category</a></li>
                                </ul>
                            </li>

                            <!--For Product------------------------------------------------------------------------------------------------------------------------------------------->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-play-install"></i> <span>Products</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('all.products')}}">All product</a></li>
                                    <li><a href="{{route('add.products')}}">Add product</a></li>
                                </ul>
                            </li>
                            <!--For Expense---------------------------------------------------------------------------->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-receipt"></i> <span>Expense</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('add.expense')}}">Add new</a></li>
                                    <li><a href="{{route('today.expense')}}">Today expense</a></li>
                                    <li><a href="{{route('monthly.expense')}}">Monthly expense</a></li>
                                    <li><a href="{{route('yearly.expense')}}">Yearly expense</a></li>
                                </ul>
                            </li>
                             <!--For Orders---------------------------------------------------------------------->
                             <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-gradient"></i> <span>Orders</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="">Pending orders</a></li>
                                    <li><a href="">Last</a></li>
                                </ul>
                            </li>                           
                            
                             <!--For Sales report---------------------------------------------------------------------->
                             <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-description"></i> <span>Sales report</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="">First</a></li>
                                    <li><a href="">Last</a></li>
                                </ul>
                            </li>
                               
                            <!--For Attendence------------------------------------------------------------------------->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-assignment"></i> <span>Attendence</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('take.attendence')}}">Take attendence</a></li>
                                    <li><a href="{{route('all.attendence')}}">All attendence</a></li>
                                </ul>
                            </li>
                            
                            <!--For Settings------------------------------------------------------------------------------------------------------------------------------------------->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-settings"></i> <span>Settings</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('website.setting')}}">Change setting</a></li>
                                </ul>
                            </li>
                            
        
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 

            @endguest
        </div>



        <main class="py-4">
            @yield('content')
        </main>


    </div>



    <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('public/Admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('public/Admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/Admin/js/waves.js')}}"></script>
        <script src="{{asset('public/Admin/js/wow.min.js')}}"></script>
        <script src="{{asset('public/Admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/Admin/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('public/Admin/assets/chat/moment-2.2.1.js')}}"></script>
        <script src="{{asset('public/Admin/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('public/Admin/assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{asset('public/Admin/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('public/Admin/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('public/Admin/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

        <!-- sweet alerts -->
        <script src="{{asset('public/Admin/assets/sweet-alert/sweet-alert.min.js')}}"></script>
        <script src="{{asset('public/Admin/assets/sweet-alert/sweet-alert.init.js')}}"></script>

        <!-- flot Chart -->
        <script src="{{asset('public/Admin/assets/flot-chart/jquery.flot.js')}}"></script>
        <script src="{{asset('public/Admin/assets/flot-chart/jquery.flot.time.js')}}"></script>
        <script src="{{asset('public/Admin/assets/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('public/Admin/assets/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('public/Admin/assets/flot-chart/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('public/Admin/assets/flot-chart/jquery.flot.selection.js')}}"></script>
        <script src="{{asset('public/Admin/assets/flot-chart/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('public/Admin/assets/flot-chart/jquery.flot.crosshair.js')}}"></script>

        <!-- Counter-up -->
        <script src="{{asset('public/Admin/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/Admin/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="{{asset('public/Admin/js/jquery.app.js')}}"></script>

        <!-- Dashboard -->
        <script src="{{asset('public/Admin/js/jquery.dashboard.js')}}"></script>

        <!-- Chat -->
        <script src="{{asset('public/Admin/js/jquery.chat.js')}}"></script>

        <!-- Todo -->
        <script src="{{asset('public/Admin/js/jquery.todo.js')}}"></script>

        <script src="{{asset('public/Admin/assets/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('public/Admin/assets/datatables/dataTables.bootstrap.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>

        <script type="public/Admin/text/javascript">
        
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

   

        
        <script>

        @if(Session:: has('message'))
        var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'info':
                toastr.info("{{Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{Session::get('message') }}");
                break;
        }
        @endif
        

        </script>

</body>
</html>
