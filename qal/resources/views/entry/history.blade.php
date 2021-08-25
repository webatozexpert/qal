@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">History</h4>
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
              <form action="{{ URL('/qil/daily-statement') }}" method="POST" target="_blank">
                {{ csrf_field() }}    <!-- token -->
                <div class="form-group row">
                  <div class="col-sm-2" style="padding-left: 0;">
                      <input type="text" class="form-control" id="fromDate" name="fromDate" placeholder="From Date" autocomplete="off" required="">
                  </div>
                  <div class="col-sm-2" style="padding-left: 0;">
                      <input type="text" class="form-control" id="toDate" name="toDate" placeholder="To Date" autocomplete="off" required="">
                  </div>
                  {{-- <div class="col-sm-3" style="padding-left: 0;">
                      <select name="agentid" id="agentid" class="select2 form-control custom-select" style="width: 100%;" onchange="agentInfo(this.value)">
                          <option value="">Select Agent</option>
                          @foreach($allCustomer as $allZone)
                          <option value="{{ $allZone->id }}">{{ $allZone->name }} ({{ $allZone->code }})</option>
                          @endforeach
                      </select>
                  </div> --}}
                  <div class="col-sm-2" style="padding-left: 0;">
                      <select name="reportType" id="reportType" class="select2 form-control custom-select" style="width: 100%;">
                          <option value="Daily" selected="">Daily</option>
                          {{-- <option value="Yearly">Monthly/Yearly</option> --}}
                      </select>
                  </div>
                  <div class="col-sm-3" style="padding-left: 0;">
                    <button type="submit" class="btn btn-success mr-2" style="padding: 3px 20px !important">Search</button>
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