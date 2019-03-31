<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\HrAllowanceRequest;
use App\Http\Controllers\Controller;
use App\Model\HrAllowance;
use Redirect;
use Session;
use DB;
use Config;
use Auth;
use App\Model\Department;
use App\Model\Job;
use App\Model\Admin;

class HrAllowanceController extends Controller
{
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrAllowances = HrAllowance::all();
        $strTitle = "Show Allowances" ;
        return view('admin.hr_allowances.index',compact('arrAllowances','strTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objAllowance = new HrAllowance();
        $strTitle = 'Create Allowance' ;
        $arrAdmins = Admin::all();
        $arrDepartments = Department::all();
        $arrJobs = Job::all();
        return view('admin.hr_allowances.create',compact('objAllowance','strTitle' , 'arrAdmins' , 'arrDepartments' , 'arrJobs')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HrAllowanceRequest $request)
    {
        try {
            #insert
            $objAllowance = new HrAllowance();
            $objAllowance->fkStaffID = $request->input('fkStaffID');
            $objAllowance->Allowance = $request->input('Allowance');
 
            $objAllowance->fldType = $request->input('fldType');
            $objAllowance->Start_Date = $request->input('Start_Date');
            $objAllowance->End_Date = $request->input('End_Date');
            $objAllowance->fkCreatedByUserID = Auth::user()->id;
            $objAllowance->save();
            session()->flash('success' ,'Your Allowance has been Added Successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check data');
        }
        return Redirect::back();   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\
     * Http\Response
     */
    public function edit($id)
    {
        $strTitle = "Edit Allowance ";
        $objAllowance = HrAllowance::find($id);
        $arrAdmins = Admin::all();
        $arrDepartments = Department::all();
        $arrJobs = Job::where('fkDepartmentID',$objAllowance->Admin->Job->Department->pkDepartmentID)->get();
        $arrStaffs = Admin::where('fkJobID',$objAllowance->Admin->Job->pkJobID)->get();
        return view('admin.hr_allowances.edit' , compact('strTitle' , 'objAllowance' , 'arrAdmins' , 'arrDepartments' ,'arrJobs' , 'arrStaffs')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HrAllowanceRequest $request, $id)
    {
        try{
            $objAllowance = HrAllowance::find($id);
            $objAllowance->fkStaffID = $request->get('fkStaffID');
            $objAllowance->Allowance = $request->get('Allowance');
            $objAllowance->fldType = $request->get('fldType');
            $objAllowance->Start_Date = $request->input('Start_Date');
            $objAllowance->End_Date = $request->get('End_Date');
            $objAllowance->save();
            session()->flash('success' ,'Your Allowance has been Updated Successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check your data again');
    }
    return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HrAllowanceRequest $request,$id)
    {
        try { 
            $objAllowance = HrAllowance::find($id)->delete();
            Session::flash('message' , 'Successfully Deleted!');
         } catch (\Exception $e){
            Session()->flash('message' ,'Error In Deleted');
         }
         return Redirect::back();
    }
}
