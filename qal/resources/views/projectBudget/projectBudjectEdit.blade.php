@extends('masterDashboard')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-12 table-responsive">
          <h3 class="card-title text-center">Edit New Memo</h3>
          <form action="{{ URL('/projectBudget-update') }}" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->

            <input type="hidden" name="id" value="{{$edit->id}}">

            <div class="form-group row">
            <label for="underProject" class="col-sm-2 col-form-label">Under Project</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <select name="projectid" id="projectid" class="select2 form-control custom-select" style="width: 100%;" required="">
                  <option value="">Select</option>
                  @foreach($projects as $project)
                  <option value="{{ $project->id }}" @if($project->id==$edit->projectid) selected @endif>{{ $project->name }}</option>
                  @endforeach
                </select>
              </div>
              
              
              <label for="memo_no" class="col-sm-2 col-form-label">Memo No</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="memo_no" name="memo_no" placeholder="Memo No" autocomplete="off"  value="{{ $edit->memo_no }}" required="">
              </div>
              </div>
              
              <div class="form-group row">
              <label for="toDate" class="col-sm-2 col-form-label">Effective Date</label>
              <div class="col-sm-4" style="padding-left: 0;">
              <input type="text" class="form-control" id="toDate" name="date" autocomplete="off" value="{{ date('d-m-Y') }}">
              </div>

              <label for="budgetamount" class="col-sm-2 col-form-label">Project Budget Amount</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="budgetamount" name="project_amount" placeholder="Budget Amount" autocomplete="off" value="{{ $edit->project_amount }}" required="">
              </div>

            </div>
            <div class="form-group row">
              <label for="projectStatus" class="col-sm-2 col-form-label">Project Status</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <select name="status" id="status" class="select2 form-control custom-select" style="width: 100%;" required=""  value="{{ $edit->status }}">
                    <option value="0">Active</option>
                    <option value="1">Inactive</option>
                </select>
              </div>
            </div>
            
            <div class="form-group row text-right">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success mr-2">Save</button>
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
                          <th>Project Name</th>
                          <th>Memo No</th>
                          <th>Effective Date</th>
                          <th>Project Budget</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($result as $results)
                        <tr>
                          <td>{{ $results->pname }}</td>
                          <td>{{ $results->memo_no }}</td>
                          <td>{{ $results->date }}</td>
                          <td>{{ $results->project_amount }}</td>
                          <td>
                              @if($results->status == '0')
                              <span >Active</span>
                              @elseif($results->status == '1')
                              <span >Inactive</span>
                              @endif
                         </td> 
                          <td><a href="{{ URL('/projectBudget-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp;&nbsp;
                          <a href="{{ URL('/projectBudget-delete/'.$results->id) }}" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
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