@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">New Invoice</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ URL('/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ URL('/invoice') }}">Invoice</a>
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
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <div class="card">
            <div class="card-body" style="padding: 0px;">
              <form action="{{ URL('/factory/invoice-submit') }}" method="POST" class="forms-sample">
                {{ csrf_field() }}    <!-- token -->

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Date</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" id="date" name="date" autocomplete="off" value="{{ date('d-m-Y') }}" readonly="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Challan No</label>
                  <div class="col-sm-1" style="padding-left: 0;">
                    <input type="text" class="form-control" value="SDC" readonly="">
                  </div>
                  <div class="col-sm-8" style="padding-left: 0;">
                    <input type="text" class="form-control" id="challan_id" name="challan_id" autocomplete="off" onkeyup="challanID(this.value)" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Zone</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="zoneid" name="zoneid" autocomplete="off" value="" readonly="">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label">Region</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="regionid" name="regionid" autocomplete="off" value="" readonly="">
                  </div>

                </div>

                
                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Agent</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="text" class="form-control" id="customerid" name="customerid" readonly="">

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

                {{-- <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Tilapia (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="tilapiaQty" name="tilapiaQty" placeholder="Tilapia (Pcs)" autocomplete="off" value="" readonly="">
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
                    <input type="number" class="form-control" id="incentiveTilaQty" name="incentiveTilaQty" placeholder="Incentive (Pcs)" readonly="">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Incentive Note</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="incentiveTilaNote" name="incentiveTilaNote" placeholder="Incentive Note" readonly="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Special (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="specialTilaQty" name="specialTilaQty" placeholder="Special (Pcs)" readonly="">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Mortality (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="mortalityTilaQty" name="mortalityTilaQty" placeholder="Mortality (Pcs)" readonly="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Pungas (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="pungasQty" name="pungasQty" placeholder="Pungas (Pcs)" autocomplete="off" readonly="">
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
                    <input type="number" class="form-control" id="incentivePungasQty" name="incentivePungasQty" placeholder="Incentive (Pcs)" readonly="">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Incentive Note</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="incentivePungasNote" name="incentivePungasNote" placeholder="Incentive Note" readonly="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Special (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="specialPungasQty" name="specialPungasQty" placeholder="Special (Pcs)" readonly="">
                  </div>

                  <label for="zoneCode" class="col-sm-1"></label>
                  <label for="zoneCode" class="col-sm-2 col-form-label" style="background: #4CC552; color: #FFF">Mortality (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="mortalityPungasQty" name="mortalityPungasQty" placeholder="Mortality (Pcs)" readonly="">
                  </div>
                </div> --}}               


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