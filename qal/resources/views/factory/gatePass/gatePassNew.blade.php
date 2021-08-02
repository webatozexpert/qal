@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">New Gate Pass</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ URL('/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ URL('/factory/gate-pass') }}">Gate Pass</a>
            </li>
          </ol>
        </nav>
      </div>
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
              <form action="{{ URL('/factory/gate-pass-submit') }}" method="POST" class="forms-sample">
                {{ csrf_field() }}    <!-- token -->

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Date</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" id="date" name="date" autocomplete="off" value="{{ date('d-m-Y') }}" readonly="">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Delivery Order No</label>
                  <div class="col-sm-1" style="padding-left: 0;">
                    <input type="text" class="form-control" value="SDO" readonly="">
                  </div>
                  <div class="col-sm-8" style="padding-left: 0;">
                    <input type="text" class="form-control" id="doNo" name="doid" placeholder="Enter D.O Code" onkeyup="doID(this.value)" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="customerid" name="customerid" readonly="">
                  </div>
                  <input type="hidden" name="agentid" id="agentid" value="">

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label">Mobile</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="mobile" name="mobile" readonly="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="address" name="address" readonly="">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label">Delivery Point</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="deliveryPoint" name="deliveryPoint" readonly="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Following Items</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" id="followingQty" name="followingQty" placeholder="Following Items" autocomplete="off" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Particulars Items</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <textarea name="ParticularsItems" id="ParticularsItems" placeholder="Particulars Items" class="form-control" rows="10" required=""></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Quantity</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="0" value="0" required="">
                  </div>
                </div>

                <div class="form-group row text-right">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection