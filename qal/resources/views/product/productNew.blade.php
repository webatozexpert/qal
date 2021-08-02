@extends('masterDashboard')
@section('content')


<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Create New General Item</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ URL('/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ URL('/product-setup') }}">Product</a>
            </li>

          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

@if(Session::has('success'))     
    <div class="alert alert-success alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> {{ Session::get('success') }}
    </div>
@endif


<div class="container-fluid">
  <div class="card">
    <div class="card-body">

      <div class="row">
        <div class="col-12 table-responsive">
          <div class="card">
            <div class="card-body" style="padding: 0px;">
             <form action="{{ URL('/product-submit') }}" method="POST" class="forms-sample">
                {{ csrf_field() }}    <!-- token -->
               
                 
                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Item Group</label>
                  <div class="col-sm-8" style="padding-left: 0;">
                    <select name="itemgroup" id="itemgroup_id" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="groupWiseSubGroup(this.value)">
                      <option value="">Select</option>
                      @foreach($itemGroup as $group)
                      <option value="{{ $group->id }}">{{ $group->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="zoneCode" class="col-sm-1" data-toggle="modal" data-target="#modalGroup" style="cursor: pointer;">+Add</label>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Item Sub-Group</label>
                  <div class="col-sm-8" style="padding-left: 0;">
                    <select name="itemsubgroup" id="itemsubgroup_id" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="subgroupWiseCategory(this.value)">
                      <option value="">Select</option>
                    </select>
                  </div>

                  <label for="zoneCode" class="col-sm-1" data-toggle="modal" data-target="#modelSubgroup" style="cursor: pointer;">+Add</label>
                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-3 col-form-label">Item Category</label>
                  <div class="col-sm-8" style="padding-left: 0;">
                    <select name="itemCategory" id="item_category_id" class="select2 form-control custom-select" style="width: 100%;" required="">
                      <option value="">Select</option>
                      
                    </select>
                  </div>

                  <label for="zoneCode" class="col-sm-1" data-toggle="modal" data-target="#modelCategory" style="cursor: pointer;">+Add</label>
                </div>

                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Item Name</label>
                  <div class="col-sm-8" style="padding-left: 0;">
                    <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Product Name" autocomplete="off" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Item Code</label>
                  <div class="col-sm-8" style="padding-left: 0;">
                    <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Product Code" autocomplete="off" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Item Unit</label>
                  <div class="col-sm-8" style="padding-left: 0;">
                    <select name="unit" id="item_unit_id" class="select2 form-control custom-select" style="width: 100%;" required="">
                      <option value="">Select</option>
                      @foreach($itemUnit as $unit)
                      <option value="{{ $unit->id }}">{{ $unit->unit }}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="zoneCode" class="col-sm-1" data-toggle="modal" data-target="#modelUnit" style="cursor: pointer;">+Add</label>
                </div>

                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Alternative Unit</label>
                  <div class="col-sm-8" style="padding-left: 0;">
                    <select name="itemAlternativeUnit" id="item_alternative_unit_id" class="select2 form-control custom-select" style="width: 100%;">
                      <option value="">Select</option>
                      @foreach($itemUnit as $unit)
                      <option value="{{ $unit->id }}">{{ $unit->unit }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Where</label>
                  <div class="col-sm-2" style="padding-left: 0;">
                    <input type="text" class="form-control" id="where_unit" name="whereUnit" placeholder="Where unit" autocomplete="off">
                  </div>
                  <label for="zoneName" class="col-sm-1 col-form-label" style="width: 10px !important;">=</label>
                  <div class="col-sm-2" style="padding-left: 0;">
                    <input type="text" class="form-control" id="where_kg" name="whereKg" placeholder="KG" autocomplete="off">                    
                  </div>
                </div>  
                <div class="form-group row">
                  <label for="zoneName" class="col-sm-3 col-form-label">Item Description</label>
                  <div class="col-sm-8" style="padding-left: 0;">
                    <input type="text" class="form-control" id="item_description" name="description" placeholder="Description" autocomplete="off">
                  </div>
                </div>  
                <div class="form-group row">
                <label for="zoneCode" class="col-sm-3 col-form-label">Inventory Type</label>
                  <div class="col-sm-8" style="padding-left: 0;">
                  <select name="inventory_type" id="inventory_type" class=" form-control custom-select" style="width: 100%;">
                                <option value="">Select</option>
                                <option value=1>Raw Materials</option>
                                <option value=2>Packaging</option>
                                <option value=3>General</option>
                                <option value=4>Mechanical</option>
                                <option value=5>Electrical</option>
                      </select>
                  </div>
                  
                
                <div class="form-group row text-right">
                  <div class="col-sm-11">
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                  </div>
                </div>
             </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<!-- ADD NEW GROUP -->
<form action="{{ URL('/product-group-submit') }}" method="POST" class="forms-sample">
  {{ csrf_field() }}    <!-- token -->

  <!-- The Modal -->
  <div class="modal fade" id="modalGroup">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD NEW GROUP</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">


            <div class="form-group row">
              <label for="zoneName" class="col-sm-3 col-form-label">Group Name</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <input type="text" class="form-control" id="gname" name="gname" placeholder="New Group Name" autocomplete="off" value="" required="">
              </div>
            </div>
               <div class="form-group row">
                 <label for="zoneCode" class="col-sm-3 col-form-label">Authorized Group</label>
                  <div class="col-sm-9" style="padding-left: 0;">
                    <select name="authorized_group" id="authorized_group"  placeholder="" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="groupWiseSubGroup(this.value)"><option value="">Select</option>
                       <option value=3>Managing Director</option>
                      <option value=4>Vice-Chairman</option>
                      <option value=5>Chairman</option>
                   </select>
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
<!-- Add New Subgroup -->
<form action="{{ URL('/product-subgroup-submit') }}" method="POST" class="forms-sample">
  {{ csrf_field() }}    <!-- token -->

  <!-- The Modal -->
  <div class="modal fade" id="modelSubgroup">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Subgroup</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
          <div class="form-group row">
            <label for="zoneName" class="col-sm-3 col-form-label">Item Group</label>
            <div class="col-sm-9" style="padding-left: 0;">
              <select name="group_id" id="group_id" class="select2 form-control custom-select" style="width: 100%;" required="">
                <option value="">Select</option>
                @foreach($itemGroup as $rows)
                <option value="{{ $rows->id }}">{{$rows->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          
        

          <div class="form-group row">
            <label for="zoneName" class="col-sm-3 col-form-label">Sub group</label>
            <div class="col-sm-9" style="padding-left: 0;">
              <input type="text" class="form-control" id="name" name="name" placeholder="Sub group Name" autocomplete="off" value="" required="">
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

<!-- ADD NEW CATEGORY -->
<form action="{{ URL('/product-category-submit') }}" method="POST" class="forms-sample">
  {{ csrf_field() }}    <!-- token -->

  <!-- The Modal -->
  <div class="modal fade" id="modelCategory">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD NEW CATEGORY</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
      
          <div class="form-group row">
            <label for="zoneName" class="col-sm-3 col-form-label">Item Group</label>
            <div class="col-sm-9" style="padding-left: 0;">
              <select name="group_id" id="group_id" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="groupWiseSubGroup(this.value)">
                <option value="">Select</option>
                @foreach($itemGroup as $rows)
                <option value="{{ $rows->id }}">{{$rows->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="zoneName" class="col-sm-3 col-form-label">Item Sub Group</label>
            <div class="col-sm-9" style="padding-left: 0;">
              <select name="subgroup_id" id="subgroup_id" class="select2 form-control custom-select" style="width: 100%;" required="">
                <option value="">Select</option>
                @foreach($itemSubgroup as $rows)
                <option value="{{ $rows->id }}">{{ $rows->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="zoneName" class="col-sm-3 col-form-label">Category Name</label>
            <div class="col-sm-9" style="padding-left: 0;">
              <input type="text" class="form-control" id="name" name="name" placeholder="New Category Name" autocomplete="off" value="" required="">
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



<form action="{{ URL('/product-unit-submit') }}" method="POST" class="forms-sample">
  {{ csrf_field() }}    <!-- token -->

  <!-- The Modal -->
  <div class="modal fade" id="modelUnit">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD NEW UNIT</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

          <div class="form-group row">
            <label for="zoneName" class="col-sm-3 col-form-label">New Unit</label>
            <div class="col-sm-9" style="padding-left: 0;">
              <input type="text" class="form-control" id="name" name="name" placeholder="New Unit" autocomplete="off" value="" required="">
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

<form action="{{ URL('/product-packsize-submit') }}" method="POST" class="forms-sample">
  {{ csrf_field() }}    <!-- token -->

  <!-- The Modal -->
  <div class="modal fade" id="modelPackSize">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Pack Size Type</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

          <div class="form-group row">
            <label for="zoneName" class="col-sm-3 col-form-label">Pack Size Type</label>
            <div class="col-sm-9" style="padding-left: 0;">
              <input type="text" class="form-control" id="name" name="name" placeholder="New Pack Size Type" autocomplete="off" value="" required="">
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

@endsection