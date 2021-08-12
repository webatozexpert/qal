@extends('masterDashboard')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
       
          <button type="button" class="btn btn-success mr-2" onclick="DeleteBanner()">  All Confirm</button>
       
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
       <h4 class="page-title">Requisition Pending List</h4>
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
                  <th style="width:02%;"><input type="checkbox" id="select-all" name="select-all"></th>
                    <th style="width:05%;">Branch</th>
                    <th style="width:13%;">Requisition No</th>
                    <th style="width:15%;">Posting Date</th>
                    <th style="width:15%;">Required Date</th>
                    <th style="width:10%;">Prepared By</th>
                    <th style="width:10%;">Item Group</th>
                    <th style="width:10%;">Memo No</th>
                    <th style="width:15%;">Procuerement Type</th>
                                     
                </tr>
                  </thead>
                  <tbody>
                  @foreach($result as $results)
                    <tr>
                      <td><input type="checkbox" name="approved_id[]" id="approved_id" value="{{ $results->id }}"></a>
                      </td>
                      <td>{{ $results->bname }}</td>
                      
                     <td><a href="{{ URL('/requisition-print/'.$results->id) }}" target="_blank" title="print">{{ $results->requisition_no }}</a>
                      </td>
                      <td>{{ $results->postingDate}}</td>
                      <td>{{ $results->requiredDate}}</td>
                      <td>{{ $results->created_by }}</td>
                      <td>{{ $results->item_group }}</td>
                      <td>{{ $results->memo_no}}</td>
                      <td>{{ $results->procuerementType}}</td>
                     
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



<script type="text/javascript">
  function DeleteBanner()
            {
                var checkItem=document.getElementsByName("approved_id[]");
                var j=0;
                var data= new Array();
                for(var i=0; i < checkItem.length; i++)
                {
                    if(checkItem[i].checked)
                    {
                       data[j]=checkItem[i].value;
                        j++;
                    }
                } 

                if(data=="")
                {
                    alert("Please select checkbox !");
                    return false;
                }
                else
                {

                    var val = window.confirm('Are you sure you want to approve these ?');

                    if(val==true)
                    {
                        $.ajax({
                            method: "GET",
                            url: '{{url("/confirm")}}',
                            data: {data: data}
                        })

                        .done(function (response)
                        {
                            window.location.reload();
                        });
                    }
                    else
                    {
                        return;
                    }
                }
            }
</script>
@endsection