@extends('masterDashboard')
@section('content')


<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Create Purchase Order</h4>
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
           <form action="{{ URL('/purchase-order-submit') }}" method="POST" class="forms-sample">
                {{ csrf_field() }}    <!-- token -->

                <div class="form-group row">
                  <label for="zoneCode" class="col-sm-2 col-form-label"> Date</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                   <input type="text" class="form-control" id="fromDate" name="postingDate" autocomplete="off" value="{{ date('d-m-Y') }}" required="">
                  </div>


                  <label for="supplierName" class="col-sm-2 col-form-label">Supplier Name</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <select name="supplier_name" id="supplier_name" class="select2 form-control custom-select" style="width: 100%;" required="">
                    <option value="">Enter a supplier name</option>
                     @foreach($supplier as $rows)
                     <option value="{{ $rows->id }}">{{ $rows->company_name }}</option>
                     @endforeach
                     
                    </select>
                  </div>

                </div>
                <div class="form-group row">
                  <label for="procuerementType" class="col-sm-2 col-form-label">Procuerement Type</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <select name="procuerement_type" id="procuerement_type" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="subgroupWiseCategory(this.value)">
                      <option value="By Workorder">By Workorder</option>
                      <option value="By L/C">By L/C</option>
                      <option value="Direct Purchase">Direct Purchase</option>
                    </select>
                  </div>


                 <label for="currency" class="col-sm-2 col-form-label">Currency</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <select name="currency" id="currency" class="select2 form-control custom-select" style="width: 100%;" required="">
                    {{-- <option value="">Currency</option> --}}
                     <option value="BDT">BDT</option>
                     <option value="Dollar">Dollar</option>
                    </select>
                  </div>

                </div>

                 <div class="form-group row">
                 <label for="requisitionNo" class="col-sm-2 col-form-label">Requisition No</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <select name="requisition_no" id="requisition_no" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="requisitionWiseItemName(this.value)">
                    <option value="">Requisition No</option>
                     @foreach($requisition as $rows)
                     <option value="{{ $rows->id }}">{{ $rows->requisition_no }}</option>
                     @endforeach
                    </select>
                  </div>


                  <label for="note" class="col-sm-2 col-form-label">Note</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <input type="text" class="form-control" id="note" name="note" placeholder="Narration" autocomplete="off" required="">
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
                      <td style="width: 20%;">
                       
                         <select name="branch" id="branch" class="select2 form-control custom-select" style="width: 100%;" onchange="ItemNameWiseGroup(this.value)">
                           @foreach($branch as $rows)
                            <option value="{{ $rows->id }}" @if($rows->name=='Head Office') selected="" @endif>{{ $rows->name }}</option>
                           @endforeach
                       
                        </select>
                      </td>
                      <td>
                        <button type="button" id="addRow" class="btn btn-success" style="padding: 0px !important;" onclick="addMore2()" value="Add" > ADD</button>
                      </td>
                    </tr>
                      <input type="hidden" id="prof_count" value="1">
                  </tbody>
                </table>
                 <table id="tblRequisition">
                    <tr>
                      <td id="prof_1"></td>
                    </tr>
                </table>
                 <br><br><br><br>
                 <p>Terms and Conditions :</p>
                <div class="form-group row">
                <label for="deliveryto" class="col-sm-2 col-form-label">Delivery to</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="delivery_to" name="delivery_to" placeholder="Delivery to" autocomplete="off" required="">
              </div>


                  <label for="zoneName" class="col-sm-2 col-form-label">Payment Term</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="paymentPerm" name="payment_term" placeholder="Payment Term" autocomplete="off" required="">
              </div>
                </div>
                <div class="form-group row">
                <label for="sample" class="col-sm-2 col-form-label">Sample</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="sample" name="sample" placeholder="Sample" autocomplete="off" >
              </div>


                  <label for="zoneName" class="col-sm-2 col-form-label">Acceptance</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="acceptance" name="acceptance" placeholder="Acceptance" autocomplete="off" >
              </div>

                </div>

                <div class="form-group row">
                <label for="weliveryWithin" class="col-sm-2 col-form-label">Delivery Within</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="delivery_within" name="delivery_within" placeholder="Day..." autocomplete="off" >
              </div>
                  <label for="zoneName" class="col-sm-2 col-form-label">Support and Warranty</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="support_and_warranty" name="support_and_warranty" placeholder="Support and Warranty" autocomplete="off" >
              </div>

                </div>

                <div class="form-group row">
                <label for="dateOfvalidity" class="col-sm-2 col-form-label"> Date fo Validity</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <input type="text" class="form-control" id="toDate" name="date_fo_validity" autocomplete="off" value="{{ date('d-m-Y') }}" required="">
                  </div>

                  <label for="zoneName" class="col-sm-2 col-form-label">Special Instructions</label>
                   <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="special_instructions" name="special_instructions" placeholder="Special Instructions" autocomplete="off" required="">
              </div>
                </div>
                <br>
                <div class="form-group row text-right">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success mr-2">Save</button>
              </div>
            </div>
              </form>
        </div>

      </div>
    </div>
  </div>
</div>
 
@endsection