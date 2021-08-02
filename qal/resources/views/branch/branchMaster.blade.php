@extends('masterDashboard')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-12 table-responsive">
          <h3 class="card-title text-center">Branch Registration</h3>
          <form action="{{ URL('/branch-submit') }}" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->
            <div class="form-group row">
              <label for="zoneCode" class="col-sm-2 col-form-label">Branch Name</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="name" name="name" placeholder="Branch Name" autocomplete="off" required="">
              </div>

              <label for="zoneName" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off" required="">
              </div>

            </div>
            <div class="form-group row">
              <label for="zoneName" class="col-sm-2 col-form-label">Sale Center Contact No</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Sale Center Contact No" autocomplete="off" required="">
              </div>

              <label for="zoneName" class="col-sm-2 col-form-label">Branch Type</label>
              <div class="col-sm-3" style="padding-left: 0;">
                <select name="branch_type" id="branch_type" class="select2 form-control custom-select" style="width: 100%;" required="">
                  <option value="">Select</option>
                  @foreach($branchType as $branchTypes)
                  <option value="{{ $branchTypes->id }}">{{ $branchTypes->name }}</option>
                  @endforeach
                </select>
              </div>
              <label for="zoneName" class="col-sm-1 col-form-label" data-toggle="modal" data-target="#myModal" style="cursor: pointer;">New</label>

            </div>
            <div class="form-group row text-right">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success mr-2">Save</button>
              </div>
            </div>
          </form>
          <p></p>


          <form action="{{ URL('/branch-type-submit') }}" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Add New Branch Type</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">

                    <div class="form-group row">
                        <label for="zoneName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10" style="padding-left: 0;">
                          <input type="text" class="form-control" id="type_name" name="type_name" placeholder="Branch Type Name" autocomplete="off" value="" required="">
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
                          <th>Branch Name</th>
                          <th>Address</th>
                          <th>Contact Number</th>
                          <th>Branch Type</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($result as $results)
                        <tr>
                          <td>{{ $results->name }}</td>
                          <td>{{ $results->address }}</td>
                          <td>{{ $results->contact_no }}</td>
                          <td>{{ $results->bType }}</td>
                          <td><a href="{{ URL('/branch-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
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