@extends('masterDashboard')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-7 table-responsive">
          <h3 class="card-title text-center">Region Registration</h3>
          <form action="{{ URL('/region-submit') }}" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->
            <div class="form-group row">
              <label for="zoneCode" class="col-sm-3 col-form-label">Zone</label>
              <div class="col-sm-9" style="padding-left: 0;">
                
                  <select name="zoneId" id="zoneId" class="select2 form-control custom-select" style="width: 100%;" required="">
                      <option value="">Select Zone</option>
                      @foreach($allZones as $allZone)
                      <option value="{{ $allZone->id }}">{{ $allZone->name }} ({{ $allZone->code }})</option>
                      @endforeach
                  </select>

              </div>
            </div>
            <div class="form-group row">
              <label for="zoneName" class="col-sm-3 col-form-label">Region Name</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <input type="text" class="form-control" id="regionName" name="regionName" placeholder="Region Name" autocomplete="off" required="">
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
                          <th>Zone</th>
                          <th>Region Name</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($result as $results)
                        <tr>
                          <td>{{ $results->zname }}</td>
                          <td>{{ $results->name }}</td>
                          <td><a href="{{ URL('/region-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
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