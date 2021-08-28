@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
       <h4 class="page-title">Order Approved List</h4>
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
                  
                     <th style="width:15%;" >P.O No</th>
                      <th style="width:10%;" >P.O Date</th>
                      <th style="width:20%;" >Supplier Name</th>
                      {{-- <th style="width:15%;" >Lc Number</th> --}}
                      <th style="width:10%;" >Prepared By</th>
                     
                      
				        </tr>
                  </thead>
                  <tbody>
                  @foreach($result as $results)
                    <tr>
                      
                      <td><a href="{{ URL('/purchaseOrder-print/'.$results->id) }}" target="_blank" title="print">{{ $results->order_no }}</a>
                      </td>
                      <td>{{ $results->postingDate}}</td>
                      <td>{{ $results->supplier_name}}</td>
                      <td>{{ $results->created_by }}</td>
                     
                     
                    </tr>
                    @endforeach
                  </tbody>
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