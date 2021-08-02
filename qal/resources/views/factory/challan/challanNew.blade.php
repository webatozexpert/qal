@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">New Challan</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ URL('/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ URL('/order') }}">Challan</a>
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
              <form action="{{ URL('/factory/challan-submit') }}" method="POST" class="forms-sample">
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
                    <input type="text" class="form-control" id="do_id" name="do_id" autocomplete="off" value="" onkeyup="doID(this.value)" required="">
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

                <div class="form-group row"></div>
                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Tilapia (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="tilapiaQty" name="tilapiaQty" placeholder="Tilapia (Pcs)" autocomplete="off" value="" readonly="">
                  </div>

                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="pcs" name="pcs1" placeholder="Pcs/Box" autocomplete="off" value="">
                  </div>

                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="box" name="box1" placeholder="No. Box" autocomplete="off" value="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Compl. (5%)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="tilapiaQtyCompl" name="tilapiaQtyCompl" placeholder="Tilapia Compl (Pcs)" autocomplete="off" value="" readonly="">
                  </div>

                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="pcstilapiaQtyCompl" name="pcstilapiaQtyCompl1" placeholder="Pcs/Box" autocomplete="off" value="">
                  </div>

                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="boxtilapiaQtyCompl" name="boxtilapiaQtyCompl1" placeholder="No. Box" autocomplete="off" value="">
                  </div>
                </div>


                <div class="form-group row"></div>
                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label" style="background: #4CC552; color: #FFF">Pungas (Pcs)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="pungasQty" name="pungasQty" placeholder="Pungas (Pcs)" autocomplete="off" value="" readonly="">
                  </div>

                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="pcsPungas" name="pcsPungas1" placeholder="Pcs/Box" autocomplete="off" value="">
                  </div>

                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="boxPungas" name="boxPungas1" placeholder="No. Box" autocomplete="off" value="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Compl. (5%)</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="pungasQtyCompl" name="pungasQtyCompl" placeholder="Pungas Compl (Pcs)" autocomplete="off" value="" readonly="">
                  </div>

                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="pcspungasQtyCompl1" name="pcspungasQtyCompl1" placeholder="Pcs/Box" autocomplete="off" value="">
                  </div>

                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="number" class="form-control" id="boxpungasQtyCompl1" name="boxpungasQtyCompl1" placeholder="No. Box" autocomplete="off" value="">
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