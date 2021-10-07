@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">All User List</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <a href="{{ URL('/user/create') }}">
          <button type="submit" class="btn btn-success mr-2"> <i class="fa fa-user-plus" aria-hidden="true"></i>User Create</button>
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
		                      <th style="width:15%;" >SL No</th>
		                      <th style="width:10%;" >Name</th>
		                      <th style="width:20%;" >Email</th>
		                      <th style="width:15%;" >Type</th>
		                      <th style="width:10%;" >User Role</th>
		                      <th style="width:10%;" >Status</th>
		                      <th style="width:10%;" >Action</th>
	                    </tr>
	                  </thead>
                   <tbody>
	                  @foreach($allusers as $alluser)
	                    <tr>
	                      <td>{{ $alluser->id}}</td>
	                      <td>{{ $alluser->name}}</td>
	                      <td>{{ $alluser->email}}</td>
	                      <td>{{ $alluser->type}}</td>
	                      
	                     <td>{{ $alluser->user_role}}</td>
	                  
	                     <td>
	                                                
	                        @if($alluser->status=='1')
	                       <span >Active</span>
	                       @elseif($alluser->status=='2')
	                       <span >Inactive</span>
	                      
	                       @endif
	                    </td>

	                     <td>

	                     &nbsp;
	                   
	                      <a href="{{ URL('/po-edit/'.$alluser->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;
	                     
	                      <a href="{{ URL('/purchase-delete/'.$alluser->id) }}" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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