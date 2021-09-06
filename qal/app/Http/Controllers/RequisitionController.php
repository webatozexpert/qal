<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Requisition;
use DB;
use Auth;
use PDF;
use Session;

class RequisitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function requisition()
    {
       
     $result = DB::table('requisitions')
    ->select('requisitions.*','branchs.id as bid','branchs.name as bname','project_budgets.memo_no','purchase_item_groups.name as item_group','users.name as created_by')
     ->leftJoin('branchs','branchs.id','=','requisitions.branch_id')
    ->leftJoin('project_budgets','project_budgets.id','=','requisitions.memo_no')
     ->leftJoin('purchase_item_groups','purchase_item_groups.id','=','requisitions.item_group')
     ->leftJoin('users','users.id','=','requisitions.created_by')
     ->orderBy('requisitions.id','DESC')->get();

        //dd($result);

    return view('requisition/requisitionMaster', compact('result'));
    }
   
 
//Requisition Print
function requisitionPrint($id) {  
        $requisitions  = DB::table('requisitions')
        ->select('requisitions.*','branchs.id','branchs.name as bname','project_budgets.memo_no','purchase_item_groups.name as item_group','users.name as created_by')

        ->leftjoin('branchs','branchs.id','=','requisitions.branch_id')
        ->leftjoin('project_budgets','project_budgets.id','=','requisitions.memo_no')
        ->leftjoin('purchase_item_groups','purchase_item_groups.id','=','requisitions.item_group')
        ->leftjoin('users','users.id','=','requisitions.created_by')
        ->where('requisitions.id',$id)
        ->first(); 

       $rid= $id; 

     //dd($data);
  
    $pdf = PDF::loadView('requisition.requisitionPrint', compact('requisitions','rid'));
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');
}

//Requisition View
    
 // public function view($id){
 //    // dd('Ok');
 //       $view = DB::table('requisitions')->where('id',$id)->first();
      
 //         $result = DB::table('requisitions')
 //        ->select('requisitions.*','branchs.id','branchs.name as bname','project_budgets.memo_no','purchase_item_groups.name as item_group','users.name as created_by')
 //        ->join('branchs','branchs.id','=','requisitions.branch_id')
 //        ->leftjoin('project_budgets','project_budgets.id','=','requisitions.memo_no')
 //        ->join('purchase_item_groups','purchase_item_groups.id','=','requisitions.item_group')
 //        ->join('users','users.id','=','requisitions.created_by')
 //        ->orderBy('requisitions.id','DESC')->get();

 //       //dd($result);

 //        return view('requisition/requisitionView', compact('result','view'));
 //    }

    
//Requisition Creact

    public function creact_requisition()
    {
        $branch = DB::table('branchs')->where('status',0)->get();
        
        $project_budget = DB::table('project_budgets')->where('status',0)->get();

        $item_group = DB::table('purchase_item_groups')->where('status',0)->get();
        
        $purchase_general_item = DB::table('purchase_general_items')->where('status',0)->get();

       
        return view('requisition/requisitionNew', compact('branch','project_budget','item_group','purchase_general_item'));
    }

    public function requisition_submit(Request $request){
      
            //dd($request->all());

            $exiting = DB::table('requisitions')->orderBy('id','DESC')->first();
            if(!empty($exiting))
            {
                $requisition_no = "PR#".date('ym').str_pad($exiting->id+1, 4, "0", STR_PAD_LEFT);
            }
            else
            {
                $requisition_no = "PR#".date('ym').str_pad(1, 4, "0", STR_PAD_LEFT);;
            }
    
            // Requisitions Main data insert
            $req_last_id = DB::table('requisitions')->insertGetId([
                'requisition_no'    => $requisition_no,
                'postingDate'       => date('Y-m-d', strtotime($request->get('postingDate'))),
                'requiredDate'      => date('Y-m-d', strtotime($request->get('requiredDate'))),
                'branch_id'         => $request->get('branch_id'),
                'memo_no'           => $request->get('memo_no'),
                'description'       => $request->get('description'),
                'item_group'        => $request->get('item_group'),
                'priority'          => $request->get('priority'),
                'procuerementType'  => $request->get('procuerementType'),
                'status'            => $request->get('status',0),
                'created_by'        => Auth::user()->id
                
            ]);


            /////////////////// Multiple ///////////////////

            $reqItem=count($request->get('required_quantity1'));

            for($i=0;$i<$reqItem;$i++)
            {
                if(($request->get('required_quantity1')[$i]!='' && $request->get('required_quantity1')[$i]>0))
                {
                    DB::table('requisition_items')->insert([
                        'requisition_id'    => $req_last_id,
                        'item_id'           => $request->get('item_id1')[$i],
                        'quantity'          => $request->get('required_quantity1')[$i]
                    ]);                        
                }
            }
    
        return Redirect::to('requisition')->with('success','Data Added successfull');
    }

//Requisition Edit
  public function edit($id)
    {
        $branch = DB::table('branchs')->where('status',0)->get();        
        $project_budget = DB::table('project_budgets')->where('status',0)->get();
        $item_group = DB::table('purchase_item_groups')->where('status',0)->get();        
        $purchase_general_item = DB::table('purchase_general_items')->where('status',0)->get();


        $result  = DB::table('requisitions')
        ->select('requisitions.*','branchs.id','branchs.name as bname','project_budgets.memo_no as budgetsMemo_no','purchase_item_groups.name','users.name as created_by')

        ->leftjoin('branchs','branchs.id','=','requisitions.branch_id')
        ->leftjoin('project_budgets','project_budgets.id','=','requisitions.memo_no')
        ->leftjoin('purchase_item_groups','purchase_item_groups.id','=','requisitions.item_group')
        ->leftjoin('users','users.id','=','requisitions.created_by')
        ->where('requisitions.id',$id)
        ->first();

    //DD($result);
        
        $rid= $id;

        $itemsEdit = DB::table('requisition_items')
        ->select('requisition_items.*','purchase_general_items.item_name','purchase_item_units.unit')

        ->leftjoin('purchase_general_items','purchase_general_items.id','=','requisition_items.item_id')

        ->leftjoin('purchase_item_units','purchase_item_units.id','=','purchase_general_items.item_unit_id')

        ->where('requisition_items.requisition_id',$id)->get();

        return view('requisition/requisitionEdit', compact('result','rid','branch','project_budget','item_group','purchase_general_item','itemsEdit'));

  }


    //Requisition Update

   
    public function update(Request $request)
    {
         
        // Requisitions Main data update
        $req_last_id = DB::table('requisitions')->where('id',$request->get('id'))
        ->update([
            //'requisition_no'    => $requisition_no,
            'postingDate'       => date('Y-m-d', strtotime($request->get('postingDate'))),
            'requiredDate'      => date('Y-m-d', strtotime($request->get('requiredDate'))),
            'branch_id'         => $request->get('branch_id'),
            'memo_no'           => $request->get('memo_no'),
            'description'       => $request->get('description'),
            'item_group'        => $request->get('item_group'),
            'priority'          => $request->get('priority'),
            'procuerementType'  => $request->get('procuerementType'),
            //'status'            => $request->get('status',0),
            'updated_by'        => Auth::user()->id
            
        ]);


        /////////////////// Multiple ///////////////////

        DB::table('requisition_items')->where('requisition_id',$request->get('id'))
        ->delete();

        $reqItem=count($request->get('required_quantity1'));

        for($i=0;$i<$reqItem;$i++)
        {
            if(($request->get('required_quantity1')[$i]!='' && $request->get('required_quantity1')[$i]>0))
            {
                DB::table('requisition_items')->insert([
                    'requisition_id'    => $request->get('id'),
                    'item_id'           => $request->get('item_id1')[$i],
                    'quantity'          => $request->get('required_quantity1')[$i]
                ]);                        
            }
        }
    
        return Redirect::to('requisition')->with('success','Data Updated successfull');
    }

//All Requisition List
 public function requiPendingList(){
        //dd('Ok');
     $result = DB::table('requisitions')
        ->select('requisitions.*','branchs.id as bid','branchs.name as bname','project_budgets.memo_no','purchase_item_groups.name as item_group','users.name as created_by')
        ->leftJoin('branchs','branchs.id','=','requisitions.branch_id')
        ->leftJoin('project_budgets','project_budgets.id','=','requisitions.memo_no')
        ->leftJoin('purchase_item_groups','purchase_item_groups.id','=','requisitions.item_group')
        ->leftJoin('users','users.id','=','requisitions.created_by')
        ->orderBy('requisitions.id','DESC')
        ->where('requisitions.status',0)
        ->get();

       // dd($result);
       
        return view('requisition/requisitionpendinglist',compact('result'));

    }
//All Requisition Approved
   public function approved1(Request $request){

       $val = $request->get('data');
       foreach($val as $reqid)
       {
          DB::table('requisitions')
              ->where('id',$reqid)
              ->update(['status' => 1, 'approved_by' => Auth::user()->id]);
       }

       Session::flash('success', 'Data Approved successfull');
       return 0;
    }

//All Requisition Approved List
    public function approvedList(){
        //dd('Ok');
         $result = DB::table('requisitions')
        ->select('requisitions.*','branchs.id as bid','branchs.name as bname','project_budgets.memo_no','purchase_item_groups.name as item_group','users.name as created_by')
        ->leftJoin('branchs','branchs.id','=','requisitions.branch_id')
        ->leftJoin('project_budgets','project_budgets.id','=','requisitions.memo_no')
        ->leftJoin('purchase_item_groups','purchase_item_groups.id','=','requisitions.item_group')
        ->leftJoin('users','users.id','=','requisitions.created_by')
        ->orderBy('requisitions.id','DESC')
       ->where('requisitions.status',1)
      ->get();

      // dd($result);
         
        return view('requisition.requisitionapprovedlist',compact('result'));

    }
//All Requisition Approved list
    public function awaitingConfirmList(){
        //dd('Ok');
         $result = DB::table('requisitions')
        ->select('requisitions.*','branchs.id as bid','branchs.name as bname','project_budgets.memo_no','purchase_item_groups.name as item_group','users.name as created_by')
        ->leftJoin('branchs','branchs.id','=','requisitions.branch_id')
        ->leftJoin('project_budgets','project_budgets.id','=','requisitions.memo_no')
        ->leftJoin('purchase_item_groups','purchase_item_groups.id','=','requisitions.item_group')
        ->leftJoin('users','users.id','=','requisitions.created_by')
        ->orderBy('requisitions.id','DESC')
       ->where('requisitions.status',1)
      ->get();

       //dd($result);
         
        return view('requisition/awaitingConfirmList',compact('result'));

    }
//All Requisition Confirm 
public function confirm(Request $request){

       $val = $request->get('data');

       //dd($request->all());
       foreach($val as $reqid)
       {
          DB::table('requisitions')
              ->where('id',$reqid)
              ->update(['status' => 2, 'Confirm_by' => Auth::user()->id]);
       }

       Session::flash('success', 'Data Approved successfull');
       return 0;
    }

//All Requisition Confirm List
    
 public function confirmList(){
        //dd('Ok');
         $result = DB::table('requisitions')
        ->select('requisitions.*','branchs.id as bid','branchs.name as bname','project_budgets.memo_no','purchase_item_groups.name as item_group','users.name as created_by')
        ->leftJoin('branchs','branchs.id','=','requisitions.branch_id')
        ->leftJoin('project_budgets','project_budgets.id','=','requisitions.memo_no')
        ->leftJoin('purchase_item_groups','purchase_item_groups.id','=','requisitions.item_group')
        ->leftJoin('users','users.id','=','requisitions.created_by')
        ->orderBy('requisitions.id','DESC')
        ->where('requisitions.status',2)
        ->get();

        //dd($result);
       
        return view('requisition.confirmList',compact('result'));

    }
//All Requisition Confirm List
 public function awaitingorderConfirmList(){
        //dd('Ok');
         $result = DB::table('requisitions')
        ->select('requisitions.*','branchs.id as bid','branchs.name as bname','project_budgets.memo_no','purchase_item_groups.name as item_group','users.name as created_by')
        ->leftJoin('branchs','branchs.id','=','requisitions.branch_id')
        ->leftJoin('project_budgets','project_budgets.id','=','requisitions.memo_no')
        ->leftJoin('purchase_item_groups','purchase_item_groups.id','=','requisitions.item_group')
        ->leftJoin('users','users.id','=','requisitions.created_by')
        ->orderBy('requisitions.id','DESC')
       ->where('requisitions.status',2)
      ->get();

       //dd($result);
         
       
        return view('requisition/awaitingorderConfirmList',compact('result'));

    }
//All Requisition requisitionConfirm 
    public function requisitionConfirm(Request $request){

       $val = $request->get('data');

       //dd($request->all());
       foreach($val as $reqid)
       {
          DB::table('requisitions')
              ->where('id',$reqid)
              ->update(['status' => 3, 'OrderConfirm_by' => Auth::user()->id]);
       }

       Session::flash('success', 'Data Approved successfull');
       return 0;
    }

 //All Requisition OrderConfirm List  
public function orderConfirmList(){
        //dd('Ok');
         $result = DB::table('requisitions')
        ->select('requisitions.*','branchs.id as bid','branchs.name as bname','project_budgets.memo_no','purchase_item_groups.name as item_group','users.name as created_by')
        ->leftJoin('branchs','branchs.id','=','requisitions.branch_id')
        ->leftJoin('project_budgets','project_budgets.id','=','requisitions.memo_no')
        ->leftJoin('purchase_item_groups','purchase_item_groups.id','=','requisitions.item_group')
        ->leftJoin('users','users.id','=','requisitions.created_by')
        ->orderBy('requisitions.id','DESC')
        ->where('requisitions.status',3)
        ->get();

        //dd($result);
         
       
        return view('requisition.orderConfirmList',compact('result'));


    }

//Requisition Delete

     public function delete($id){
        DB::table('requisition_items')->where('requisition_id',$id)->delete();
        DB::table('requisitions')->where('id',$id)->delete();
        
          //return redirect()->route('requisition')->with('success','Data Delete successfull');
         return Redirect::to('requisition')->with('success','Data Delete successfull');
    }

    //Group wise intemname
    public function group_wise_intemname(Request $request)
    {
        $itemName = DB::table('purchase_general_items')->where('itemgroup_id',$request->get('id'))->get();
        $type     = 1;        

        return view('requisition/requisitionItemName', compact('itemName','type'));
    }
    //intemname wise unit
    public function intemname_wise_unit(Request $request)
    {
        $id = explode('_',$request->get('id'));
        $unitId = DB::table('purchase_general_items')->where('id',$id[1])->first();
        $type     = 2; 
        $unit = DB::table('purchase_item_units')->where('id',$unitId->item_unit_id)->first();
        return $unit->unit;
    }
    
   //Group wise intemname
    public function itemName()
    {
        $result = DB::table('purchase_general_items')->where('status',0)->orderBy('id', 'DESC')->get();
        return $result;
    }

    //intemname wise unit
    public function unit()
    {
        $result = DB::table('purchase_general_items')->where('status',0)->orderBy('id', 'DESC')->get();
        return $result;
    }

    

}

