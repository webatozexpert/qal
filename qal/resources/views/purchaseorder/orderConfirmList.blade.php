@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
       <h4 class="page-title"> Purchase Order Approved List</h4>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid">

  @if(Session::has('success'))     
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{ Session::get('success') }}
  </div>

  @endif

  <div class="card">
    <div class="card-body">

      <div class="row">
        <div class="col-12 table-responsive">
          <div class="card">
            <div class="card-body" style="padding: 0px;">
              <div class="table-responsive">
                <table id="zero_config" class="table table-hover table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width:05%;" >Detals</th>
                      <th style="width:15%;" >P.O No</th>
                      <th style="width:10%;" >P.O Date</th>
                      <th style="width:20%;" >Supplier Name</th>
                      <th style="width:15%;" >Lc Number</th>
                      <th style="width:10%;" >Prepared By</th>
                      <th style="width:05%;" >Print</th>
                       <th style="width:10%;" >Status</th>
                    </tr>
                  </thead>
                  <tbody>
               </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection