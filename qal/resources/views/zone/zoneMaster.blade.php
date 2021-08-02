@extends('masterDashboard')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-7 table-responsive">
          <h3 class="card-title text-center">Zone Registration</h3>
          <form action="{{ URL('/zone-submit') }}" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->
            <div class="form-group row">
              <label for="zoneCode" class="col-sm-3 col-form-label">Zone Code</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <input type="text" class="form-control" id="zoneCode" name="zoneCode" placeholder="Zone Code" autocomplete="off" required="">
              </div>
            </div>
            <div class="form-group row">
              <label for="zoneName" class="col-sm-3 col-form-label">Zone Name</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <input type="text" class="form-control" id="zoneName" name="zoneName" placeholder="Zone Name" autocomplete="off" required="">
              </div>
            </div>
            <div class="form-group row text-right">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success mr-2">Submit</button>
              </div>
            </div>
          </form>
          <p></p>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body" style="padding: 0px;">
                  <div class="table-responsive">
                    <table id="zero_config" class="table table-hover table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Zone Code</th>
                          <th>Zone Name</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($result as $results)
                        <tr>
                          <td>{{ $results->code }}</td>
                          <td>{{ $results->name }}</td>
                          <td><a href="{{ URL('/zone-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
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
  </div>
</div>

@endsection