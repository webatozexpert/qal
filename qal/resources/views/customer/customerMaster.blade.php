@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Agent</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <a href="{{ URL('/new-agent') }}">
          <button type="submit" class="btn btn-success mr-2"> <i class="fa fa-user-plus" aria-hidden="true"></i> New Agent</button>
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
                      <th>Region</th>
                      <th>Agent Code</th>
                      <th>Agent Name</th>
                      <th>Proprietor</th>
                      <th>Agent Address</th>
                      <th>Agent Mobile</th>
                      <th>Delivery Point</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($result as $results)
                    <tr>
                      <td>{{ $results->zname }}</td>
                      <td>{{ $results->rname }}</td>
                      <td>{{ $results->code }}</td>
                      <td>{{ $results->name }}</td>
                      <td>{{ $results->proprietor }}</td>
                      <td>{{ $results->address }}</td>
                      <td>{{ $results->mobile }}</td>
                      <td>{{ $results->delivery_point }}</td>
                      <td><a href="{{ URL('/agent-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
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