@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">New Delivery Order</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ URL('/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ URL('/order') }}">Delivery Order</a>
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
              <form action="{{ URL('/order-submit') }}" method="POST" class="forms-sample">
                {{ csrf_field() }}    <!-- token -->

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Date</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" id="toDate" name="date" autocomplete="off" value="{{ date('d-m-Y') }}">
                  </div>
                </div>

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
                    <select name="regionid" id="regionid" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="zoneWiseCust(this.value)">
                      <option value="">Select Region</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Agent</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <select name="customerid" id="customerid" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="agentInfo(this.value)">
                      <option value="">Select Agent</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Delivery Charge</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <select name="delivery_charge" id="delivery_charge" class="select2 form-control custom-select" style="width: 100%;" required="">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>
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
                  <label for="zoneCode" class="col-sm-3 col-form-label">Tilapia (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="tilapiaQty" name="tilapiaQty" placeholder="Tilapia (Pcs)" autocomplete="off" value="" onkeyup="fivePer(this.value)">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneName" class="col-sm-2 col-form-label">Tilapia Compl. (5%)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="complementaryQtyTilapia" name="complementaryQtyTilapia" placeholder="0" autocomplete="off" readonly="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Incentive (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="incentiveTilaQty" name="incentiveTilaQty" placeholder="Incentive (Pcs)">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Incentive Note</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="incentiveTilaNote" name="incentiveTilaNote" placeholder="Incentive Note">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Special (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="specialTilaQty" name="specialTilaQty" placeholder="Special (Pcs)">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Mortality (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="mortalityTilaQty" name="mortalityTilaQty" placeholder="Mortality (Pcs)">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Pungas (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="pungasQty" name="pungasQty" placeholder="Pungas (Pcs)" autocomplete="off" onkeyup="fivePer2(this.value)">
                  </div>

                  <label for="zoneName" class="col-sm-1"></label>
                  <label for="zoneName" class="col-sm-2 col-form-label">Pungas Compl. (5%)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="complementaryQtyPungas" name="complementaryQtyPungas" placeholder="0" autocomplete="off" readonly="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Incentive (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="incentivePungasQty" name="incentivePungasQty" placeholder="Incentive (Pcs)">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Incentive Note</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="incentivePungasNote" name="incentivePungasNote" placeholder="Incentive Note">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Special (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="specialPungasQty" name="specialPungasQty" placeholder="Special (Pcs)">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Mortality (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="mortalityPungasQty" name="mortalityPungasQty" placeholder="Mortality (Pcs)">
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