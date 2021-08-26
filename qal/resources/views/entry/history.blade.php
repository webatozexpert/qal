@extends('masterDashboardQIL')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Order History</h4>
    </div>
  </div>
</div>


<div class="container-fluid">
  <div class="card">
    <div class="card-body">

      <div class="row">
        <div class="col-12 table-responsive">
          <div class="card">
            <div class="card-body" style="padding: 0px;">
              <form action="" method="POST" target="_blank">
                {{ csrf_field() }}    <!-- token -->

                <div class="form-group row">
                  <div class="col-sm-3">&nbsp;</div>
                  <div class="col-sm-2" style="padding-left: 0;">
                      <input type="text" class="form-control" id="fromDate" name="fromDate" placeholder="From Date" autocomplete="off" required="" value="{{ date('d-m-Y')}}" readonly="">
                  </div>
                  <div class="col-sm-2" style="padding-left: 0;">
                      <input type="text" class="form-control" id="toDate" name="toDate" placeholder="To Date" autocomplete="off" required="" value="{{ date('d-m-Y')}}"  readonly="">
                  </div>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <button type="button" class="btn btn-success mr-2" style="padding: 3px 20px !important" onclick="orderSearch()">Search</button>
                  </div>
                </div>
              </form>
            </div>

            <div id="resultHere"></div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection