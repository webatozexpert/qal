@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Purchase  Order List</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <a href="{{ URL('/purchase_order/create') }}">
          <button type="submit" class="btn btn-success mr-2"> <i class="fa fa-user-plus" aria-hidden="true"></i> Create Purchase Order</button>
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
                     {{--  <th style="width:05%;" >Detals</th> --}}
                      <th style="width:15%;" >P.O No</th>
                      <th style="width:10%;" >P.O Date</th>
                      <th style="width:20%;" >Supplier Name</th>
                      <th style="width:15%;" >Total Amount</th>
                      <th style="width:10%;" >Prepared By</th>
                     
                       <th style="width:10%;" >Status</th>
                        <th style="width:10%;" >Action</th>
                    </tr>
                  </thead>
                   <tbody>
                  @foreach($result as $results)
                    <tr>
                      
                      
                      <td><a href="{{ URL('/purchaseOrder-print/'.$results->id) }}" target="_blank" title="print">{{ $results->order_no }}</a>
                      </td>
                      <td>{{ $results->postingDate}}</td>
                      <td>{{ $results->supplier_name}}</td>
                      <td>Total Amount</td>
                      <td>{{ $results->created_by }}</td>
                     
                  
                     <td>
                                                
                        @if($results->status=='0')
                       <span >Pending</span>
                       
                       @elseif($results->status=='1')
                       <span >Approved</span>
                       @elseif($results->status=='2')
                       <span >Confirm</span>
                       @elseif($results->status=='3')
                       <span >Order Confirm</span>

                       @endif
                    </td>

                     <td><a href="{{ URL('/purchaseOrder-print/'.$results->id) }}"  target="_blank" title="print" class="btn btn-primary btn-sm"> <i class="fa fa-print" ></i>Preview</a>
                     &nbsp;
                   
                      <a href="{{ URL('/po-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;
                     
                      <a href="{{ URL('/purchase-delete/'.$results->id) }}" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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