
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Purchase Order print copy</title>

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
 
  padding: 5px 0;
  margin-bottom: 10px;
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
      
      @if($purchases->status=='3')
      
        <div id="company">
        <h1 class="name" style="font-weight: bold; font-size: 20px;">Purchase Order</h1>
        
      </div>
      
      @else
        <div id="company">
        <h1 class="name" style="font-weight: bold; font-size: 20px; ">Purchase Order Preview</h1>
        
      </div>
      @endif
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
                          <td >P.O Number :</td>
                          <td > {{ $purchases->order_no }}</td>
                           
                        </tr>
                       
                        <tr>
                          <td>Supplier Name :</td>
                          <td >{{ $purchases->company_name }} </td>
                        </tr>
                        <tr>
                          <td>Address :</td>
                          <td > {{ $purchases->address }}</td>
                        </tr>
                        <tr>
                          <td>Requisition No :
                         </td>
                          <td >{{ $purchases->requisition_no }} </td>
                        </tr>
                        <tr>
                          <td>Budget Name :</td>
                          <td >{{ $purchases->memo_no }}  </td>
                        </tr>
                      </table>
                    </td>
                    <td >&nbsp;</td>
                    <td>
                      <table id='table' class='table-responsive' width='100%' cellspacing="0">
                       
                      <tr>
                          <td >Date :</td>
                          <td > {{ $purchases->postingDate }} </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>

            @php
            $serialNo=1;
            @endphp

           
          @php
             $result = DB::table('purchase_items')
              ->select('purchase_items.*','purchase_general_items.id','purchase_general_items.item_name','branchs.name')
             
              ->leftJoin('purchase_general_items','purchase_general_items.id','=','purchase_items.item_id')
              ->leftJoin('branchs','branchs.id','=','purchase_items.branch')
             
              ->where('purchase_items.purchase_id',$poid)
              ->orderBy('purchase_items.id','DESC')
              ->get();

          //dd($result);
            @endphp

                <table class='table table-bordered' cellspacing="0" cellpadding="0">
                  <thead >
                    <tr class="card-header">
                      <td class='text-center' style='vertical-align: middle;'>Sl#</td>
                      <td class='text-center' style='vertical-align: middle;'>Delivery Location</td>
                      <td class='text-center' style='vertical-align: middle;'>Item Name </td>
                      <td class='text-center' style='vertical-align: middle;'>Quantity</td>
                      <td class='text-center' style='vertical-align: middle;'>Rate BDT</td>
                       <td class='text-center' style='vertical-align: middle;'>Total Amount BDT</td>
                    </tr>
                  </thead>
                  @php $totalAmount =0; @endphp
                  @foreach($result as $results)
                  @php $totalAmount +=$results->amount; @endphp
                  <tbody>
                    <tr class="card" style="text-align: center;">
                      <td class='text-center'>{{ $serialNo }}</td>
                      <td> {{ $results->name}}</td>
                      <td> {{ $results->item_name}}</td>
                      <td style="text-align:center;"> {{ $results->quantity}}</td>
                      <td style="text-align:right;"> {{ $results->rate}}</td>
                      <td style="text-align:right;"> {{ number_format($results->amount)}}</td>
                    </tr>                    
                  </tbody>

                  @php
                    $serialNo++;
                  @endphp

                  @endforeach

                  <tr>
                    
                    <td colspan="5" style="font-weight: bold;">Total   </td>
                    <td style="text-align:right; font-weight: bold;"> {{ number_format($totalAmount) }} </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="6"><b> In Word : </b>{{ ucwords($converter->convert($totalAmount)) }}</td>
                  </tr>
                </table>
               <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                 <table class='table' style='border-bottom: 0px;'>
                  <thead>
                    <tr>
                      <td style="text-align: left;">Note :{{ $purchases->note }} </td>
                     
                  </thead>
                </table>
                <p>&nbsp;</p>
                 <table class='table' style='border-bottom: 0px;'>
                  <thead>
                    <tr>
                      <td style="text-align: left;">Delivery Within : {{ $purchases->delivery_within }}   Days</td>
                     </tr>
                     <tr>
                       <td style="text-align: left;">Terms of Payment:  {{ $purchases->payment_term }} </td>
                    
                     </tr>
                     <tr>
                        <td style="text-align: left;">Special Instructions : {{ $purchases->special_instructions }} </td>
                     </tr>
                  </thead>
                </table>
                 <p>&nbsp;</p> <p>&nbsp;</p>


                 @php 
                      $data = DB::table('purchases')
                      ->where('id',$poid)
                      ->first(); 

                      //dd($data);

                    
                      $Aname1 = '';
                      $Aname2 = '';
                       if($data->status=='2')
                      {
                        $auth = DB::table('purchases')
                          ->select('purchases.*','users.name as username')
                          ->leftjoin('users','users.id','=','purchases.Confirm_by')
                          ->where('purchases.id',$poid)
                          ->first(); 

                          $Aname1 = $auth->username;
                      }
                      else if($data->status=='3')
                      {
                        $auth = DB::table('purchases')
                          ->select('purchases.*','users.name as username')
                          ->leftjoin('users','users.id','=','purchases.Confirm_by')
                          ->where('purchases.id',$poid)
                          ->first(); 

                          $Aname1 = $auth->username;

                        $auth = DB::table('purchases')
                          ->select('purchases.*','users.name as username')
                          ->leftjoin('users','users.id','=','purchases.OrderConfirm_by')
                          ->where('purchases.id',$poid)
                          ->first(); 

                          $Aname2 = $auth->username;
                      }
                     //dd($Aname);
                      @endphp
 
                  <table>

                  	<tr>
                  		<td >
                        <p style="font-size:14px;">{{ $purchases->created_by }}</p>
                  		  <hr>Prepared By <br>Signature Seal  
                  		</td>

                  		<td>
                        <p style="font-size:14px;">{{ $Aname1 }}</p>
                        
                  		  <hr> Checked By <br>&nbsp;
                  		</td>
                  		<td >
                        <p style="font-size:14px;">{{ $Aname2 }}</p>
                        
                  		  <hr> Authorized By <br>&nbsp;
                  		</td>
                  	</tr>

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