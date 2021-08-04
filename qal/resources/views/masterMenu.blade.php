<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ URL('/dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard </span>
                    </a>
                </li>

              @if(Auth::user()->type=='User' || Auth::user()->type=='Admin')
                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ URL('/order') }}" aria-expanded="false">
                        <i class="mdi mdi-image-filter-tilt-shift"></i>
                        <span class="hide-menu">Delivery Order </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ URL('/money-receipt') }}" aria-expanded="false">
                        <i class="mdi mdi-image-filter-tilt-shift"></i>
                        <span class="hide-menu">Money Receipt </span>
                    </a>
                </li>
                

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-dns"></i>
                        <span class="hide-menu">Purchase</span>
                    </a>
                    <ul aria-expanded="false" class="collapse has-arrow first-level">
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="mdi mdi-image-filter-tilt-shift"></i>
                                <span class="hide-menu"> Requisition </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ URL('/requisition') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">All Requisition </span>
                                    </a>
                                </li>
                               {{--  <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-requisition-awaiting-approval') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Requisition Pending List</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-requisition-approved') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Requisition Approved List</span>
                                    </a>
                                </li> 
                                 <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-requisition-confirm') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Requisition Confirm List</span>
                                    </a>
                                </li>  --}}
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="mdi mdi-image-filter-tilt-shift"></i>
                                <span class="hide-menu"> Purchase Order </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase_order/create') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Purchase Order </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-order-awaiting-approval') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Order Awaiting Approval</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-order-approved') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Order Approved List</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Master Setup </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ URL('/zone-setup') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Zone </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ URL('/region-setup') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Region </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ URL('/agent-setup') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Agent </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ URL('/branch-setup') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Branch </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ URL('/product-setup') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Product </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ URL('/project-setup') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Project Information </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ URL('/projectBudget-setup') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Project Budget </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ URL('/supplier-setup') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Supplier Name </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-dns"></i>
                        <span class="hide-menu"> Report </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ URL('/report/do') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Daily Statement </span>
                            </a>
                        </li>
                    </ul>
                </li>  
                
              @endif
              @if(Auth::user()->type=='Factory' || Auth::user()->type=='Admin')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ URL('/factory/gate-pass') }}" aria-expanded="false">
                        <i class="mdi mdi-image-filter-tilt-shift"></i>
                        <span class="hide-menu">Gate Pass</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ URL('/factory/challan') }}" aria-expanded="false">
                        <i class="mdi mdi-image-filter-tilt-shift"></i>
                        <span class="hide-menu">Challan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ URL('/factory/invoice') }}" aria-expanded="false">
                        <i class="mdi mdi-image-filter-tilt-shift"></i>
                        <span class="hide-menu">Invoice</span>
                    </a>
                </li>
              @endif

              @if(Auth::user()->type=='DHead')
                
                               

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-dns"></i>
                        <span class="hide-menu">Purchase</span>
                    </a>
                    <ul aria-expanded="false" class="collapse has-arrow first-level">
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="mdi mdi-image-filter-tilt-shift"></i>
                                <span class="hide-menu"> Requisition </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-requisition-awaiting-approval') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Requisition Awaiting Approval</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-requisition-approved') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Requisition Approved List</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="mdi mdi-image-filter-tilt-shift"></i>
                                <span class="hide-menu"> Purchase Order </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase_order/create') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Purchase Order </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-order-awaiting-approval') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Order Awaiting Approval</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-order-approved') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Order Approved List</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif
                
                 @if(Auth::user()->type=='OHead')
                
                               

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-dns"></i>
                        <span class="hide-menu">Purchase</span>
                    </a>
                    <ul aria-expanded="false" class="collapse has-arrow first-level">
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="mdi mdi-image-filter-tilt-shift"></i>
                                <span class="hide-menu"> Requisition </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-requisition-awaiting-confirm') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Requisition Awaiting Confirm</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-requisition-confirm') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Requisition Confirm List</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="mdi mdi-image-filter-tilt-shift"></i>
                                <span class="hide-menu"> Purchase Order </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase_order/create') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Purchase Order </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-order-awaiting-approval') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Order Awaiting Approval</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-order-approved') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Order Approved List</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif

                @if(Auth::user()->type=='Management')
                
                               

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-dns"></i>
                        <span class="hide-menu">Purchase</span>
                    </a>
                    <ul aria-expanded="false" class="collapse has-arrow first-level">
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="mdi mdi-image-filter-tilt-shift"></i>
                                <span class="hide-menu"> Requisition </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-requisition-awaiting-orderconfirm') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Requisition Awaiting orderConfirm</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-requisition-orderconfirm') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Requisition Order Confirm List</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="mdi mdi-image-filter-tilt-shift"></i>
                                <span class="hide-menu"> Purchase Order </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase_order/create') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Purchase Order </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-order-awaiting-approval') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Order Awaiting Approval</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ URL('/purchase-order-approved') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Order Approved List</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ URL('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>