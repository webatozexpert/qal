<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
class ProjectBudgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $result = DB::table('project_budgets')

        ->select('project_budgets.*','projects.name as pname')
        ->join('projects','project_budgets.projectid','=','projects.id')
        ->orderBy('id','DESC')
        ->get();

        $projects = DB::table('projects')
        ->orderBy('id')
        ->get();

        //$projects = $this->projects();

        return view('projectBudget/projectBudjectMaster', compact('result','projects'));
    }
    public function projectBudget_submit(Request $request)
    {
        //dd($request->all());
        DB::table('project_budgets')->insert([
            'projectid'   => $request->get('projectid'),
            'memo_no'     => $request->get('memo_no'),
            'date'        => date('Y-m-d', strtotime($request->get('date'))),
            'project_amount' => $request->get('project_amount'),
            'status'      => $request->get('status')
        ]);

        return redirect::to('projectBudget-setup')->with('success', 'Successfully Added.');
    }
    
    public function projectBudget_edit($id)
    {
        
        $result = DB::table('project_budgets')
        ->select('project_budgets.*','projects.name as pname')
        ->join('projects','project_budgets.projectid','=','projects.id')
        ->orderBy('id','DESC')
        ->get();

        $projects = DB::table('projects')
        ->orderBy('id')
        ->get();

        $edit = DB::table('project_budgets')->where('id',$id)->first();

        //dd($edit);

        return view('projectBudget/projectBudjectEdit', compact('result','projects','edit'));
    }

    
    public function projectBudget_update(Request $request)
    {
        //dd($request->all());
        DB::table('project_budgets')->where('id',$request->get('id'))->update([
            'projectid'      => $request->get('projectid'),
            'memo_no'        => $request->get('memo_no'),
            'date'           => date('Y-m-d', strtotime($request->get('date'))),
            'project_amount' => $request->get('project_amount'),
            'status'         => $request->get('status')
        ]);

        return redirect::to('projectBudget-setup')->with('success', 'Updated Successfully .');
    }
    

    public function delete($id){
        $delete = DB::table('project_budgets')->where('id',$id)->delete();
        
        
        return redirect::to('projectBudget-setup')->with('success', 'Delete Successfully .');
    }

}
