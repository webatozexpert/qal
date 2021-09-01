
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Requisition print copy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <style type="text/css">

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #000000;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px !important;
  font-family: Arial !important;
  font-weight: bold;
}

header {
 
  padding: 10px 0;
  margin-bottom: 20px;
  text-align: center;
}

#client .to {
  color: #ffffff;
}

h2.name {
  font-size: 18px;
  font-weight: normal;
  margin: 0;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 10px;
  text-align: center;

}

table th {
  white-space: nowrap;        
  font-weight: normal;
  font-size: 12px !important;
}

table td {
  text-align: left;
}

table td h3{
  color: #000000;
  font-size: 12px;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #000000;
  font-size: 12px;
 
}


table .unit {
  background: #ffffff;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 12px;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 12px;
  white-space: nowrap; 
  
}

</style>
  </head>
  <body>
    <header class="clearfix">
        <div id="company">
        <h1 class="name" style="font-weight: bold; font-size: 20px;">Purchase Requisition</h1>
        <div>Branch Name :{{ $requisitions->bname }} </div>
      </div>  
    </header>
   <main>
 <div class='' id="section-to-print">
 
      <div class='row'>
        <div class='col-12 table-responsive'>
          <div class=''>
            <div class='card-body' style='padding: 0px;'>

              <div class='table-responsive'>
                

                <table class='table' cellspacing="0">
                  <tr>
                    <td>
                      <table id='table' class='table-responsive' width='100%' cellspacing="0">
                        <tr>
                          <td >Requisition No</td>
                          <td >: {{ $requisitions->requisition_no }}</td>
                        </tr>
                       
                        <tr>
                          <td>Branch Name</td>
                          <td style=''>: {{ $requisitions->bname }} </td>
                        </tr>
                        <tr>
                          <td>Item Group</td>
                          <td>: {{ $requisitions->item_group }} </td>
                        </tr>
                        <tr>
                          <td>Budget Name</td>
                          <td style=''>: {{ $requisitions->memo_no }} </td>
                        </tr>
                      </table>
                    </td>
                    <td >&nbsp;</td>
                    <td>
                      <table id='table' class='table-responsive' width='100%' cellspacing="0">
                        <tr>
                          <td >Date</td>
                          <td >: {{ $requisitions->postingDate }} </td>
                        </tr>
                        <tr>
                          <td >Required Date</td>
                          <td >: {{ $requisitions->requiredDate }} </td>
                        </tr>
                        <tr>
                          <td>Priority</td>
                          <td style=''>: {{ $requisitions->priority }}</td>
                        </tr>
                        <tr>
                          <td >Procurement Type</td>
                          <td >: {{ $requisitions->procuerementType }} </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>

                  @php
                  $serialNo=1;
                  @endphp

             @php
             $result = DB::table('requisition_items')
              ->select('requisition_items.*','purchase_general_items.id','purchase_general_items.item_name as iname','purchase_general_items.id','purchase_general_items.item_unit_id','purchase_item_units.unit','purchase_general_items.id','purchase_general_items.item_code')
             
              ->leftJoin('purchase_general_items','purchase_general_items.id','=','requisition_items.item_id')
             
              ->leftJoin('purchase_item_units','purchase_general_items.item_unit_id','=','purchase_item_units.id')
              ->where('requisition_items.requisition_id',$rid)
              ->orderBy('requisition_items.id','DESC')->get();
            @endphp
                <table class='table table-bordered' cellspacing="0" cellpadding="0">
                  <thead >
                    <tr class="card-header">
                      <td class='text-center' style='vertical-align: middle;'>Sl#</td>
                      <td class='text-center' style='vertical-align: middle;'>Product Name </td>
                      <td class='text-center' style="text-align:right;">Units</td>
                      <td class='text-center' style="text-align:right;">Quality</td>
                      
                    </tr>
                  </thead>
                 @php $totalQuantity =0; @endphp
                  @foreach($result as $results)
                 @php $totalQuantity +=$results->quantity; @endphp
                  <tbody>
                    <tr class="card" style="text-align: center;">
                      <td class='text-center'>{{ $serialNo }}</td>
                      <td > {{ $results->iname}} - {{ $results->item_code }}</td>
                      <td style="text-align:right;"> {{ $results->unit}}</td>
                        <td style="text-align:right;"> {{ $results->quantity}}</td>
                    </tr>
                    
                  </tbody>

                  @php
                    $serialNo++;
                  @endphp

                  @endforeach
                  <tr>
                   
                    <td colspan="3" style="font-weight: bold;">Grand Total   </td>
                    <td style="text-align:right; font-weight: bold;"> {{ number_format($totalQuantity) }} </td>
                  </tr>

                </table>
                <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                 <table class='table' style='border-bottom: 0px;'>
                  <thead>
                    <tr>
                      <td style="text-align: left;">Note :{{ $requisitions->description }}</td>
                     
                    
                  </thead>
                </table>
                <p>&nbsp;</p>
                
                <table class='table' style='border-bottom: 0px;'>
                  <thead>
                    <tr>
                      <td width='50%'><b>Requisition By </b></td>
                     
                      <td width='50%'><b> Purchase Authorized By  </b></td>
                    </tr>
                    <tr>
                      <td>Signature </td>
                      <td>Signature </td>
                      
                    </tr>
                    <tr>
                      <td>Name :{{ $requisitions->created_by }}</td>
                      <hr>
                      @php 
                      $data = DB::table('requisitions')
                      ->where('id',$rid)
                      ->first(); 

                      //dd($data);

                      $Aname = '';
                      if($data->status=='1')
                      {
                          $auth = DB::table('requisitions')
                          ->select('requisitions.*','users.name as username')
                          ->leftjoin('users','users.id','=','requisitions.approved_by')
                          ->where('requisitions.id',$rid)
                          ->first(); 

                          $Aname = $auth->username;
                      }
                      else if($data->status=='2')
                      {
                        $auth = DB::table('requisitions')
                          ->select('requisitions.*','users.name as username')
                          ->leftjoin('users','users.id','=','requisitions.Confirm_by')
                          ->where('requisitions.id',$rid)
                          ->first(); 

                          $Aname = $auth->username;
                      }
                      else if($data->status=='3')
                      {
                        $auth = DB::table('requisitions')
                          ->select('requisitions.*','users.name as username')
                          ->leftjoin('users','users.id','=','requisitions.OrderConfirm_by')
                          ->where('requisitions.id',$rid)
                          ->first(); 

                          $Aname = $auth->username;
                      }
                     //dd($Aname);
                      @endphp
 
                     <td>
                      @if($data->status=='0')
                          Name :  
                      @elseif($data->status=='1')
                          Name : {{ $Aname }} <hr>
                         <br/> <br/>
                         <span >Incharge</span>
                       @elseif($data->status=='2')
                          Name : {{ $Aname }}<hr>
                          <br/><br/>
                          <span style="font-size:10px;">Incharge -> General Manager </span>
                       @elseif($data->status=='3')
                          Name : {{ $Aname }}<hr> 
                         <br/><br/>
                         <span style="font-size:10px;">Incharge -> General Manager -> Managing Director</span>
                       @endif  
                    </td>

                  </tr>
                </thead>
              </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>
   
  </body>

</html>