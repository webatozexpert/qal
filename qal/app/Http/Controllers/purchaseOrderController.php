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
        
        $branch = DB::table('branchs')->get();

        $requisition = DB::table('requisitions')->get();
        $purchase_general_item = DB::table('purchase_general_items')->where('status',0)->get();

       //dd($requisition);
 
        return view('purchaseorder/purchaseorderNew', compact('supplier','branch','requisition','purchase_general_item'));
    }

 public function purchase_order_submit(Request $request){
      
            //dd($request->all());

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
            $po_last_id = DB::table('purchases')->insertGetId([
            'order_no'        => $order_no,
            'postingDate'     => date('Y-m-d', strtotime($request->get('postingDate'))),

            'supplier_name'    => $request->get('supplier_name'),
            'procuerement_type'=> $request->get('procuerement_type'),
            'currency'        => $request->get('currency'),
            'requisition_no'  => $request->get('requisition_no'),
            'note'            => $request->get('note'),
            'delivery_to'      => $request->get('delivery_to'),
            'payment_term'    => $request->get('payment_term'),
            'sample'          => $request->get('sample'),
            'acceptance'      => $request->get('acceptance'),
            'delivery_within' => $request->get('delivery_within'),
            'support_and_warranty'=> $request->get('support_and_warranty'),
            'date_fo_validity'=> date('Y-m-d', strtotime($request->get('date_fo_validity'))),
            'special_instructions'=> $request->get('special_instructions'),
            'status'          => $request->get('status',0),
            'created_by'      => Auth::user()->id,
            'created_at'      => date('Y-m-d H:i:s') // 24 hours

            ]);


            /////////////////// Multiple ///////////////////

            $poItem=count($request->get('item_name1'));

            for($i=0;$i<$poItem;$i++)
            {
                if($request->get('item_name1')[$i] && $request->get('quantity1')[$i]>0  && $request->get('rate1')[$i]>0)
                {
                    DB::table('purchase_items')->insert([
                    'purchase_id'     => $po_last_id,
                    'item_id'         => $request->get('item_id1')[$i],
                    'quantity'        => $request->get('quantity1')[$i],
                    'rate'            => $request->get('rate1')[$i],
                    'amount'          => $request->get('amount1')[$i],
                    'branch'          => $request->get('branch1')[$i]
                    ]);                        
                }
            }
    
        return Redirect::to('purchase_order')->with('success','Data Added Successfull');
    }

   

    //Requisition wise intemname
    public function requisition_wise_intemname(Request $request)
    {
        $itemName = DB::table('requisition_items')
        ->select('requisition_items.*','purchase_general_items.item_name','purchase_general_items.item_code')
        ->leftJoin('purchase_general_items','purchase_general_items.id','=','requisition_items.item_id')
        ->where('requisition_items.requisition_id',$request->get('id'))->get();
        $type     = 1;        

        return view('purchaseorder/requisitionWiseitemName', compact('itemName','type'));
    }

    //intemname wise Quantity
    public function intemname_wise_quantity(Request $request)
    {
        $id = explode('_',$request->get('id'));
        //$productId = DB::table('purchase_general_items')->where('item_id',$id[1])->first();
        $quantity = DB::table('requisition_items')->where('id',$id[1])->first();

        return $quantity->quantity;
    }
    
   // //Requisition wise intemname
   //  public function itemName()
   //  {
   //      $result = DB::table('requisition_items')->orderBy('id', 'DESC')->get();
   //      return $result;
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
