
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Requisition print copy</title>
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
        <h2 class="name">Purchase Requisition</h2>
        <div>Branch Name :{{ $requisitions->bname }} </div>
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
                          <td style='width: 150px'>Requisition No</td>
                          <td style='width: 150px'>: {{ $requisitions->requisition_no }}</td>
                        </tr>
                       
                        <tr>
                          <td>Branch Name</td>
                          <td style=''>: {{ $requisitions->bname }} </td>
                        </tr>
                        <tr>
                          <td>Item Group</td>
                          <td style='width: 270px'>: {{ $requisitions->item_group }} </td>
                        </tr>
                        <tr>
                          <td>Budget Name</td>
                          <td style=''>: {{ $requisitions->memo_no }} </td>
                        </tr>
                      </table>
                    </td>
                    <td style='width: 30px;'>&nbsp;</td>
                    <td>
                      <table id='table' class='table-responsive' width='100%' cellspacing="0">
                        <tr>
                          <td style='width: 150px'>Date</td>
                          <td style='width: 150px'>: {{ $requisitions->postingDate }} </td>
                        </tr>
                        <tr>
                          <td style='width: 150px'>Required Date</td>
                          <td style='width: 150px'>: {{ $requisitions->requiredDate }} </td>
                        </tr>
                        <tr>
                          <td>Priority</td>
                          <td style=''>: {{ $requisitions->priority }}</td>
                        </tr>
                        <tr>
                          <td style='width: 150px'>Procurement Type</td>
                          <td style='width: 50px'>: {{ $requisitions->procuerementType }} </td>
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
              ->select('requisition_items.*','purchase_general_items.id','purchase_general_items.item_name as iname','purchase_general_items.id','purchase_general_items.item_unit_id','purchase_item_units.unit')
             
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
                      <td class='text-center' style='vertical-align: middle;'>Units</td>
                      <td class='text-center' style='vertical-align: middle;'>Quality</td>
                      
                    </tr>
                  </thead>

                  @foreach($result as $results)

                  <tbody>
                    <tr class="card" style="text-align: center;">
                      <td class='text-center'>{{ $serialNo }}</td>
                      <td> {{ $results->iname}}</td>
                      <td> {{ $results->unit}}</td>
                        <td> {{ $results->quantity}}</td>
                    </tr>
                    
                  </tbody>

                  @php
                    $serialNo++;
                  @endphp

                  @endforeach

                </table>
                <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                 <table class='table' style='border-bottom: 0px;'>
                  <thead>
                    <tr>
                      <td style="text-align: left;">Note :{{ $requisitions->description }}</td>
                     
                    
                  </thead>
                </table>
                <p>&nbsp;</p>
                @php 
                $data = DB::table('requisitions')
                ->select('requisitions.*','users.name as OrderConfirm_by')
                ->leftjoin('users','users.id','=','requisitions.OrderConfirm_by')
                ->where('requisitions.id',$rid)
                ->first(); 
               //dd($data);
                @endphp
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
                      <td>Name : @if($data!=Null){{ $data->OrderConfirm_by }} @endif 
                       
                        <p>
                        @if($data->status=='1')
                       <span >Incharge</span>
                       @elseif($data->status=='2')
                       <span Incharge -> General Manager>Incharge -> General Manager</span>
                       @elseif($data->status=='3')
                       <span style="font-size:10px;">Incharge -> General Manager -> Managing Director</span>

                       @endif
                      </p>

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
    <footer>
      Printed From QAL 07-08-2021                                 Page 1 of 1
    </footer>
  </body>

</html>