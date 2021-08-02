@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">General Item List</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <a href="{{ URL('/new-product') }}">
          <button type="submit" class="btn btn-success mr-2"> <i class="fa fa-user-plus" aria-hidden="true"></i> New Product</button>
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
                       <th>Inventory Type</th>
                      <th>Item Group</th>
                      <th>Item Sub-Group</th>
                      <th>Item Category</th>
                      <th>Item Code</th>
                      <th>Item Name</th>
                      <th>Item Unit</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($result as $results)
                    <tr>
                      <td>{{ $results->inventory_type }}</td>
                      <td>{{ $results->itemgroup }}</td>
                      <td>{{ $results->itemsubgroup }}</td>
                      <td>{{ $results->itemCategory }}</td>
                      <td>{{ $results->item_code }}</td>
                      <td>{{ $results->item_name }}</td>
                      <td>{{ $results->unit }}</td>
                      <td><a href="{{ URL('/product-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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