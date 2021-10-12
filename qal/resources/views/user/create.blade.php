  @extends('masterDashboard')
  @section('content')

  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-5 align-self-center">
        <h4 class="page-title">Create User</h4>
      </div>
      <div class="col-7 align-self-center">
        <div class="d-flex align-items-center justify-content-end">
          <a href="{{ URL('/all-user') }}">
            <button type="submit" class="btn btn-success mr-2"> <i class="fa fa-user-plus" aria-hidden="true"></i>All User </button>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">

        <div class="row">

          <div class="col-7 table-responsive">

            <h3 class="card-title text-center">User Registration</h3>

            <form action="{{ URL('/user/store') }}" method="POST" class="forms-sample">

              {{ csrf_field() }}    <!-- token -->

              <div class="form-group row">
                <label for="zoneCode" class="col-sm-3 col-form-label">User Name</label>
                <div class="col-sm-9" style="padding-left: 0;">
                  <input type="text" class="form-control" id="name" name="name" placeholder="User Name" autocomplete="off" >
                </div>
              </div>
              @error('name')
              <span class="text-semibold text-danger">{{$message}}</span>
              @enderror
              <div class="form-group row">
                <label for="zoneName" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9" style="padding-left: 0;">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" autocomplete="off" >
                </div>
              </div>
              @error('email')
              <span class="text-semibold text-danger">{{$message}}</span>
              @enderror
              <div class="form-group row">
                <label for="zoneName" class="col-sm-3 col-form-label">User Role</label>
                <div class="col-sm-9" style="padding-left: 0;">
                  <select name="user_role" id="user_role" class="select2 form-control custom-select" style="width: 100%;" >
                    <option value="">Select</option>
                    @foreach($userrole as $rows)
                    <option value="{{ $rows->id }}">{{ $rows->role_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              @error('user_role')
              <span class="text-semibold text-danger">{{$message}}</span>
              @enderror
              <div class="form-group row">
                <label for="zoneName" class="col-sm-3 col-form-label">User Group</label>
                <div class="col-sm-9" style="padding-left: 0;">
                  <select name="user_group" id="user_group" class="select2 form-control custom-select" style="width: 100%;" required="">
                    <option value="QAL">QAL</option>
                    <option value="QFL">QFL</option>
                    <option value="QIL">QIL</option>
                    <option value="QBL">QBL</option>
                    <option value="ABL">ABL</option>
                  </select>
                </div>
              </div>
              @error('user_group')
              <span class="text-semibold text-danger">{{$message}}</span>
              @enderror
              <div class="form-group row">
                <label for="zoneName" class="col-sm-3 col-form-label">User Status</label>
                <div class="col-sm-9" style="padding-left: 0;">
                  <select name="status" id="status" class="select2 form-control custom-select" style="width: 100%;" >
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                  </select>
                </div>
              </div>
              @error('status')
              <span class="text-semibold text-danger">{{$message}}</span>
              @enderror
              <div class="form-group row">
                <label for="zoneName" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9" style="padding-left: 0;">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter minimum 6 character password" autocomplete="off" >
                </div>
              </div>
              @error('password')
              <span class="text-semibold text-danger">{{$message}}</span>
              @enderror
              <div class="form-group row">
                <label for="zoneName" class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-9" style="padding-left: 0;">
                  <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Enter confirm password" autocomplete="off" >
                </div>
              </div>
              @error('confirm_password')
              <span class="text-semibold text-danger">{{$message}}</span>
              @enderror

              &nbsp;&nbsp;&nbsp;&nbsp;
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body" style="padding: 0px;">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Branch</th>
                              <th>Mark</th>
                              <th>Default</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php $sr=1; @endphp
                            @foreach($branch as $results)
                            <tr>
                             {{--  <td>{{ $results->last_id }}</td> --}}
                             <td>{{ $results->name }}</td>
                              <td>
                                <input type="checkbox" name="branch_id[{{ $sr }}]" id="branch_id{{ $sr }}" value="{{ $results->id }}"></a>

                              </td>
                              <td>
                                <input type="radio" name="branch_default[]" id="branch_default{{ $sr }}" value="Yes"></a>
                              </td>
                            </tr>
                             @php $sr++; @endphp
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row text-right">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-success mr-2">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection