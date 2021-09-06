@extends('masterDashboard')
@section('content')


<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">New Purchase Requisition</h4>
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
           <form action="{{ URL('/requisition-submit') }}" method="POST" class="forms-sample">
                {{ csrf_field() }}    <!-- token -->

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-2 col-form-label">Posting Date</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <input type="text" class="form-control" id="fromDate" name="postingDate" autocomplete="off" value="{{ date('d-m-Y') }}" required="">
                  </div>


                  <label for="zoneCode" class="col-sm-2 col-form-label">Required Date</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <input type="text" class="form-control" id="toDate" name="requiredDate" autocomplete="off" value="{{ date('d-m-Y') }}" required="">
                  </div>

                </div>

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-2 col-form-label">Branch Name</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <select name="branch_id" id="branch_id" class="select2 form-control custom-select" style="width: 100%;" required="">
                      <option value="">Select</option>
                      @foreach($branch as $rows)
                        <option value="{{ $rows->id }}" @if($rows->name=='Head Office') selected="" @endif>{{ $rows->name }}</option>
                      @endforeach
                    </select>
                  </div>


                  <label for="zoneCode" class="col-sm-2 col-form-label">Memo No</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <select name="memo_no" id="memo_no" class="select2 form-control custom-select" style="width: 100%;"  >
                      <option value="">Select</option>
                     @foreach($project_budget as $rows)
                     <option value="{{ $rows->id }}">{{ $rows->memo_no }}</option>
                     @endforeach
                    </select>
                  </div>

                </div>

                <div class="form-group row">
                 <label for="zoneCode" class="col-sm-2 col-form-label">Procuerement Type</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <select name="procuerementType" id="procuerementType" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="subgroupWiseCategory(this.value)">
                      <option value="By Workorder">By Workorder</option>
                      <option value="By L/C">By L/C</option>
                      <option value="Direct Purchase">Direct Purchase</option>
                    </select>
                  </div>

                  <label for="zoneCode" class="col-sm-2 col-form-label">Priority</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <select name="priority" id="priority" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="subgroupWiseCategory(this.value)">
                      <option value="Regular">Regular</option>
                      <option value="Occational">Occational</option>
                      <option value="Emergency">Emergency</option>
                    </select>
                  </div>

                </div>

                <div class="form-group row">
                   <label for="zoneCode" class="col-sm-2 col-form-label">Item Group</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <select name="item_group" id="item_group" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="groupWiseItemName(this.value)">
                      {{-- <option value="">Select</option> --}}
                      @foreach($item_group as $rows)
                        <option value="{{ $rows->id }}" @if($rows->name=='ASSETS') selected="" @endif>{{ $rows->name }}</option>
                      @endforeach
                    </select>
                  </div>
                 


                  <label for="zoneCode" class="col-sm-2 col-form-label">Note</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Note.." autocomplete="off">
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
                    <input type="hidden" id="prof_count" value="1">
                    
                  </tbody>
                </table>
                <table>
                    <tr>
                      <td id="prof_1"></td>
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


   {{--  <script type="text/javascript">
        $(function () {
            //Build an array containing Customer records.
            var requisitions = new Array();
           
            //Add the data rows.
            // for (var i = 0; i < requisitions.length; i++) {
            //     AddRow(requisitions[i][0], requisitions[i][1],requisitions[i][2]);
            // }
        });

        // function Add() {
        //     AddRow($("#item_name").val(), $("#unit").val(),$("#required_quantity").val());
        //     $("#item_name").val("");
        //      $("#unit").val("");
        //     $("#required_quantity").val("");
        // };

        function AddRow(item_name, unit,required_quantity) {
            //Get the reference of the Table's TBODY element.
            var tBody = $("#tblRequisition> TBODY")[0];

            //Add Row.
            row = tBody.insertRow(-1);

            //Add item_name cell.
            var cell = $(row.insertCell(-1));
            cell.html(item_name);

            //Add unit cell.
            var cell = $(row.insertCell(-1));
            cell.html(unit);

            //Add required_quantity cell.
            cell = $(row.insertCell(-1));
            cell.html(required_quantity);

            //Add Button cell.
            cell = $(row.insertCell(-1));
            var btnRemove = $("<input />");
            btnRemove.attr("type", "button");
            btnRemove.attr("onclick", "Remove(this);");
            btnRemove.val("Remove");
            cell.append(btnRemove);
        };

        function Remove(button) {
            //Determine the reference of the Row using the Button.
            var row = $(button).closest("TR");
            var name = $("TD", row).eq(0).html();
            if (confirm("Do you want to delete: " + name)) {

                //Get the reference of the Table.
                var table = $("#tblRequisition")[0];

                //Delete the Table row using it's Index.
                table.deleteRow(row[0].rowIndex);
            }
        };
    </script> --}}
@endsection