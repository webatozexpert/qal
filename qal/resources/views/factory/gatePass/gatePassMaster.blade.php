@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Gate Pass</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <a href="{{ URL('/factory/new-gate-pass') }}">
          <button type="submit" class="btn btn-success mr-2"> <i class="fas fa-plus-circle" aria-hidden="true"></i> New Gate Pass</button>
        </a>
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
                      <th>SL No</th>
                      <th>Agent Code</th>
                      <th>Agent Name</th>
                      <th>Address</th>
                      <th>Date</th>
                      <th class="text-center">Print</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($result as $results)
                    <tr>                      
                      <td>{{ $results->gp_no }}</td>
                      <td>{{ $results->code }}</td>
                      <td>{{ $results->cname }}</td>
                      <td>{{ $results->address }}</td>
                      <td>{{ $results->date }}</td>
                      <td class="text-center">
                      <a href="{{ URL('/factory/gate-pass-pdf/gate/'.$results->id) }}" title="Gate Copy Print">G-<i class="fa fa-print" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp;
                      <a href="{{ URL('/factory/gate-pass-pdf/customer/'.$results->id) }}" title="Customer Copy Print">C-<i class="fa fa-print" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp;
                      <a href="{{ URL('/factory/gate-pass-pdf/store/'.$results->id) }}" title="Store Copy Print">S-<i class="fa fa-print" aria-hidden="true"></i></a>
                       </td>
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