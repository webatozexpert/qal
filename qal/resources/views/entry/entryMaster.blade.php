@extends('masterDashboardQIL')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      
      <div class="row">       

        <div class="col-7 table-responsive">
          <h3 class="card-title text-center">Order Query</h3>
          <form action="" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->
            <div class="form-group row">
              <label for="zoneCode" class="col-sm-3 col-form-label">Customer Name</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Customer Name" autocomplete="off" required="" onkeypress="hover(this.id)">
              </div>
            </div>
            <div class="form-group row">
              <label for="zoneCode" class="col-sm-3 col-form-label">Customer Mobile</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <input type="number" class="form-control" id="customerMobile" name="customerMobile" placeholder="Customer Mobile" autocomplete="off" required="" onkeypress="hover(this.id)">
              </div>
            </div>
            <div class="form-group row">
              <label for="zoneCode" class="col-sm-3 col-form-label">Customer Address</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <input type="text" class="form-control" id="customerAddress" name="customerAddress" placeholder="Customer Address" autocomplete="off" required="" onkeypress="hover(this.id)">
              </div>
            </div>
            <div class="form-group row">
              <label for="zoneCode" class="col-sm-3 col-form-label">Comment</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <textarea name="comment" id="comment" placeholder="Comment here.." class="form-control" rows="11" onkeypress="hover(this.id)"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="zoneName" class="col-sm-3 col-form-label">Lead</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <select class="form-control" name="queryLead" id="queryLead">
                  <option value="Phone">Phone</option>
                  <option value="Message">Message</option>
                  <option value="Facebook">Facebook</option>
                </select>
              </div>
            </div>
            <div class="form-group row text-right">
              <div class="col-sm-12">
                <button type="button" class="btn btn-success mr-2" onclick="orderQuery()">Query Submit</button>
              </div>
            </div>
          </form>
          <p></p>
          
        </div>

        <div class="col-5 table-responsive">
          <h3 class="card-title text-center">Order</h3>
          <form action="" method="POST" class="forms-sample">
            {{ csrf_field() }}    <!-- token -->
            <div class="form-group row">
              <label for="zoneCode" class="col-sm-3 col-form-label">Customer ID</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <input type="text" class="form-control" id="customerID" name="customerID" placeholder="Customer ID (A-001)" autocomplete="off" required="" onkeypress="hover(this.id)">
              </div>
            </div>
            <div class="form-group row">
              <label for="zoneName" class="col-sm-3 col-form-label">Lead</label>
              <div class="col-sm-9" style="padding-left: 0;">
                <select class="form-control" name="lead" id="lead">
                  <option value="Phone">Phone</option>
                  <option value="Message">Message</option>
                  <option value="Facebook">Facebook</option>
                </select>
              </div>
            </div>
            <div class="form-group row text-right">
              <div class="col-sm-12">
                <button type="button" class="btn btn-success mr-2"  onclick="order()">Order Submit</button>
              </div>
            </div>
          </form>
          <p></p>
          
        </div>

      </div>
    </div>
  </div>
</div>

@endsection