@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Money Receipt</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <a href="{{ URL('/new-money-receipt') }}">
          <button type="submit" class="btn btn-success mr-2"> <i class="fa fa-user-plus" aria-hidden="true"></i> New Money Receipt</button>
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
                      <th>Zone</th>
                      <th>Agent Name</th>
                      <th>Amount</th>
                      <th>Bank</th>
                      <th>Received Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($result as $results)
                    <tr>
                      <td>{{ $results->zname }}</td>
                      <td>{{ $results->cname }} ({{$results->ccode}})</td>
                      <td>{{ $results->amount }}</td>
                      <td>{{ $results->bname }}</td>
                      <td>{{ $results->added_date }}</td>
                      <td><a href="{{ URL('/money-receipt-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp;&nbsp;
                      <a href="{{ URL('/money-receipt-pdf/'.$results->id) }}" title="Print"><i class="fa fa-print" aria-hidden="true"></i></a>
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