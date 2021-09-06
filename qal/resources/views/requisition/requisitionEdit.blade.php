@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Update Requisition</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ URL('/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ URL('/requisition') }}">All Requisition</a>
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
          <form action="{{ URL('/requisition-update') }}" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->

            <input type="hidden" name="id" value="{{$rid}}">

            <div class="form-group row">
              <label for="zoneCode" class="col-sm-2 col-form-label">Posting Date</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="fromDate" name="postingDate" autocomplete="off" value="{{ date('d-m-Y', strtotime($result->postingDate)) }}" required="">
              </div>


              <label for="zoneCode" class="col-sm-2 col-form-label">Required Date</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="toDate" name="requiredDate" autocomplete="off" value="{{ date('d-m-Y', strtotime($result->requiredDate)) }}" required="">
              </div>

            </div>

            <div class="form-group row">
              <label for="zoneCode" class="col-sm-2 col-form-label">Branch Name</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <select name="branch_id" id="branch_id" class="select2 form-control custom-select" style="width: 100%;" required="">
                  <option value="">Select</option>
                  @foreach($branch as $rows)
                  <option value="{{ $rows->id }}" @if($rows->id==$result->branch_id) selected="" @endif>{{ $rows->name }}</option>
                  @endforeach
                </select>
              </div>


              <label for="zoneCode" class="col-sm-2 col-form-label">Memo No</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <select name="memo_no" id="memo_no" class="select2 form-control custom-select" style="width: 100%;"  >
                  <option value="">Select</option>
                  @foreach($project_budget as $rows)
                  <option value="{{ $rows->id }}" @if($rows->id==$result->memo_no) selected="" @endif>{{ $rows->memo_no }}</option>
                  @endforeach
                </select>
              </div>

            </div>

            <div class="form-group row">
              <label for="zoneCode" class="col-sm-2 col-form-label">Procuerement Type</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <select name="procuerementType" id="procuerementType" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="subgroupWiseCategory(this.value)">
                  <option value="By Workorder" @if('By Workorder'==$result->procuerementType) selected="" @endif>By Workorder</option>
                  <option value="By L/C" @if('By L/C'==$result->procuerementType) selected="" @endif>By L/C</option>
                  <option value="Direct Purchase" @if('Direct Purchase'==$result->procuerementType) selected="" @endif>Direct Purchase</option>
                </select>
              </div>

              <label for="zoneCode" class="col-sm-2 col-form-label">Priority</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <select name="priority" id="priority" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="subgroupWiseCategory(this.value)">
                  <option value="Regular" @if('Regular'==$result->priority) selected="" @endif>Regular</option>
                  <option value="Occational" @if('Occational'==$result->priority) selected="" @endif>Occational</option>
                  <option value="Emergency" @if('Emergency'==$result->priority) selected="" @endif>Emergency</option>
                </select>
              </div>

            </div>

            <div class="form-group row">
              <label for="zoneCode" class="col-sm-2 col-form-label">Item Group</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <select name="item_group" id="item_group" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="groupWiseItemName(this.value)">
                  {{-- <option value="">Select</option> --}}
                  @foreach($item_group as $rows)
                  <option value="{{ $rows->id }}" @if($rows->id==$result->item_group) selected="" @endif>{{ $rows->name }}</option>
                  @endforeach
                </select>
              </div>



              <label for="zoneCode" class="col-sm-2 col-form-label">Note</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="description" name="description" placeholder="Note.." autocomplete="off" value="{{ $result->description }}" >
              </div>

            </div>

            {{-- <p>&nbsp;</p> --}}
            <p>&nbsp;</p>

            <table {{-- id="tblRequisition" --}} style="background-color: #F2F4F5;" width="100%">
              <thead>
                <tr>
                  <th style="padding: 10px 10px 0 10px;">Name of Item</th>
                  <th style="padding: 10px 10px 0 10px;">Unit</th>
                  <th style="padding: 10px 10px 0 10px;">Required Quantity</th>
                  <th style="padding: 10px 10px 0 10px;">Action</th>
                  <td></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 60%;">
                    <select name="item_name" id="item_name" class="select2 form-control custom-select" style="width: 100%;" onchange="ItemNameWiseUnit(this.value)">
                      <option value="">Enter Item Name</option>
                    </select>
                  </td>
                  <td style="width: 20%;">
                    <input type="text" id="unit" name="unit" class="form-control"   autocomplete="off" >
                  </td>
                  <td style="width: 20%;">
                    <input type="text" class="form-control" id="required_quantity" name="required_quantity" autocomplete="off">
                  </td>
                  <td>
                    <button type="button" id="addRow" class="btn btn-success" style="padding: 01px 13px 01px 13px !important;" onclick="addMore1()" value="Add" > ADD</button>
                  </td>
                </tr>
                

              </tbody>
            </table>
            <table class="table-responsive" width="100%">
              
              @php $rs=1;@endphp
              @foreach($itemsEdit as $items)

                <tr class="prof blueBox" id="prof_{{$rs}}">                
                  <td><input style="width: 610px;" type="text" id="item_name{{$rs}}" name="item_name1[]" maxlength="10" value="{{$items->item_name}}" readonly="" class="form-control"/><input type="hidden" id="item_id{{$rs}}" name="item_id1[]" value="{{$items->item_id}}"/></td>
                  <td><input style="width: 200px;" type="text" id="unit{{$rs}}" name="unit1[]" maxlength="10" value="{{$items->unit}}" readonly="" class="form-control"/></td>
                  <td><input style="width:200px;" type="text" id="required_quantity{{$rs}}" name="required_quantity1[]" maxlength="10" value="{{$items->quantity}}" class="form-control"/></td>
                  <td><input type="button" value="Remove" onClick="delRequisition({{$rs}})" style="cursor: pointer; color: #fff; background: red;" tile="Delete"></td>
                </tr>
                @php $rs++;@endphp

              @endforeach
              <input type="hidden" id="prof_count" value="{{$rs}}">
              <tr>
                <td id="prof_{{$rs}}"></td>
              </tr>

            </table>

            <div class="form-group row text-right" style="padding-top:15px;">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success mr-2">Save Requisition</button>
              </div>
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection