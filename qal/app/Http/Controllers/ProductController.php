<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\RegionController;

use DB;
use Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function page_index()
    {
        $allZones = new ZoneController;
        $allZones = $allZones->allZones();

        $result = DB::table('purchase_general_items')
        ->select('purchase_general_items.*','purchase_item_groups.name as itemgroup','purchase_item_subgroups.name as itemsubgroup','purchase_item_categories.name as itemCategory','purchase_item_units.unit')
        ->join('purchase_item_groups','purchase_item_groups.id','=','purchase_general_items.itemgroup_id')
        ->join('purchase_item_subgroups','purchase_item_subgroups.id','=','purchase_general_items.itemsubgroup_id')
        ->join('purchase_item_categories','purchase_item_categories.id','=','purchase_general_items.item_category_id')
        ->join('purchase_item_units','purchase_item_units.id','=','purchase_general_items.item_unit_id')
        ->orderBy('purchase_general_items.id','DESC')->get();
        
        return view('product/productMaster', compact('result','allZones'));
    }

    public function new()
    {  
        $itemGroup       = self::itemGroup();
        $itemSubgroup    = self::itemSubgroup();
        $itemCategory    = self::itemCategory();
        $itemUnit        = self::itemUnit();
        $itemPackSize    = self::itemPackSize();
 
        return view('product/productNew', compact('itemGroup','itemSubgroup','itemCategory','itemUnit','itemPackSize'));
    }


    public function submit(Request $request)
    {
        //dd($request->all());
        DB::table('purchase_general_items')->insert([
            'itemgroup_id'            => $request->get('itemgroup'),
            'itemsubgroup_id'         => $request->get('itemsubgroup'),
            'item_category_id'        => $request->get('itemCategory'),
            'item_name'               => $request->get('item_name'),
            'item_unit_id'            => $request->get('unit'),
            'item_alternative_unit_id'=> $request->get('itemAlternativeUnit'),
            'item_code'               => $request->get('item_code'),
            'item_description'        => $request->get('description'),
            'where_unit'              => $request->get('whereUnit'),
            'where_kg'                => $request->get('whereKg'),
            'inventory_type'          => $request->get('inventory_type'),
            'userid'                  => Auth::user()->id
        ]);

        return redirect::to('product-setup')->with('success', 'Successfully Added.');
    }

    public function edit($id)
    {
     
        $itemGroup       = self::itemGroup();
        $itemSubgroup    = self::itemSubgroup();
        $itemCategory    = self::itemCategory();
        $itemUnit        = self::itemUnit();
        $itemPackSize    = self::itemPackSize();

        $result = DB::table('purchase_general_items')
        ->select('purchase_general_items.*','purchase_item_groups.name as itemgroup','purchase_item_subgroups.name as itemsubgroup','purchase_item_categories.name as itemCategory','purchase_item_units.unit')
        ->join('purchase_item_groups','purchase_item_groups.id','=','purchase_general_items.itemgroup_id')
        ->join('purchase_item_subgroups','purchase_item_subgroups.id','=','purchase_general_items.itemsubgroup_id')
        ->join('purchase_item_categories','purchase_item_categories.id','=','purchase_general_items.item_category_id')
        ->join('purchase_item_units','purchase_item_units.id','=','purchase_general_items.item_unit_id')
        ->orderBy('purchase_general_items.id','DESC')->where('purchase_general_items.id',$id)->first(); 

        return view('product/productEdit', compact('result','itemGroup','itemSubgroup','itemCategory','itemUnit','itemPackSize'));
        
    }

    public function update(Request $request)
    {
        DB::table('purchase_general_items')->where('id',$request->get('id'))->update([
            'itemgroup_id'            => $request->get('itemgroup'),
            'itemsubgroup_id'         => $request->get('itemsubgroup'),
            'item_category_id'        => $request->get('itemCategory'),
            'item_name'               => $request->get('item_name'),
            'item_unit_id'            => $request->get('unit'),
            'item_alternative_unit_id'=> $request->get('itemAlternativeUnit'),
            'item_code'               => $request->get('item_code'),
            'item_description'        => $request->get('description'),
            'where_unit'              => $request->get('whereUnit'),
            'where_kg'                => $request->get('whereKg'),
            'inventory_type'          => $request->get('inventory_type'),
            'userid'                  => Auth::user()->id
        ]);

        return redirect::to('product-setup')->with('success', 'Successfully Updated.');
    }

  
   
    public function group_wise_subgroup(Request $request)
    {
        $subgroup = DB::table('purchase_item_subgroups')->where('group_id',$request->get('id'))->get();
        $type     = 1;        

        return view('product/productSubgroup', compact('subgroup','type'));
    }

    public function subgroup_wise_category(Request $request)
    {
        $category = DB::table('purchase_item_categories')->where('subgroup_id',$request->get('id'))->get();
        $type     = 2;        

        return view('product/productSubgroup', compact('category','type'));
    }

    

    public function group_submit(Request $request)
    {
        DB::table('purchase_item_groups')->insert([
            'authorized_group'=> $request->get('authorized_group'),
            'name'            => $request->get('gname')
            
        ]);

        return redirect::back()->with('success', 'Successfully Added.');
    }
    public function subgroup_submit(Request $request)
    {
        DB::table('purchase_item_subgroups')->insert([
            'group_id'        => $request->get('group_id'),
            'name'            => $request->get('name'),
        ]);

        return redirect::back()->with('success', 'Successfully Added.');
    }
    public function category_submit(Request $request)
    {
        DB::table('purchase_item_categories')->insert([
            'group_id'     => $request->get('group_id'),
            'subgroup_id'  => $request->get('subgroup_id'),
            'name'         => $request->get('name'),
        ]);

        return redirect::back()->with('success', 'Successfully Added.');
    }


    public function unit_submit(Request $request)
    {
        DB::table('purchase_item_units')->insert([
            'unit' => $request->get('name')
        ]);

        return redirect::back()->with('success', 'Successfully Added.');
    }

    public function packsize_submit(Request $request)
    {
        DB::table('purchase_pack_sizes')->insert([
            'name' => $request->get('name')
        ]);

        return redirect::back()->with('success', 'Successfully Added.');
    }




    public function itemGroup()
    {
        $result = DB::table('purchase_item_groups')->where('status',0)->orderBy('id', 'DESC')->get();
        return $result;
    }

   

    public function itemSubgroup()
    {
        $result = DB::table('purchase_item_subgroups')->where('status',0)->orderBy('id', 'DESC')->get();
        return $result;
    }

    public function itemCategory()
    {
        $result = DB::table('purchase_item_categories')->where('status',0)->orderBy('id', 'DESC')->get();
        return $result;
    }
    public function itemUnit()
    {
        $result = DB::table('purchase_item_units')->where('status',0)->orderBy('id', 'DESC')->get();
        return $result;
    }

    public function itemPackSize()
    {
        $result = DB::table('purchase_pack_sizes')->where('status',0)->orderBy('id', 'DESC')->get();
        return $result;
    }

    public function branch()
    {
        $result = DB::table('branchs')->where('status',0)->orderBy('id', 'DESC')->get();
        return $result;
    }








    // ////////////////////// Requisition /////////////////////

    // public function purchase_requisition()
    // {
    //     $itemGroup       = self::itemGroup();
    //     $itemCategory    = self::itemCategory();
    //     $itemUnit        = self::itemUnit();
    //     $itemPackSize    = self::itemPackSize();
    //     $branch          = self::branch();

    //     return view('requisition/requisitionNew', compact('itemGroup','itemCategory','itemPackSize','itemUnit','branch'));
    // }
}
