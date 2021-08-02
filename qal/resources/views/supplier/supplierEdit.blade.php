@extends('masterDashboard')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-12 table-responsive">
          <h3 class="card-title text-center">Supplier/Vendor Detail Entry</h3>

            @if(Session::has('success'))     
            <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
            </div>
            @endif
          <form action="{{ URL('/supplier-update') }}" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->
            <input type="hidden" name="id" value="{{ $edit->id }}">
            <div class="form-group row">
              <label for="zoneCode" class="col-sm-2 col-form-label">Company Name</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="{{ $edit->company_name }}" autocomplete="off" required="">
              </div>

              <label for="zoneName" class="col-sm-2 col-form-label">Contact Person</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact Person" value="{{ $edit->contact_person }}"  autocomplete="off" required="">
              </div>

            </div>
            <div class="form-group row">
              <label for="zoneCode" class="col-sm-2 col-form-label">Contact No</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact Number" value="{{ $edit->contact_no }}"  autocomplete="off" required="">
              </div>

              <label for="zoneName" class="col-sm-2 col-form-label">Supplier Address</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="address" name="address" placeholder="Supplier Address" value="{{ $edit->address }}"  autocomplete="off" required="">
              </div>

            </div>
            <div class="form-group row">
             
              <label for="zoneName" class="col-sm-2 col-form-label">Supplier City</label>
              <div class="col-sm-3" style="padding-left: 0;">
                <select name="city_id" id="city_id" class="select2 form-control custom-select" style="width: 100%;" required="">
                  <option value="">Select</option>
                  @foreach($cityName as $rows)
                  <option value="{{ $rows->id }}">{{ $rows->city_name }}</option>
                  @endforeach
                </select>
              </div>
              <label for="zoneName" class="col-sm-1 col-form-label" data-toggle="modal" data-target="#myModal" style="cursor: pointer; ">Add</label>

            </div>
            <div class="form-group row text-right">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success mr-2">Save</button>
              </div>
            </div>
          </form>
          <p></p>


          <form action="{{ URL('/new-city-submit') }}" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Add New City</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">

                    <div class="form-group row">
                        <label for="zoneName" class="col-sm-2 col-form-label">New City</label>
                        <div class="col-sm-10" style="padding-left: 0;">
                          <input type="text" class="form-control" id="city_name" name="city_name" placeholder="New City Name" autocomplete="off" value="" required="">
                        </div>
                      </div>

                  </div>
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
              </div>
            </div>

          </form>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body" style="padding: 0px;">
                  <div class="table-responsive">
                    <table id="zero_config" class="table table-hover table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Supplier Name</th>
                            <th>Contact Person</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                            <th>Supplier City</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                      <tbody>
                      @foreach($result as $rows)
                        <tr>
                          <td>{{ $rows->company_name }}</td>
                          <td>{{ $rows->contact_person }}</td>
                          <td>{{ $rows->address }}</td>
                          <td>{{ $rows->contact_no }}</td>
                          <td>{{ $rows->city_id }}</td>
                          
                          <td><a href="{{ URL('/supplier-edit/'.$rows->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="{{ URL('/supplier-delete/'.$rows->id) }}" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
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