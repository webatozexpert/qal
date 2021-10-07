@extends('masterDashboard')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-7 table-responsive">
          <h3 class="card-title text-center">User Role Create</h3>
          <form action="{{ URL('/user-role-create') }}" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->
            
            <div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">Role Name</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Role Name" autocomplete="off" required="">
              </div>
            </div>
            
           
            <div class="form-group row text-right">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success mr-2">Submit</button>
              </div>
            </div>
          </form>
          <p></p>

          @if(Session::has('success'))     
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
          </div>
          @endif

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body" style="padding: 0px;">
                  <div class="table-responsive">
                    <table id="zero_config" class="table table-hover table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Role Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($result as $results)
                        <tr>
                          <td>{{ $results->id }}</td>
                          <td>{{ $results->role_name }}</td>
                          
                          <td>
                          <a href="{{ URL('/userrole-delete/'.$results->id) }}"  class="btn btn-danger" title="delete">Delete</a> </td>
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