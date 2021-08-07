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
    
    //Requisition Creact

   public function purchaseorder_create()
    {
        //dd('Ok');
        $supplier = DB::table('suppliers')->where('status',0)->get();
        
        $requisition = DB::table('requisitions')->get();
        $purchase_general_item = DB::table('purchase_general_items')->where('status',0)->get();

       //dd($requisition);
 
        return view('purchaseorder/purchaseorderNew', compact('supplier','requisition','purchase_general_item'));
    }


   

    //Requisition wise intemname
    public function requisition_wise_intemname(Request $request)
    {
        $itemName = DB::table('requisition_items')->where('requisition_id',$request->get('id'))->get();
        $type     = 1;        

        return view('purchaseorder/requisitionWiseitemName', compact('itemName','type'));
    }
    //intemname wise unit
    public function intemname_wise_quantity(Request $request)
    {
        $quantity = DB::table('requisition_items')->where('id',$request->get('id'))->first();
        $type     = 2; 
        $unit = DB::table('requisition_items')->where('id',$unitId->item_unit_id)->first();
        return $unit->unit;
    }
    
   // //Requisition wise intemname
   //  public function itemName()
   //  {
   //      $result = DB::table('requisition_items')->orderBy('id', 'DESC')->get();
   //      return $resulta;
   //  }

    // //intemname wise unit
    // public function quantity()
    // {
    //     $result = DB::table('requisition_items')->orderBy('id', 'DESC')->get();
    //     return $result;
    // }


}
