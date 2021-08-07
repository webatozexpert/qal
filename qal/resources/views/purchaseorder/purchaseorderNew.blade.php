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
                    <input type="text" class="form-control" id="fromDate" name="Date" autocomplete="off" value="{{ date('d-m-Y') }}" required="">
                  </div>


                  <label for="supplierName" class="col-sm-2 col-form-label">Supplier Name</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <select name="supplierName" id="supplierName" class="select2 form-control custom-select" style="width: 100%;">
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
                    <select name="procuerementType" id="procuerementType" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="subgroupWiseCategory(this.value)">
                      <option value="By Workorder">By Workorder</option>
                      <option value="By L/C">By L/C</option>
                      <option value="Direct Purchase">Direct Purchase</option>
                    </select>
                  </div>


                  <label for="note" class="col-sm-2 col-form-label">Note</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <input type="text" class="form-control" id="note" name="note" placeholder="Narration" autocomplete="off">
                  </div>

                </div>

                <div class="form-group row">
                  <label for="currency" class="col-sm-2 col-form-label">Currency</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <select name="currency" id="currency" class="select2 form-control custom-select" style="width: 100%;" required="">
                    <option value="">Currency</option>
                     
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
                        <input type="text" class="form-control" id="quantity" name="quantity" autocomplete="off" >
                      </td>
                      <td style="width: 10%;">
                        <input type="text" class="form-control" id="rate" name="rate" autocomplete="off" >
                      </td>
                      <td style="width: 10%;">
                        <input type="text" class="form-control" id="amount" name="amount" autocomplete="off" >
                      </td>
                      <td style="width: 20%;">
                        <input type="text" class="form-control" id="branch" name="branch" autocomplete="off">
                      </td>
                      <td>
                        <button type="button" class="btn btn-success" style="padding: 0px !important;" onclick="addMoreItems()"> ADD</button>
                      </td>
                    </tr>
                  </tbody>
                </table>

                 <br><br><br><br>
                 <p>Terms and Conditions :</p>
                <div class="form-group row">
                <label for="deliveryto" class="col-sm-2 col-form-label">Delivery to</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="deliveryto" name="deliveryto" placeholder="Delivery to" autocomplete="off" required="">
              </div>


                  <label for="zoneName" class="col-sm-2 col-form-label">Payment Term</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="paymentPerm" name="payment_perm" placeholder="Payment Term" autocomplete="off" required="">
              </div>
                </div>
                <div class="form-group row">
                <label for="sample" class="col-sm-2 col-form-label">Sample</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="sample" name="sample" placeholder="Sample" autocomplete="off" required="">
              </div>


                  <label for="zoneName" class="col-sm-2 col-form-label">Acceptance</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="acceptance" name="acceptance" placeholder="Acceptance" autocomplete="off" required="">
              </div>

                </div>

                <div class="form-group row">
                <label for="weliveryWithin" class="col-sm-2 col-form-label">Delivery Within</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="weliveryWithin" name="delivery_within" placeholder="Day..." autocomplete="off" required="">
              </div>
                  <label for="zoneName" class="col-sm-2 col-form-label">Support and Warranty</label>
              <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="addreSupportWarrantyss" name="support_warranty" placeholder="Support and Warranty" autocomplete="off" required="">
              </div>

                </div>

                <div class="form-group row">
                <label for="dateOfvalidity" class="col-sm-2 col-form-label"> Date fo Validity</label>
                  <div class="col-sm-4" style="padding-left: 0;">
                    <input type="text" class="form-control" id="toDate" name="date_of_validity" autocomplete="off" value="{{ date('d-m-Y') }}" required="">
                  </div>

                  <label for="zoneName" class="col-sm-2 col-form-label">Special Instructions</label>
                   <div class="col-sm-4" style="padding-left: 0;">
                <input type="text" class="form-control" id="specialInstructions" name="special_instructions" placeholder="Special Instructions" autocomplete="off" required="">
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