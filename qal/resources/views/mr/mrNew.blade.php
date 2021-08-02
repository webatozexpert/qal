@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">New Money Receipt</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ URL('/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ URL('/money-receipt') }}">Money Receipt</a>
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
              <form action="{{ URL('/money-receipt-submit') }}" method="POST" class="forms-sample">
                {{ csrf_field() }}    <!-- token -->

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Money Receipt No</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="mrNo" name="mrNo" autocomplete="off" value="{{ $mrNo }}" readonly="">
                  </div>

                  <label for="zoneCode" class="col-sm-3 col-form-label">Money Receipt Date</label>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <input type="text" class="form-control" id="fromDate" name="mrDate" autocomplete="off" value="{{ date('d-m-Y') }}">
                  </div>
                </div>


                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Bank</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <select name="bankid" id="bankid" class="select2 form-control custom-select" style="width: 100%;" required="">
                      <option value="">Select Bank</option>
                      @foreach($banks as $bank)
                      <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Agent</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <select name="customerid" id="customerid" class="select2 form-control custom-select" style="width: 100%;" required="">
                      <option value="">Select Agent</option>
                      @foreach($allCustomer as $allCustomers)
                      <option value="{{ $allCustomers->id }}">{{ $allCustomers->name }} ({{ $allCustomers->code }})</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Amount</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" autocomplete="off" value="" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Note</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <textarea name="note" class="form-control" placeholder="Note">Fry Sales</textarea>
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