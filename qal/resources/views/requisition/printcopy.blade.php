

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Purchase Requisition </title>
  <link type="text/css" href="{{asset('public/backend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <table width="100%" class="text-center">
        <tbody>
          <tr>
           
            <td style=" text-align: center;">
              <span style="font-size: 20px; color: green; font-weight: bold; ">Purchase Requisition
             <br></span>
                <span>Branch Name :{{ $results->branch_id}} </span>
               
            </td>

          </tr>
        </tbody><br/>
         
       </table>
      
      </div>
       <div class="col-md-12">
        
       <table width="100%" class="text-center">
        <tbody >
          <tr>
           <td><span>Requisition No :{{ $results->requisition_no}}</span></td> <td><span>Date : {{ $results->postingDate}}</span></td><br/>

          </tr>
          <tr>
           <td><span>Branch Name :{{ $results->branch_id}}</span></td> <td><span>Required Date :{{ $results->requiredDate}}</span></td><br/>

          </tr>
          <tr>
           <td><span>Item Group :{{ $results->item_group}}</span></td> <td><span>Priority:{{ $results->priority}}</span></td><br/>

          </tr>
          <tr>
           <td><span>Budget Name :{{ $results->memo_no}}</span></td> <td><span>Procurement Type:{{ $results->procuerementType}}</span></td><br/>

          </tr>
        </tbody>
         
       </table>
     
      </div>
      
    </div>
    <br/>

    <div class="row">
      <div class="col-md-12">
       <div class="card-body">
           <table border="1" width="100%" >
                                    <thead>
                                        <tr> 
                                            <th >Sl-No</th>
                                            <th >Prod-Name</th>
                                                <th >Unit</th>
                                            <th style="width:10%;">Qty</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                     $result = DB::table('requisition_items')
                                      ->select('requisition_items.*','purchase_general_items.id','purchase_general_items.item_name as iname','purchase_general_items.id','purchase_general_items.item_unit_id','purchase_item_units.unit')
                                     
                                      ->leftJoin('purchase_general_items','purchase_general_items.id','=','requisition_items.item_id')
                                     
                                      ->leftJoin('purchase_item_units','purchase_general_items.item_unit_id','=','purchase_item_units.id')
                                      ->where('requisition_items.requisition_id',$results->id)
                                      ->orderBy('requisition_items.id','DESC')->get();
                                    @endphp

                                    @foreach($result as $results)
                                    <tr>
                                    
                                      <td>{{ $results->id}}
                                      </td>
                                      <td>{{ $results->iname}}</td>
                                      <td>{{ $results->unit}}</td>
                                      <td>{{ $results->quantity}}</td>
                                        
                                    </tr>
                                    @endforeach
                                  </tbody>
                                    </table>
                                   
                                </div>                           
      </div>
    </div>
    <br><br><br><br><br><br>
   <div>Note: Descrition </div>
    <br>
     <div class="col-md-12">
       <table width="100%" class="text-center">
        <tbody >
          <tr>
           <td><span>Requisition By:</span></td> <td><span>Purchase Authorized By</span></td><br/>

          </tr>
          <tr>
           <td><span>Signature:</span></td> <td><span>Signature</span></td><br/>

          </tr>
         
          <tr>
           <td><span>Name  :   </span></td> <td><span>Name :   </span></td><br/>

          </tr>
        </tbody>
         
       </table>
     
      </div>

  <br><br><br><br><br><br><br><br><br>

</div>

   
</body>
</html>