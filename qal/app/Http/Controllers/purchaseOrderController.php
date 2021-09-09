<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use TNkemdilim\MoneyToWords\Converter;
use TNkemdilim\MoneyToWords\Languages as Language;

use DB;
use Auth;
use PDF;
use Session;

class purchaseOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function purchaseorder()
    {
        //dd('Ok');

        $result = DB::table('purchases')
        ->select('purchases.*','suppliers.company_name as supplier_name','users.name as created_by')
        
       
        ->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name')
        ->leftJoin('users','users.id','=','purchases.created_by')
        ->orderBy('purchases.id','DESC')->get();

       // dd($result);

       
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
                $order_no = "PO#".date('ym').str_pad($exiting->id+1, 4, "0", STR_PAD_LEFT);
            }
            else
            {
                $order_no = "PO#".date('ym').str_pad(1, 4, "0", STR_PAD_LEFT);;
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
            'status'          => $request->get('status',1),
            'created_by'      => Auth::user()->id,
            'created_at'      => date('Y-m-d H:i:s') // 24 hours

            ]);


            /////////////////// Multiple ///////////////////

            $totalAmount=0;
            $poItem=count($request->get('item_name1'));
            for($i=0;$i<$poItem;$i++)
            {
                if($request->get('item_name1')[$i] && $request->get('quantity1')[$i]>0  && $request->get('rate1')[$i]>0)
                {
                    $totalAmount +=$request->get('amount1')[$i];
                    DB::table('purchase_items')->insert([
                    'purchase_id'     => $po_last_id,
                    'item_id'         => $request->get('item_id1')[$i],
                    'quantity'        => $request->get('quantity1')[$i],
                    'rate'            => $request->get('rate1')[$i],
                    'amount'          => $request->get('amount1')[$i],
                    'branch'          => $request->get('branchid1')[$i],
                    'requisition_id'  => $request->get('requisition_id1')[$i]
                    ]);                        
                }
            }

            DB::table('purchases')->where('id',$po_last_id)
            ->update(
                [
                    'total_amount' => $totalAmount
                ]
            );
    
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
    //Requisition wise Branch
    public function requisition_wise_branch(Request $request)
    {
       // DD($request->get('id'));
        $branch    = DB::table('branchs')->get();
        $branchReq = DB::table('requisitions')->select('branch_id')
        ->where('id',$request->get('id'))
        ->first(); 
        //DD($branchReq);       
        $type     = 3;        
        return view('purchaseorder/requisitionWiseitemName', compact('branch','branchReq','type'));
    }

    //Purchase Order Print
    function purchaseOrderPrint($id) {

        $purchases  = DB::table('purchases')
        ->select('purchases.*','users.name as created_by','suppliers.company_name','suppliers.address','requisitions.requisition_no','requisitions.requiredDate','project_budgets.memo_no')

        ->leftjoin('users','users.id','=','purchases.created_by')
        ->leftjoin('suppliers','suppliers.id','=','purchases.supplier_name')
        ->leftjoin('requisitions','requisitions.id','=','purchases.requisition_no')

        ->leftjoin('project_budgets','project_budgets.id','=','requisitions.memo_no')

        ->where('purchases.id',$id)
        ->first(); 

        $poid= $id;      
        //dd($data);

        $converter = new Converter("Taka", "Poisha");
        // $converter = $converter->setLanguage(Language::BENGALI);
        // $frenchConverter = new Converter("yen", "sen", Language::FRENCH);
        $pdf = PDF::loadView('purchaseorder.purchaseOrderPrint', compact('purchases','poid','converter'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }


public function orderPendingList(){
        //dd('Ok');
  
        $result = DB::table('purchases')
        ->select('purchases.*','suppliers.company_name as supplier_name','users.name as created_by')
       
        ->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name')
        ->leftJoin('users','users.id','=','purchases.created_by')
        ->orderBy('purchases.id','DESC')
        ->where('purchases.status',1)
        ->get();

       // dd($result);
      
        return view('purchaseorder/orderpendinglist',compact('result'));

    }
    
 

   public function awaitingConfirmList(){
        //dd('Ok');
         $result = DB::table('purchases')
        ->select('purchases.*','suppliers.company_name as supplier_name','users.name as created_by')
        
        ->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name')
        ->leftJoin('users','users.id','=','purchases.created_by')
        ->orderBy('purchases.id','DESC')
       
       ->where('purchases.status',1)
      ->get();

      //dd($result);
       
        return view('purchaseorder.awaitingConfirmList',compact('result'));

    }

    public function confirm(Request $request){
    //dd($request);

       $val = $request->get('data');
       foreach($val as $reqid)
       {
          DB::table('purchases')
              ->where('id',$reqid)
              ->update(['status' => 2, 'Confirm_by' => Auth::user()->id]);
       }

       Session::flash('success', 'Data Confirm successfull');
       return 0;
    }

public function confirmList(){
        //dd('Ok');
         $result = DB::table('purchases')
        ->select('purchases.*','suppliers.company_name as supplier_name','users.name as created_by')
        
        ->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name')
        ->leftJoin('users','users.id','=','purchases.created_by')
        ->orderBy('purchases.id','DESC')
       
        ->where('purchases.status',2)
        ->get();

        //dd($result);

        return view('purchaseorder.confirmList',compact('result'));
    }
     public function awaitingorderConfirmList(){
        //dd('Ok');
         $result = DB::table('purchases')
        ->select('purchases.*','suppliers.company_name as supplier_name','users.name as created_by')
       
        ->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name')
        ->leftJoin('users','users.id','=','purchases.created_by')
        ->orderBy('purchases.id','DESC')
       
        ->where('purchases.status',2)
        ->get();

        //dd($result);
         
        return view('purchaseorder.awaitingorderConfirmList',compact('result'));

    }
      public function orderConfirm(Request $request){

       $val = $request->get('data');
       foreach($val as $reqid)
       {
          DB::table('purchases')
              ->where('id',$reqid)
              ->update(['status' => 3, 'OrderConfirm_by' => Auth::user()->id]);
       }

       Session::flash('success', 'Data Confirm successfull');
       return 0;
    }

    public function prochaseorderConfirmList(){
     //dd('Ok');
         $result = DB::table('purchases')
        ->select('purchases.*','suppliers.company_name as supplier_name','users.name as created_by')
        
        ->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name')
        ->leftJoin('users','users.id','=','purchases.created_by')
        ->orderBy('purchases.id','DESC')
       
        ->where('purchases.status',3)
        ->get();

       // dd($result);

     return view('purchaseorder/orderConfirmList',compact('result'));

   }
//purchase Delete

     public function delete($id){
        DB::table('purchase_items')->where('purchase_id',$id)->delete();
        DB::table('purchases')->where('id',$id)->delete();
        
          //return redirect()->route('purchase')->with('success','Data Delete successfull');
         return Redirect::to('purchase_order')->with('success','Data Delete successfull');
    }


   
    //Purchase Order Edit
  public function poedit($id)
    {
         //dd('Ok');
        $supplier = DB::table('suppliers')->where('status',0)->get();
        
        $branch = DB::table('branchs')->get();

        $requisition = DB::table('requisitions')->get();
        $purchase_general_item = DB::table('purchase_general_items')->where('status',0)->get();

       $purchases  = DB::table('purchases')
        ->select('purchases.*','users.name as created_by','suppliers.company_name as supplier_name ','suppliers.address','requisitions.requisition_no','requisitions.requiredDate','project_budgets.memo_no as budgetsMemo_no',)

        ->leftjoin('users','users.id','=','purchases.created_by')
        ->leftjoin('suppliers','suppliers.id','=','purchases.supplier_name')
        ->leftjoin('requisitions','requisitions.id','=','purchases.requisition_no')

        ->leftjoin('project_budgets','project_budgets.id','=','requisitions.memo_no')

        ->where('purchases.id',$id)
        ->first(); 

       //DD($purchases);

        $poid= $id;      

        $poitemsEdit = DB::table('purchase_items')
        ->select('purchase_items.*','purchase_general_items.item_name','purchase_item_units.unit','branchs.name')

        ->leftjoin('purchase_general_items','purchase_general_items.id','=','purchase_items.item_id')
 
        ->leftjoin('purchase_item_units','purchase_item_units.id','=','purchase_general_items.item_unit_id')
          ->leftjoin('branchs','branchs.id','=','purchase_items.branch')
        ->where('purchase_items.purchase_id',$id)->get();
       //dd($poitemsEdit);
        
  return view('purchaseorder/purchaseorderEdit', compact('purchases','poid','supplier','branch','requisition','purchase_general_item','poitemsEdit'));

        

  }
    //Requisition Update

   
    public function poupdate(Request $request)
    {
        // Requisitions Main data insert
        DB::table('purchases')->where('id',$request->get('id'))
         ->update([
        // 'order_no'        => $order_no,
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
        'updated_by'      => Auth::user()->id,
        'created_at'      => date('Y-m-d H:i:s') // 24 hours

        ]);


        /////////////////// Multiple ///////////////////
        $totalAmount=0;
        DB::table('purchase_items')->where('purchase_id',$request->get('id'))
        ->delete();

        $poItem=count($request->get('item_name1'));

        for($i=0;$i<$poItem;$i++)
        {
            if($request->get('item_name1')[$i] && $request->get('quantity1')[$i]>0  && $request->get('rate1')[$i]>0)
            {
                $totalAmount +=$request->get('amount1')[$i];
                DB::table('purchase_items')->insert([
                    'purchase_id'     => $request->get('id'),
                    'item_id'         => $request->get('item_id1')[$i],
                    'quantity'        => $request->get('quantity1')[$i],
                    'rate'            => $request->get('rate1')[$i],
                    'amount'          => $request->get('amount1')[$i],                 
                    'branch'          => $request->get('branchid1')[$i],
                    'requisition_id'  => $request->get('requisition_id1')[$i]
                ]);                        
            }
        }

        DB::table('purchases')->where('id',$request->get('id'))
        ->update(
            [
                'total_amount' => $totalAmount
            ]
        );

        return Redirect::to('purchase_order')->with('success','Data Updated successfull');
    }




}
