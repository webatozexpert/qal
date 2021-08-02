@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Edit Delivery Order</h4>
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
              <form action="{{ URL('/order-update') }}" method="POST" class="forms-sample">
                {{ csrf_field() }}    <!-- token -->

                <input type="hidden" name="id" id="id" value="{{ $edit->id }}">
                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Date</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" id="toDate" name="date" autocomplete="off" value="{{ date('d-m-Y' , strtotime($edit->do_date)) }}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Zone</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <select name="zoneid" id="zoneid" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="zoneWiseRegion(this.value)">
                      <option value="">Select Zone</option>
                      @foreach($allZones as $allZone)
                      <option value="{{ $allZone->id }}" @if($edit->zoneid==$allZone->id) selected="" @endif>{{ $allZone->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Region</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <select name="regionid" id="regionid" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="zoneWiseCust(this.value)">
                      <option value="">Select Region</option>
                      @foreach($allRegions as $allRegion)
                      <option value="{{ $allRegion->id }}" @if($edit->regionid==$allRegion->id) selected="" @endif>{{ $allRegion->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Agent</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <select name="customerid" id="customerid" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="agentInfo(this.value)">
                      <option value="">Select Agent</option>
                      @foreach($allCustomer as $allCustomers)
                      <option value="{{ $allCustomers->id }}" @if($edit->custid==$allCustomers->id) selected="" @endif>{{ $allCustomers->name }} ({{ $allCustomers->code }})</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Delivery Charge</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <select name="delivery_charge" id="delivery_charge" class="select2 form-control custom-select" style="width: 100%;" required="">
                      <option value="No" @if($edit->delivery_charge=='No') selected="" @endif>No</option>
                      <option value="Yes" @if($edit->delivery_charge=='Yes') selected="" @endif>Yes</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="address" name="address" value="{{ $singleCustomer->address }}" readonly="">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label">Delivery Point</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="deliveryPoint" name="deliveryPoint" readonly="" value="{{ $singleCustomer->delivery_point }}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Tilapia (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="tilapiaQty" name="tilapiaQty" placeholder="Tilapia (Pcs)" autocomplete="off" value="{{ $edit->hybrid_monosex_tilapia_qty }}" onkeyup="fivePer(this.value)">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneName" class="col-sm-2 col-form-label">Tilapia Compl. (5%)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="complementaryQtyTilapia" name="complementaryQtyTilapia" placeholder="0" autocomplete="off" value="{{ $edit->tilapia_complementary_qty }}" readonly="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Incentive (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="incentiveTilaQty" name="incentiveTilaQty" value="{{ $edit->incentive_tilapia_qty }}" placeholder="Incentive (Pcs)">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Incentive Note</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="incentiveTilaNote" name="incentiveTilaNote" value="{{ $edit->incentive_tilapia_note }}" placeholder="Incentive Note">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Special (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="specialTilaQty" name="specialTilaQty" placeholder="Special (Pcs)" value="{{ $edit->tilapia_special_qty }}">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Mortality (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="mortalityTilaQty" name="mortalityTilaQty" placeholder="Mortality (Pcs)" value="{{ $edit->tilapia_mortality_qty }}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Pungas (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="pungasQty" name="pungasQty" placeholder="Pungas (Pcs)" value="{{ $edit->hybrid_monosex_pungas_qty }}" autocomplete="off" onkeyup="fivePer2(this.value)">
                  </div>

                  <label for="zoneName" class="col-sm-1"></label>
                  <label for="zoneName" class="col-sm-2 col-form-label">Pungas Compl. (5%)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="complementaryQtyPungas" name="complementaryQtyPungas" placeholder="0" value="{{ $edit->pungas_complementary_qty }}" autocomplete="off" readonly="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Incentive (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="incentivePungasQty" name="incentivePungasQty" value="{{ $edit->incentive_pungas_qty }}" placeholder="Incentive (Pcs)">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Incentive Note</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="incentivePungasNote" name="incentivePungasNote" value="{{ $edit->incentive_pungas_note }}" placeholder="Incentive Note">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Special (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="specialPungasQty" name="specialPungasQty" value="{{ $edit->pungas_special_qty }}" placeholder="Special (Pcs)">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Mortality (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="mortalityPungasQty" name="mortalityPungasQty" value="{{ $edit->pungas_mortality_qty }}" placeholder="Mortality (Pcs)">
                  </div>
                </div>               


                <div class="form-group row text-right">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-success mr-2">Update</button>
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