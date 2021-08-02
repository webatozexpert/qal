  @extends('masterDashboard')
  @section('content')

  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-5 align-self-center">
        <h4 class="page-title">Dashboard</h4>
      </div>
      <div class="col-7 align-self-center">
        <div class="d-flex align-items-center justify-content-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">              
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    

      @if(Auth::user()->type=='User' || Auth::user()->type=='Admin')
      <div class="card-group">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="d-flex no-block align-items-center">
                  <div>
                    <i class="fas fa-th-large font-20  text-muted"></i>
                    <p class="font-16 m-b-5">Zone</p>
                  </div>
                  <div class="ml-auto">
                    <h1 class="font-light text-right"><a href="{{ URL('zone-setup') }}">{{ $totalZones }}</a></h1>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="progress">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="d-flex no-block align-items-center">
                  <div>
                    <i class="fas fa-user font-20  text-muted"></i>

                    <p class="font-16 m-b-5">Agent</p>
                  </div>
                  <div class="ml-auto">
                    <h1 class="font-light text-right"><a href="{{ URL('agent-setup') }}">{{ $totalCustomers }}</a></h1>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="d-flex no-block align-items-center">
                  <div>
                    <i class="mdi mdi-poll font-20 text-muted"></i>
                    <p class="font-16 m-b-5">Delivery Order</p>
                  </div>
                  <div class="ml-auto">
                    <h1 class="font-light text-right"><a href="{{ URL('order') }}">{{ $allOrder }}</a></h1>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="progress">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 70%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

      @if(Auth::user()->type=='Factory' || Auth::user()->type=='Admin')
      <div class="card-group">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex no-block align-items-center">
                    <div>
                      <i class="fas fa-th-large font-20  text-muted"></i>
                      <p class="font-16 m-b-5">Gate Pass</p>
                    </div>
                    <div class="ml-auto">
                      <h1 class="font-light text-right"><a href="{{ URL('factory/gate-pass') }}">{{ $allGetPass }}</a></h1>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex no-block align-items-center">
                    <div>
                      <i class="mdi mdi-poll font-20 text-muted"></i>
                      <p class="font-16 m-b-5">Challan</p>
                    </div>
                    <div class="ml-auto">
                      <h1 class="font-light text-right"><a href="{{ URL('factory/challan') }}">{{ $allChallan }}</a></h1>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex no-block align-items-center">
                    <div>
                      <i class="mdi mdi-poll font-20 text-muted"></i>
                      <p class="font-16 m-b-5">Invoice</p>
                    </div>
                    <div class="ml-auto">
                      <h1 class="font-light text-right"><a href="{{ URL('factory/invoice') }}"> {{ $allInvoice }} </a></h1>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 70%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      @endif

    
  </div>
  @endsection