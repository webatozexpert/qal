@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">New Agent</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ URL('/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ URL('/agent-setup') }}">Agent</a>
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
              <form action="{{ URL('/agent-submit') }}" method="POST" class="forms-sample">
                {{ csrf_field() }}    <!-- token -->

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Zone</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <select name="zoneid" id="zoneid" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="zoneWiseRegion(this.value)">
                      <option value="">Select Zone</option>
                      @foreach($allZones as $allZone)
                      <option value="{{ $allZone->id }}">{{ $allZone->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Region</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <select name="regionid" id="regionid" class="select2 form-control custom-select" style="width: 100%;" required="">
                      <option value="">Select Region</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Agent Code</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" id="customerCode" name="customerCode" placeholder="Agent Code" autocomplete="off" value="QALA{{ $agentCode }}" readonly="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Agent Name</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Agent Name" autocomplete="off" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Proprietor Name</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" id="proprietorName" name="proprietorName" placeholder="Proprietor Name" autocomplete="off" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Agent Mobile No</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" id="customerMobile" name="customerMobile" placeholder="Agent Mobile No" autocomplete="off" required="" maxlength="11">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Agent Address</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" name="customerAddress" placeholder="Agent Address" autocomplete="off" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Delivery Point</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" name="deliveryPoint" placeholder="Delivery Point" autocomplete="off" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Carriage (1) Pcs</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" name="CarriageCharge" placeholder="Carriage" autocomplete="off" required="">
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