@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
       <h4 class="page-title"> Requisition Approved List</h4>
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
                     {{--  <th style="width:05%;">Detals</th> --}}
                      <th style="width:10%;">Branch</th>
                      <th style="width:10%;">Requisition No</th>
                      <th style="width:10%;">Posting Date</th>
                      <th style="width:10%;">Required Date</th>
                      <th style="width:10%;">Prepared By</th>
                       <th style="width:10%;">Item Group</th>
                      <th style="width:10%;">Memo No</th>
                     
                      <th style="width:10%;">Approved Type</th>
                     
                      <th style="width:05%;">Action</th>
                     
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
                  
                     <td>
                                                
                        @if($results->status=='0')
                       <span style="font-size:10px;" >Pending</span>
                       
                       @elseif($results->status=='1')
                       <span style="font-size:10px;" >Approved</span>
                       @elseif($results->status=='2')
                       <span style="font-size:10px;" >Confirm</span>
                       @elseif($results->status=='3')
                       <span style="font-size:12px;" >Order Confirm</span>

                       @endif
                    </td>
                    
                     <td><a href="{{ URL('/requisition-print/'.$results->id) }}"  target="_blank" title="print" class="btn btn-primary btn-sm"> <i class="fa fa-print" ></i>Preview</a>
                      </td>&nbsp;&nbsp;
                      @if($results->status=='0')
                      <td><a href="{{ URL('/requisition-edit/'.$results->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;
                     
                      <a href="{{ URL('/requisition-delete/'.$results->id) }}" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>

                      @endif
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