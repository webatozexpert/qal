@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Purchase Requisition List</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <a href="{{ URL('/creact-requisition') }}">
          <button type="submit" class="btn btn-success mr-2"> <i class="fa fa-user-plus" aria-hidden="true"></i> Create-New-Requisition</button>
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
                    <th style="width:05%;">Branch</th>
                    <th style="width:13%;">Requisition No</th>
                    <th style="width:15%;">Posting Date</th>
                    <th style="width:15%;">Required Date</th>
                    <th style="width:10%;">Prepared By</th>
                    <th style="width:10%;">Item Group</th>
                    <th style="width:10%;">Memo No</th>
                    <th style="width:15%;">Procuerement Type</th>
                     <th style="width:02%;">Status</th>
                    <th style="width:02%;">Edit</th>
                    <th style="width:04%;">Delete</th>
                  
                   {{--  <th style="width:03%;">View</th> --}}
				        </tr>
                  </thead>
                  <tbody>
                  @foreach($result as $results)
                    <tr>
                      <td>{{ $results->bname }}</td>
                      
                      <td><a href="{{ URL('/requisition-print/'.$results->id) }}" title="print">{{ $results->requisition_no }}</a>
                      </td>
                      <td>{{ $results->postingDate}}</td>
                      <td>{{ $results->requiredDate}}</td>
                      <td>{{ $results->created_by }}</td>
                      <td>{{ $results->item_group }}</td>
                      <td>{{ $results->memo_no}}</td>
                      <td>{{ $results->procuerementType}}</td>
                     <td>
                                                
                        @if($results->status=='0')
                       <span style="background: #FB0A18;padding: 5px; color: #fff">Pending</span>
                       
                       @elseif($results->status=='1')
                       <span style="background: #10B7F5;padding: 5px; color: #fff">Approved</span>
                       @elseif($results->status=='2')
                       <span style="background: green;padding: 5px; color: #fff">Confirm</span>
                       @elseif($results->status=='3')
                       <span style="background: green;padding: 5px; color: #fff">Order Confirm</span>

                       @endif
                    </td>
                      <td><a href="{{ URL('/requisition-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      </td>
                      <td><a href="{{ URL('/requisition-delete/'.$results->id) }}" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>

                      {{-- <td><a href="{{ URL('/requisition-view/'.$results->id) }}" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      </td> --}}
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