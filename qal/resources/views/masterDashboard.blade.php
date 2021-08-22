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
    <title>QAL - Quality Aquabreeds Limited</title>
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
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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

    <script type="text/javascript">
        function zoneWiseCust(id)
        {
            //alert(id);

            $.ajax({
                method: "GET",
                url: '{{url("/zone-wise-agent")}}',
                data: {'id': id}
            })
            .done(function (response)
            {
                // alert(response);
                $("#customerid").html(response);                
            });
        }

        function zoneWiseRegion(id)
        {
            //alert(id);

            $.ajax({
                method: "GET",
                url: '{{url("/zone-wise-region")}}',
                data: {'zoneid': id}
            })
            .done(function (response)
            {
                // alert(response);
                $("#regionid").html(response);                
            });
        }

        function reportDO()
        {
            var fromDate = $("#fromDate").val();
            var toDate   = $("#toDate").val();
            var agentid   = $("#agentid").val();

            $.ajax({
                method: "GET",
                url: '{{url("/report/do-report")}}',
                data: {'fromDate': fromDate, 'toDate': toDate, 'agentid': agentid}
            })
            .done(function (response)
            {
                //alert(response);
                //$("#customerid").html(response);                
            });
        }

        function agentInfo(id)
        {
            $.ajax({
                method: "GET",
                url: '{{url("/agent-info")}}',
                data: {'id': id}
            })
            .done(function (response)
            {
                //alert(response);
                var x = response.split("~");
                //alert(x[0]);

                $("#address").val(x[0]);                
                $("#deliveryPoint").val(x[1]);                
            });
        }

        function agentID(id)
        {
            //alert(id);
            $.ajax({
                method: "GET",
                url: '{{ url("/factory/agent-code") }}',
                data: {'id': id}
            })
            .done(function (response)
            {
                //alert(response);
                var x = response.split("~");
                $("#address").val(x[0]);                
                $("#deliveryPoint").val(x[1]);                
                $("#name").val(x[2]);                
                $("#mobile").val(x[3]);                
            });
        }

        function doID(id)
        {
            //alert(id);
            if(id.length >=7)
            {
                $.ajax({
                    method: "GET",
                    url: '{{ url("/factory/do-code") }}',
                    data: {'id': id}
                })
                .done(function (response)
                {
                    //alert(response);
                    var x = response.split("~");
                    $("#zoneid").val(x[0]);                
                    $("#regionid").val(x[1]);                
                    $("#customerid").val(x[2]);                
                    $("#address").val(x[3]);                
                    $("#deliveryPoint").val(x[4]);         
                    $("#mobile").val(x[5]);         
                    $("#tilapiaQty").val(x[7]);         
                    $("#tilapiaQtyCompl").val(x[8]);         
                    $("#pungasQty").val(x[9]);         
                    $("#pungasQtyCompl").val(x[10]);         
                    $("#agentid").val(x[11]);         
                });
            }
        }

        function challanID(id)
        {
            if(id.length >=7)
            {
                //alert(id);
                $.ajax({
                    method: "GET",
                    url: '{{ url("/factory/invoice-code") }}',
                    data: {'id': id}
                })
                .done(function (response)
                {
                    //alert(response);
                    var x = response.split("~");
                    $("#zoneid").val(x[0]);                
                    $("#regionid").val(x[1]);                
                    $("#customerid").val(x[2]);                
                    $("#address").val(x[3]);                
                    $("#deliveryPoint").val(x[4]);         
                });
            }
        }

        function fivePer(val)
        {
            if(val!=0)
            {
                var fivePer = (val * 5)/100;
                $("#complementaryQtyTilapia").val(fivePer);
            }
            else
            {
                $("#complementaryQtyTilapia").val('');
            }
        }

        function fivePer2(val)
        {
            if(val!=0)
            {
                var fivePer = (val * 5)/100;
                $("#complementaryQtyPungas").val(fivePer);
            }
            else
            {
                $("#complementaryQtyPungas").val('');
            }
        }

     
        function groupWiseSubGroup(id)
        {
            //alert(id);

            $.ajax({
                method: "GET",
                url: '{{url("/group-wise-subgroup")}}',
                data: {'id': id}
            })
            .done(function (response)
            {
                // alert(response);
                $("#itemsubgroup_id").html(response);                
            });
        }

        function subgroupWiseCategory(id)
        {
           // var subgroupid = $("#subgroup").val();
           // var subgroupid = $("#category").val();

            $.ajax({
                method: "GET",
                url: '{{url("/subgroup-wise-category")}}',
                data: {'id': id}
                //data: {'inventoryid': inventoryid,'groupid': groupid, 'subgroupid': subgroupid}
               
            })
            .done(function (response)
            {
                // alert(response);
                $("#item_category_id").html(response);                
            });
        }

//Requisition 

        function groupWiseItemName(id)
        {
            //alert(id);

            $.ajax({
                method: "GET",
                url: '{{url("/group-wise-intemname")}}',
                data: {'id': id}
            })
            .done(function (response)
            {
                // alert(response);
                $("#item_name").html(response);                
            });
        }

        function ItemNameWiseUnit(id)
        {
            //alert(id);

            $.ajax({
                method: "GET",
                url: '{{url("/intemname-wise-unit")}}',
                data: {'id': id}
            })
            .done(function (response)
            {
                // alert(response);
                $("#unit").val(response);                
            });
        }

//Purchase Order 

        function requisitionWiseItemName(id)
        {
            //alert(id);

            $.ajax({
                method: "GET",
                url: '{{url("/requisition-wise-intemname")}}',
                data: {'id': id}
            })
            .done(function (response)
            {
                // alert(response);
                $("#item_name").html(response);                
            });
        }

        function ItemNameWiseQuantity(id)
        {
            //alert(id);

            $.ajax({
                method: "GET",
                url: '{{url("/intemname-wise-quantity")}}',
                data: {'id': id}
            })
            .done(function (response)
            {
                 //alert(response);
                $("#quantity").val(response);                
            });
        }

        function printDiv() {
            var DivID = document.getElementById("section-to-print").innerHTML;
            var disp_setting="toolbar=yes,location=no,";
            disp_setting+="directories=yes,menubar=yes,";
            disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25";
               var content_vlue = document.getElementById("section-to-print").innerHTML;
               var docprint=window.open("","",disp_setting);
               docprint.document.open();
               docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
               docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
               docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
               docprint.document.write('<meta name="viewport" content="width=device-width, initial-scale=1">');
               docprint.document.write('<head>');
               
               docprint.document.write('<link href="{{URL::asset('resources/dist/css/print.css')}}" rel="stylesheet">');               
               // docprint.document.write('<style type="text/css">body{ margin:0px;');
               // docprint.document.write('font-family:verdana,Arial;color:#000;');
               // docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:12px;}');
               // docprint.document.write('a{color:#000;text-decoration:none;} </style>');
               docprint.document.write('</head><body onLoad="self.print()"><center>');
               docprint.document.write(content_vlue);
               docprint.document.write('</center></body></html>');
               docprint.document.close();
               window.close();
               docprint.focus();
        }

        // function printDiv() { 
        //     var divContents = document.getElementById("section-to-print").innerHTML; 
        //     var a = window.open('', '', 'height=500, width=500'); 
        //     a.document.write('<link href="{{URL::asset('resources/dist/css/style.min.css')}}" rel="stylesheet">'); 
        //     a.document.write('<html>'); 
        //     a.document.write('<body>'); 
        //     a.document.write(divContents); 
        //     a.document.write('</body></html>'); 
        //     a.document.close(); 
        //     a.print(); 
        // }

    </script>
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

    
    </script>

  <script>
    function addMore1()
            {
                //alert("new row working");
                $(document).ready(function(){
                //alert("In");
                var item_name         = $('#item_name').val();
                var unit              = $('#unit').val();
                var required_quantity = $('#required_quantity').val();
                var x = item_name.split('_');
                //alert(x[1]);
                
                strCountField = '#prof_count';      
                intFields = $(strCountField).val();
                intFields = Number(intFields);    
                newField = intFields + 1;
                    
                strNewField = '<tr class="prof blueBox" id="prof_' + newField + '">\
                <input type="hidden" id="id' + newField + '" name="id' + newField + '" value="-1" />\
            <td><input type="text" id="item_name' + newField + '" name="item_name1[]" maxlength="10" value="'+x[0]+'" readonly="" class="form-control"/><input type="hidden" id="item_id' + newField + '" name="item_id1[]" value="'+x[1]+'"/></td>\
            <td><input type="text" id="unit' + newField + '" name="unit1[]" maxlength="10" value="'+unit+'" readonly="" class="form-control"/></td>\
            <td><input type="text" id="required_quantity' + newField + '" name="required_quantity1[]" maxlength="10" value="'+required_quantity+'" readonly="" class="form-control"/></td>\
            <td ><img src="{{ URL('resources/assets/images/close.png')}}" width="20" height="20" border="0" id="prof_' + newField + '"  value="prof_' + newField + '" onClick="del('+ newField +')" style="cursor: pointer;" tile="Delete"></td>\
            </tr>\
            <div class="nopass"><!-- clears floats --></div>\
            ';

                $("#prof_" + intFields).after(strNewField);    
                $("#prof_" + newField).slideDown("medium");
                $(strCountField).val(newField);				
                $('#item_name').val('');
                $('#unit').val('');
                $('#required_quantity').val('');
                //alert(strNewField);
        });
    }

function del(id)
{
    //alert(id);
    $('#item_name'+id).val('');
    $('#unit'+id).val('');
    $('#required_quantity'+id).val('');
    $("#prof_" + id).hide();
}

// Listen for click on toggle checkbox
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});

 </script>

 <script>
    function addMore2()
            {
                //alert("new row working");
                $(document).ready(function(){
                //alert("In");
                var item_name         = $('#item_name').val();
                var quantity          = $('#quantity').val();
                var rate = $('#rate').val();
                var amount = $('#amount').val();
                var branch = $('#branch').val();
                var x = item_name.split('_');
                //alert(x[1]);

                strCountField = '#prof_count';      
                intFields = $(strCountField).val();
                intFields = Number(intFields);    
                newField = intFields + 1;
                    
                strNewField = '<tr class="prof blueBox" id="prof_' + newField + '">\
                <input type="hidden" id="id' + newField + '" name="id' + newField + '" value="-1" />\
            <td><input type="text" id="item_name' + newField + '" name="item_name1[]" maxlength="10" value="'+x[0]+'" readonly="" class="form-control"/><input type="hidden" id="item_id' + newField + '" name="item_id1[]" value="'+x[1]+'" readonly="" /></td>\
            <td><input type="text" id="quantity' + newField + '" name="quantity1[]" maxlength="10" value="'+quantity+'" readonly="" class="form-control"/></td>\
            <td><input type="text" id="rate' + newField + '" name="rate1[]" maxlength="10" value="'+rate+'" readonly="" class="form-control"/></td>\
             <td><input type="text" id="amount' + newField + '" name="amount1[]" maxlength="10" value="'+amount+'" readonly="" class="form-control"/></td>\
            <td><input type="text" id="branch' + newField + '" name="branch1[]" maxlength="10" value="'+branch+'" readonly="" class="form-control"/></td>\
             <td><input type="button" value="Remove" onclick="Remove(this);"></td>\
            </tr>\
            <div class="nopass"><!-- clears floats --></div>\
            ';

                $("#prof_" + intFields).after(strNewField);    
                $("#prof_" + newField).slideDown("medium");
                $(strCountField).val(newField);             
                $('#item_name').val('');
                $('#quantity').val('');
                $('#rate').val('');
                 $('#amount').val('');
                  $('#branch').val('');
                //alert(strNewField);
        });
    }

        //  function Remove(button) {
        //     //Determine the reference of the Row using the Button.
        //     var row = $(button).closest("TR");
        //     var name = $("TD", row).eq(0).html();
        //     if (confirm("Do you want to delete: " + name)) {

        //         //Get the reference of the Table.
        //         var table = $("#tblRequisition")[0];

        //         //Delete the Table row using it's Index.
        //         table.deleteRow(row[0].rowIndex);
        //     }
        // };

    function makeAmount(){
        //alert('InputRate');
        var qty         = $("#quantity").val();
        var amount      = $("#rate").val();
        var totalAmount = (qty * amount);
        $("#amount").val(totalAmount);
    }
    
    //   function total(){
        
    //     var total=0;
    //     $('.amount').each(function(i,e){
    //         var amount=$(this).val()-0;
    //         total +=amount;
    //     });
    //    $('.total').html(total);
    // }



    </script>
    
</body>

</html>