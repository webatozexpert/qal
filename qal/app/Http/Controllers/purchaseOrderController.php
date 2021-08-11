<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


use DB;
use Auth;

class purchaseOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function purchaseorder()
    {
        //dd('Ok');

        $result = DB::table('requisitions')
        ->select('requisitions.*','branchs.id as bid','branchs.name as bname','project_budgets.memo_no','purchase_item_groups.name as item_group','users.name as created_by')
        ->leftJoin('branchs','branchs.id','=','requisitions.branch_id')
        ->leftJoin('project_budgets','project_budgets.id','=','requisitions.memo_no')
        ->leftJoin('purchase_item_groups','purchase_item_groups.id','=','requisitions.item_group')
        ->leftJoin('users','users.id','=','requisitions.created_by')
        ->orderBy('requisitions.id','DESC')->get();

        //dd($result);

       
        return view('purchaseorder/purchaseorderMaster', compact('result'));
    }
    
    //Purpose Order Creact

   public function purchaseorder_create()
    {
        //dd('Ok');
        $supplier = DB::table('suppliers')->where('status',0)->get();
        
        $requisition = DB::table('requisitions')->get();
        $purchase_general_item = DB::table('purchase_general_items')->where('status',0)->get();

       //dd($requisition);
 
        return view('purchaseorder/purchaseorderNew', compact('supplier','requisition','purchase_general_item'));
    }

 public function purchase_order_submit(Request $request){
      
            dd($request->all());

            $exiting = DB::table('purchases')->orderBy('id','DESC')->first();
            if(!empty($exiting))
            {
                $order_no = "PR#".date('ym').str_pad($exiting->id+1, 4, "0", STR_PAD_LEFT);
            }
            else
            {
                $order_no = "PR#".date('ym').str_pad(1, 4, "0", STR_PAD_LEFT);;
            }
    
            // Requisitions Main data insert
                $pra_last_id = DB::table('purchases')->insertGetId([
                'order_no'        => $order_no,
                'Date'            => date('Y-m-d', strtotime($request->get('postingDate'))),

                'supplierName'    => $request->get('supplierName'),
                'procuerementType'=> $request->get('procuerementType'),
                'currency'        => $request->get('currency'),
                'requisition_no'  => $request->get('requisition_no'),
                'note'            => $request->get('note'),
                'deliveryto'      => $request->get('deliveryto'),
                'payment_perm'    => $request->get('payment_perm'),
                'sample'          => $request->get('sample'),
                'acceptance'      => $request->get('acceptance'),
                'delivery_within' => $request->get('delivery_within'),
                'support_warranty'=> $request->get('support_warranty'),
                'date_of_validity'=> $request->get('date_of_validity'),
                'special_instructions'=> $request->get('special_instructions'),
                'status'          => $request->get('status',0),
                'created_by'      => Auth::user()->id

                ]);


            /////////////////// Multiple ///////////////////

            $reqItem=count($request->get('required_quantity1'));

            for($i=0;$i<$reqItem;$i++)
            {
                if(($request->get('required_quantity1')[$i]!='' && $request->get('required_quantity1')[$i]>0))
                {
                    DB::table('requisition_items')->insert([
                        'requisition_id'    => $req_last_id,
                        'item_id'           => $request->get('item_name1')[$i],
                        'quantity'          => $request->get('required_quantity1')[$i]
                    ]);                        
                }
            }
    
        return Redirect::to('purchase_order')->with('success','Data Added successfull');
    }

   

    //Requisition wise intemname
    public function requisition_wise_intemname(Request $request)
    {
        $itemName = DB::table('requisition_items')->where('requisition_id',$request->get('id'))->get();
        $type     = 1;        

        return view('purchaseorder/requisitionWiseitemName', compact('itemName','type'));
    }
    //intemname wise Quantity
    public function intemname_wise_quantity(Request $request)
    {
        $quantity = DB::table('requisition_items')->where('id',$request->get('id'))->first();
        $type     = 2; 
       
       
       //dd($quantity);
        return $quantity->quantity;
    }
    
   // //Requisition wise intemname
   //  public function itemName()
   //  {
   //      $result = DB::table('requisition_items')->orderBy('id', 'DESC')->get();
   //      return $resulta;
   //  }

   //  //intemname wise quantity
   //  public function quantity()
   //  {
   //      $result = DB::table('requisition_items')->orderBy('id', 'DESC')->get();
   //      return $result;
   //  }

public function prochaseorderConfirmList(){
     //dd('Ok');



     return view('purchaseorder/orderConfirmList');

   }
}
