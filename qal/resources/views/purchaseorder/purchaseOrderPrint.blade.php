
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Purchase Order print copy</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <style type="text/css">

      @font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
  front-color: #000000;
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

/*a {
  color: #0087C3;
  text-decoration: none;
}*/

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #000000;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  text-align: center;
}

/*#logo {
  float: left;
  margin-top: 8px;
}*/

/*#logo img {
  height: 70px;
}*/

/*#company {
  text-align: center;
  
}*/


/*#details {
  margin-bottom: 50px;
}*/

/*#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}*/

#client .to {
  color: #ffffff;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

/*#invoice {
  float: right;
  text-align: right;
}*/

/*#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}*/

/*#invoice .date {
  font-size: 1.1em;
  color: #777777;
}*/

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
  border: 5px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
  font-size: 1.2em;
}

table td {
  text-align: left;
}

table td h3{
  color: #000000;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #000000;
  font-size: 1em;
 
}

/*table .desc {
  text-align: left;
}
*/
table .unit {
  background: #ffffff;
}

table .qty {
}



table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

/*table tbody tr:last-child td {
  border: none;
}*/

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

/*table tfoot tr:first-child td {
  border-top: none; 
}*/

/*table tfoot tr:last-child td {
  color: #57B223;
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}*/

/*table tfoot tr td:first-child {
  border: none;
}*/

/*#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}*/

/*#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}*/

/*#notices .notice {
  font-size: 1.2em;
}
*/
footer {
  color: #000000;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}


    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        
      </div>
      <div id="company">
        <h2 class="name">Purchase Order</h2>
        {{-- <div>Branch Name :{{ $requisitions->bname }} </div> --}}
      </div>
      </div>
    </header>
   <main>
 <div class='card' id="section-to-print">
 
      <div ]lass='row'>
        <div class='col-12 table-responsive'>
          <div class='card'>
            <div class='card-body' style='padding: 0px;'>

              <div class='table-responsive'>
                

                <table class='table' cellspacing="0">
                  <tr>
                    <td>
                      <table id='table' class='table-responsive' width='100%' cellspacing="0">
                        <tr>
                          <td style='width: 150px'>P.O Number</td>
                          <td style='width: 150px'>: {{ $purchases->order_no }}</td>
                        </tr>
                       
                        <tr>
                          <td>Supplier Name</td>
                          <td style=''>: {{ $purchases->company_name }} </td>
                        </tr>
                        <tr>
                          <td>Address</td>
                          <td style='width: 270px;'>:  {{ $purchases->address }}</td>
                        </tr>
                        <tr>
                          <td>Budget Name</td>
                          <td style=''>:{{ $purchases->memo_no }}  </td>
                        </tr>
                      </table>
                    </td>
                    <td style='width: 30px;'>&nbsp;</td>
                    <td>
                      <table id='table' class='table-responsive' width='100%' cellspacing="0">
                        <tr>
                          <td style='width: 150px'>Date</td>
                          <td style='width: 150px'>: {{ $purchases->postingDate }} </td>
                        </tr>
                        
                        <tr>
                          <td>Requisition No
                         </td>
                          <td style=''>:{{ $purchases->requisition_no }} </td>
                        </tr>
                       <tr>
                          <td style='width: 150px'>Required Date</td>
                          <td style='width: 150px'>:{{ $purchases->requiredDate }} </td>
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

                   @foreach($result as $results)

                  <tbody>
                    <tr class="card" style="text-align: center;">
                      <td class='text-center'>{{ $serialNo }}</td>
                      <td> {{ $results->name}}</td>
                      <td> {{ $results->item_name}}</td>
                      <td> {{ $results->quantity}}</td>
                      <td> {{ $results->rate}}</td>
                      <td> {{ $results->amount}}</td>
                    </tr>
                    
                  </tbody>

                  @php
                    $serialNo++;
                  @endphp

                  @endforeach
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
                  <table>

                  	<tr>
                  		<td>{{ $purchases->created_by }}
                  		  <hr>Prepared By <br>Signature Seal  
                  		</td>

                  		<td>
                  		  <hr> Checked By 
                  		</td>
                  		<td>
                  		  <hr> Authorized By
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
<footer>
  Printed From QAL                      Page 1 of 1
</footer>
  </body>

</html>