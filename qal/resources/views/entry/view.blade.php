@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">History Page</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
       {{--  <a href="{{ URL('/new-agent') }}">
          <button type="submit" class="btn btn-success mr-2"> <i class="fa fa-user-plus" aria-hidden="true"></i> New Agent</button>
        </a> --}}
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
                      <th>SL</th>
                      <th>Date</th>
                      <th>Lead</th>
                      <th>Total Lead</th>
                      <th>Total Conversion</th>
                      <th>Total Query</th>
                      <th>New Lead</th>
                      <th>Existing Lead</th>
                      <th>Ratio</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $results)
                    <tr>
                      <td>{{ $results->id }}</td>
                      <td>{{ $results->date }}</td>
                      <td>{{ $results->lead }}</td>
                      <td>{{ $results->total_new + $results->total_old }}</td>
                      <td>{{ $results->total_new }}</td>
                      <td>{{ $results->total_queries }}</td>
                      <td>{{ $results->total_new }}</td>
                      <td>{{ $results->total_old }}</td>
                      <td>{{ $results->total_old }}</td>                    
                      
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