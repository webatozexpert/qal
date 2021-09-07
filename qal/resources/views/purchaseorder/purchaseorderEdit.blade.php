@extends('masterDashboard')
@section('content')


<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Update Purchase Order</h4>
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
          <form action="{{ URL('/po-update') }}" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->

            <input type="hidden" name="id" value="{{$poid}}">

            <div class="form-group row">
              <label for="zoneCode" class="col-sm-2 col-form-label"> Date</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="fromDate" name="postingDate" autocomplete="off" value="{{ date('d-m-Y', strtotime($purchases->postingDate)) }}" required="">
              </div>


              <label for="supplierName" class="col-sm-2 col-form-label">Supplier Name</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <select name="supplier_name" id="supplier_name" class="select2 form-control custom-select" style="width: 100%;" required="">
                  <option value="">Enter a supplier name</option>
                  @foreach($supplier as $rows)
                  <option value="{{ $rows->id }}" @if($rows->id==$purchases->supplier_name) selected="" @endif>{{ $rows->company_name }}</option>
                  @endforeach

                </select>
              </div>

            </div>
            <div class="form-group row">
              <label for="procuerementType" class="col-sm-2 col-form-label">Procuerement Type</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <select name="procuerement_type" id="procuerementType" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="subgroupWiseCategory(this.value)">
                  <option value="By Workorder" @if('By Workorder'==$purchases->procuerement_type) selected="" @endif>By Workorder</option>
                  <option value="By L/C" @if('By L/C'==$purchases->procuerement_type) selected="" @endif>By L/C</option>
                  <option value="Direct Purchase" @if('Direct Purchase'==$purchases->procuerement_type) selected="" @endif>Direct Purchase</option>
                </select>
              </div>


              <label for="currency" class="col-sm-2 col-form-label">Currency</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <select name="currency" id="currency" class="select2 form-control custom-select" style="width: 100%;" required="">
                  {{-- <option value="">Currency</option> --}}
                  <option value="BDT" @if('BDT'==$purchases->currency) selected="" @endif>BDT</option>
                  <option value="Dollar" @if('Dollar'==$purchases->currency) selected="" @endif>Dollar</option>
                </select>
              </div>

            </div>

            <div class="form-group row">
              <label for="requisitionNo" class="col-sm-2 col-form-label">Requisition No</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <select name="requisition_no" id="requisition_no" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="requisitionWiseItemName(this.value)">
                  <option value="">Requisition No</option>
                  @foreach($requisition as $rows)
                  <option value="{{ $rows->id }}" @if($rows->requisition_no==$purchases->requisition_no) selected="" @endif >{{ $rows->requisition_no }}</option>
                  {{-- <option value="{{ $rows->id }}" @if($rows->requisition_no==$purchases->requisition_no) selected="" @endif >{{ $rows->requisition_no.'_'.$purchases->requisition_no }}</option> --}}
                  @endforeach
                </select>
              </div>


              <label for="note" class="col-sm-2 col-form-label">Note</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="note" name="note" placeholder="Narration" autocomplete="off" required="" value="{{ $purchases->note }}">
              </div>

            </div>

            {{-- <p>&nbsp;</p> --}}
            <p>&nbsp;</p>

            <table style="background-color: #F2F4F5;" width="100%">
              <thead>
                <tr>
                  <th style="padding: 10px 10px 0 10px;">Item Description</th>
                  <th style="padding: 10px 10px 0 10px;">Quantity</th>
                  <th style="padding: 10px 10px 0 10px;">Rate</th>
                  <th style="padding: 10px 10px 0 10px;">Amount</th>
                  <th style="padding: 10px 10px 0 10px;">Branch</th>
                  <th style="padding: 10px 10px 0 10px;">Action</th>
                  <td></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 50%;">
                    <select name="item_name" id="item_name" class="select2 form-control custom-select" style="width: 100%;" onchange="ItemNameWiseQuantity(this.value)">
                      <option value="">Item Description</option>
                    </select>
                  </td>
                  <td style="width: 10%;">
                    <input type="text" class="form-control" id="quantity" name="quantity" autocomplete="off" readonly="">
                  </td>
                  <td style="width: 10%;">
                    <input type="text" class="form-control" id="rate" name="rate" autocomplete="off" onkeyup="makeAmount()">
                  </td>
                  <td style="width: 10%;">
                    <input type="text" class="form-control" id="amount" name="amount" autocomplete="off" readonly="">
                  </td>
                  <td style="width: 16%;">

                    <select name="branch" id="branch" class="select2 form-control custom-select" style="width: 100%;" onchange="ItemNameWiseGroup(this.value)">
                      @foreach($branch as $rows)
                      <option value="{{ $rows->id }}" @if($rows->name=='Head Office') selected="" @endif>{{ $rows->name }}</option>
                      @endforeach

                    </select>
                  </td>
                  <td>
                    <button type="button" id="addRow" class="btn btn-success" style="padding: 01px 10px 01px 10px !important;" onclick="addMore2()" value="Add" > ADD</button>
                  </td>
                </tr>

              </tbody>
            </table>

            <table id="tblRequisition" class="table-responsive" width="100%">

              @php $pos=1;@endphp
              @foreach($poitemsEdit as $items)

              <tr class="prof blueBox" id="prof_{{$pos}}">

                <td><input style="width: 525px;"  type="text" id="item_name{{$pos}}" name="item_name1[]" maxlength="10" value="{{$items->item_name}}" readonly="" class="form-control"/><input type="hidden" id="item_id{{$pos}}" name="item_id1[]" value="{{$items->item_id}}" readonly="" /></td>

                <td><input style="width: 104px;"  type="text" id="quantity{{$pos}}" name="quantity1[]" maxlength="10" value="{{$items->quantity}}" readonly="" class="form-control"/></td>

                <td><input style="width: 99px;"  type="text" id="rate{{$pos}}" name="rate1[]" maxlength="10" value="{{$items->rate}}" readonly="" class="form-control"/></td>

                <td><input style="width: 105px;"  type="text" id="amount{{$pos}}" name="amount1[]" maxlength="10" value="{{$items->amount}}" readonly="" class="form-control"/></td>

                <td><input style="width: 150px;"  type="text" id="branch{{$pos}}" name="branch1[]" maxlength="10" value="{{$items->branch}}" readonly="" class="form-control"/></td>

                <td><input type="button" value="Remove" onClick="del({{$pos}})" style="cursor: pointer; color: #fff; background: red;" tile="Delete"></td>
              </tr>
              @php $pos++;@endphp

              @endforeach
              <input type="hidden" id="prof_count" value="{{$pos}}">
              <tr id="prof_{{$pos}}">
                {{-- <td id="prof_{{$pos}}"></td> --}}
              </tr>

            </table>

            <br><br>
            <p>Terms and Conditions :</p>
            <div class="form-group row">
              <label for="deliveryto" class="col-sm-2 col-form-label">Delivery to</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="delivery_to" name="delivery_to" placeholder="Delivery to" autocomplete="off" required="" value="{{ $purchases->delivery_to }}">
              </div>


              <label for="zoneName" class="col-sm-2 col-form-label">Payment Term</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="paymentPerm" name="payment_term" placeholder="Payment Term" autocomplete="off" required="" value="{{ $purchases->payment_term }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="sample" class="col-sm-2 col-form-label">Sample</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="sample" name="sample" placeholder="Sample" autocomplete="off"  value="{{ $purchases->sample }}">
              </div>


              <label for="zoneName" class="col-sm-2 col-form-label">Acceptance</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="acceptance" name="acceptance" placeholder="Acceptance" autocomplete="off" value="{{ $purchases->acceptance }}">
              </div>

            </div>

            <div class="form-group row">
              <label for="weliveryWithin" class="col-sm-2 col-form-label">Delivery Within</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="delivery_within" name="delivery_within" placeholder="Day..." autocomplete="off" value="{{ $purchases->delivery_within }}">
              </div>
              <label for="zoneName" class="col-sm-2 col-form-label">Support and Warranty</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="support_and_warranty" name="support_and_warranty" placeholder="Support and Warranty" autocomplete="off" value="{{ $purchases->support_and_warranty }}" >
              </div>

            </div>

            <div class="form-group row">
              <label for="dateOfvalidity" class="col-sm-2 col-form-label"> Date fo Validity</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="toDate" name="date_fo_validity" autocomplete="off" value="{{ date('d-m-Y', strtotime($purchases->date_fo_validity)) }}">
              </div>

              <label for="zoneName" class="col-sm-2 col-form-label">Special Instructions</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="special_instructions" name="special_instructions" placeholder="Special Instructions" autocomplete="off" required="" value="{{ $purchases->special_instructions }}">
              </div>
            </div>
            <br>

            <div class="form-group row text-right">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success mr-2">Save Purchase Order</button>
              </div>
            </div>


          </form>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection