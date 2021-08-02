@extends('masterDashboard')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-7 table-responsive">
          <h3 class="card-title text-center">Project Information</h3>
          <form action="{{ URL('/project-update') }}" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->
            <input type="hidden" name="id" value="{{ $edit->id }}">
            <div class="form-group row">
              <label for="projectName" class="col-sm-3 col-form-label">Project Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="projectName" name="projectName" placeholder="project Name" value="{{ $edit->name }}" autocomplete="off" required="">
              </div>
            </div>
            <div class="form-group row">
              <label for="projectStatus" class="col-sm-3 col-form-label">Project Status</label>
              <div class="col-sm-9">
                <select name="projectStatus" id="projectStatus" class="select2 form-control custom-select" style="width: 100%;" required=""  value="{{ $edit->status }}">
                      <option value="0">Active</option>
                      <option value="1">Inactive</option>
                </select>
              </div>
            </div>
            <div class="form-group row text-right">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success mr-2">Update</button>
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
                          <th>project Name</th>
                          <th>project Status</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($result as $results)
                        <tr @if($edit->id==$results->id) style="background-color: #007F3D; color: #FFF;" @endif>
                          <td>{{ $results->name }}</td>

                          <td>
                                   @if($results->status == '0')
                                   <span >Active</span>
                                   @elseif($results->status == '1')
                                   <span >Inactive</span>
                                   @endif
                               </td>

                          <td><a href="{{ URL('/project-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                          <a href="{{ URL('/project-delete/'.$results->id) }}" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
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