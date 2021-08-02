@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Delivery Order</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <a href="{{ URL('/new-order') }}">
          <button type="submit" class="btn btn-success mr-2"> <i class="fas fa-plus-circle" aria-hidden="true"></i> New Delivery Order</button>
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
                      <th>No</th>
                      <th>Zone</th>
                      <th>Customer</th>
                      <th>Tilapia</th>
                      <th>Com (5%)</th>
                      <th>Pungas</th>
                      <th>Com (5%)</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($result as $results)
                    <tr>                      
                      <td>{{ $results->delivery_order_no }}</td>
                      <td>{{ $results->zname }}</td>
                      <td>{{ $results->cname }}</td>
                      <td>{{ $results->hybrid_monosex_tilapia_qty }}</td>
                      <td>{{ $results->tilapia_complementary_qty }}</td>
                      <td>{{ $results->hybrid_monosex_pungas_qty }}</td>
                      <td>{{ $results->pungas_complementary_qty }}</td>
                      <td>{{ date('d-m-Y',strtotime($results->do_date)) }}</td>
                      <td><a href="{{ URL('/order-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp;&nbsp;
                      <a href="{{ URL('/order-pdf/'.$results->id) }}" title="Print"><i class="fa fa-print" aria-hidden="true"></i></a>
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