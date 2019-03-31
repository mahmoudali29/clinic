<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\HrDeductionRequest;
use App\Http\Controllers\Controller;
use App\Model\HrDeduction;
use Redirect ;
use Session;
use DB;
use Auth;
use App\Model\Department;
use App\Model\Job;
use App\Model\Admin;

class HrDeductionController extends Controller
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
        $arrjobs = Job::all();
        $arrDepartments = Department::all();
        $arrDeduction = HrDeduction::all();
        $strTitle = "Show Deductions" ;
        return view('admin.hr_deductions.index',compact('arrDeduction','strTitle','arrjobs','arrDepartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrjobs = Job::all();
        $arrDepartments = Department::all();
        $arrDeduction = HrDeduction::all();
        $strTitle = 'Create Deductions' ;
        $arrAdmins = Admin::all();
        return view('admin.hr_deductions.create',compact('strTitle' , 'arrAdmins','arrjobs','arrDepartments','arrDeduction')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HrDeductionRequest $request)
    {
        try {
            # update 
            // $objDeductions = HrDeduction::where('fkStaffID',$request->input('fkStaffID'))
            // ->orderBy('pkSalaryID', 'desc')->first(); 
            // if($objDeductions){
            //     $objDeductions->End_Date = $request->input('Start_Date') ; 
            //     $objDeductions->save();
            // }
            #insert
            $objDeduction = new HrDeduction();
            $objDeduction->fkStaffID = $request->input('fkStaffID');
            $objDeduction->fldTheAmount = $request->input('fldTheAmount');
            $objDeduction->fldHistory = $request->input('fldHistory');
            $objDeduction->fkCreatedByUserID = Auth::user()->id;
            $objDeduction->save();
            session()->flash('success' ,'Your Deduction has been added successfully.');
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
        $objDepartment  = Department::find($id) ;
        $objectjob = Job::find($id) ;
        $arrjobs = Job::all();
        $arrDepartments = Department::all();
        $strTitle = "Edit Deductions ";
        $objDeduction = HrDeduction::find($id);
        $arrAdmins = Admin::all();
        $pkDepartmentID = $objDeduction->Admin->Job->Department->pkDepartmentID ; 
        $arrjobs = Job::where('fkDepartmentID',$pkDepartmentID)->get();
        $pkJobID = $objDeduction->Admin->Job->pkJobID ; 
        $arrAdmins = Admin::where('fkJobID',$pkJobID)->get();
        return view('admin.hr_deductions.edit' , compact('pkJobID','pkDepartmentID','strTitle' , 'objDeduction' , 'arrAdmins','objDepartment','objectjob','arrjobs','arrDepartments')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HrDeductionRequest $request, $id)
    {
        try{
            // $objDeductions = HrDeduction::where('fkStaffID',$request->input('fkStaffID'))
            // ->orderBy('pkSalaryID', 'desc')->first();
            // if($objDeductions){
            //     $objDeductions->Start_Date = $request->input('End_Date') ; 
            //     $objDeductions->save();
            // }
            $objDeduction = HrDeduction::find($id);
            $objDeduction->fkStaffID = $request->get('fkStaffID');
            $objDeduction->fldTheAmount = $request->get('fldTheAmount');
            $objDeduction->fldHistory = $request->get('fldHistory');
            $objDeduction->save();
            session()->flash('success' ,'Your Deductions has been Updated successfully.');
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
    public function destroy(HrDeductionRequest $request,$id)
    {
        try { 
           
            HrDeduction::find($id)->delete();
            Session::flash('message' , 'Successfully Deleted!');
         } catch (\Exception $e){
            Session()->flash('message' ,'Error In Deleted');
         }
         return Redirect::back();
    }

    public function GetDedication($fkStaffID,$from,$to)
    {   
        $sumDeduction = HrDeduction::where('fkStaffID',$fkStaffID)
        ->whereBetween('fldHistory', [$from, $to])
        ->sum('fldTheAmount');
        return response($sumDeduction, 200) ;
    }
    
}
