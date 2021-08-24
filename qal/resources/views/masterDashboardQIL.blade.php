<!DOCTYPE html>
<html dir="ltr" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('resources/assets/images/fav.png')}}">
    <title>QIAL - Quality Integrated Agro Limited</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ URL::asset('resources/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::asset('resources/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('resources/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('resources/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{URL::asset('resources/dist/css/style.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('resources/assets/libs/select2/dist/css/select2.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
        window.Laravel  = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header"  style="background: #007f3d">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="{{ URL('/')}}" class="logo"> 
                            <!-- Logo icon -->
                            {{-- <img src="{{URL::asset('resources/assets/images/fav.png')}}" width="30" height="30" />
                            <br /> --}}
                            <b class="logo-icon" style="font-size: 15px; color: #FFF; text-align: center; width: 70px;">
                                {{-- <img src="{{URL::asset('resources/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                                <img src="{{URL::asset('resources/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" /> --}}
                                {{-- <img src="{{URL::asset('resources/assets/images/fav.png')}}" width="30" height="30" /> <br /> --}}
                                Quality Aquabreeds Limited
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                {{-- <img src="{{URL::asset('resources/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                                <img src="{{URL::asset('resources/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /> --}}
                            </span>
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 mr-1"></i>
                                    <div class="ml-1 d-none d-sm-block">
                                        <span>Search</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li> --}}
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{URL::asset('resources/assets/images/users/2.jpg')}}" alt="user" class="rounded-circle" width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="{{URL::asset('resources/assets/images/users/2.jpg')}}" alt="user" class="rounded-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{ Auth::user()->name }}</h4>
                                        <p class=" m-b-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <div class="profile-dis scrollable">
                                    {{-- <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                    <div class="dropdown-divider"></div> --}}
                                    <a class="dropdown-item" href="{{ URL('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    <div class="dropdown-divider"></div>

                                    <form id="logout-form" action="{{ URL('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('masterMenu')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('content')
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Designed and Developed by QFL IT
                {{-- <a href="">Md. Masud Rana</a>. --}}
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{URL::asset('resources/assets/libs/jquery/dist/jquery.min.js')}}"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    


    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{URL::asset('resources/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{URL::asset('resources/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{URL::asset('resources/dist/js/app.min.js')}}"></script>
    <script src="{{URL::asset('resources/dist/js/app.init.js')}}"></script>
    <script src="{{URL::asset('resources/dist/js/app-style-switcher.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{URL::asset('resources/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{URL::asset('resources/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{URL::asset('resources/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{URL::asset('resources/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{URL::asset('resources/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->

    <!--chartis chart-->
    <script src="{{URL::asset('resources/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{URL::asset('resources/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!--c3 charts -->
    <script src="{{URL::asset('resources/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{URL::asset('resources/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{URL::asset('resources/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{URL::asset('resources/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{URL::asset('resources/dist/js/pages/dashboards/dashboard1.js')}}"></script>

    

    <!--This page plugins -->
    <script src="{{URL::asset('resources/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script src="{{URL::asset('resources/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>

    <script src="{{URL::asset('resources/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{URL::asset('resources/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('resources/dist/js/pages/forms/select2/select2.init.js')}}"></script>

    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#fromDate" ).datepicker({ dateFormat: 'dd-mm-yy' });
        $( "#toDate" ).datepicker({ dateFormat: 'dd-mm-yy' });
    } );

    function orderQuery()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var customerName     = $("#customerName").val();
        var customerMobile   = $("#customerMobile").val();
        var customerAddress  = $("#customerAddress").val();
        var comment          = $("#comment").val();
        var queryLead        = $("#queryLead").val();

        if(customerName=='')
        {
            document.getElementById('customerName').style.borderColor = "red";
            alertify.error('Customer Name Required.'); 
            return false;
        }
        document.getElementById('customerName').style.borderColor = "";

        $.ajax({
            method: "POST",
            url: '{{url("/qil/query-entry-submit")}}',
            data: {'customerName': customerName, 'customerMobile': customerMobile, 'customerAddress': customerAddress, 'comment': comment, 'queryLead': queryLead}
        })
        .done(function (response)
        {
            $("#customerName").val('');
            $("#customerMobile").val('');
            $("#customerAddress").val('');
            $("#comment").val('');
            $('#queryLead option').prop('selected', function() {
                return this.defaultSelected;
            });

            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Order Query Successfully Added.');              
        });
    }

    function order()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var customerID     = $("#customerID").val();
        var lead           = $("#lead").val();

        if(customerID=='')
        {
            document.getElementById('customerID').style.borderColor = "red";
            alertify.error('Customer ID Required.'); 
            return false;
        }
        document.getElementById('customerID').style.borderColor = "";    
        
        $.ajax({
            method: "POST",
            url: '{{url("/qil/order-entry-submit")}}',
            data: {'customerID': customerID, 'lead': lead}
        })
        .done(function (response)
        {
            $("#customerID").val('');
            $('#lead option').prop('selected', function() {
                return this.defaultSelected;
            });

            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Order Successfully Added.');             
        });
    }

    function hover(id) {
        document.getElementById(id).style.borderColor = "";
    }
 </script>


</body>
</html>