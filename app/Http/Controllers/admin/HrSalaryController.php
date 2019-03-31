<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\HrSalaryRequest;
use App\Http\Controllers\Controller;
use App\Model\HrSalary;
use Redirect ;
use Session;
use DB;
use Auth;
use App\Model\Department;
use App\Model\Job;
use App\Model\Admin;

class HrSalaryController extends Controller
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
        $arrSalaries = HrSalary::all();
        $strTitle = "Show Salaries" ;
        return view('admin.hr_salaries.index',compact('arrSalaries','strTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $strTitle = 'Create Salary' ;
        $arrAdmins = Admin::all();
        $arrDepartments = Department::all();
        $arrJobs = Job::all();
        return view('admin.hr_salaries.create',compact('strTitle' , 'arrAdmins' , 'arrDepartments' , 'arrJobs')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HrSalaryRequest $request)
    {
        //When inserting new salary with Start_Date it occurs a update in End_Date in previous row
        try {
            # update 
            $objSalary = HrSalary::where('fkStaffID',$request->input('fkStaffID'))
            ->orderBy('pkSalaryID', 'desc')->first(); 
            if($objSalary){
                $objSalary->End_Date = $request->input('Start_Date') ; 
                $objSalary->save();
            }
            #insert
            $objSalary = new HrSalary();
            $objSalary->fkStaffID = $request->input('fkStaffID');
            $objSalary->Salary = $request->input('Salary');
            $objSalary->Start_Date = $request->input('Start_Date');
            $objSalary->fkCreatedByUserID = Auth::user()->id;
            $objSalary->save();
            session()->flash('success' ,'Your Salary has been added successfully.');
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
        $strTitle = "Edit Salary ";
        $objSalary = HrSalary::find($id);
        $arrDepartments = Department::all();
        $arrAdmins = Admin::all();
        $pkDepartmentID = $objSalary->Admin->Job->Department->pkDepartmentID;
        $pkJobID = $objSalary->Admin->Job->pkJobID;
        $arrJobs = Job::where('fkDepartmentID',$pkDepartmentID)->get();
        $arrStaffs = Admin::where('fkJobID',$pkJobID)->get();
        return view('admin.hr_salaries.edit' , compact('strTitle' , 'objSalary' , 'arrAdmins' , 'arrDepartments' ,'arrJobs', 'arrStaffs')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HrSalaryRequest $request, $id)
    {
        //When Updating a salary  it deletes the latest End_Date in previous row
        try{
            
            $objSalary = HrSalary::find($id);
            $objLastSalary = HrSalary::where('fkStaffID',$request->input('fkStaffID'))
            ->where('End_Date',$objSalary->Start_Date)
            ->orderBy('pkSalaryID', 'desc')->first();

            if($objLastSalary){
                $objLastSalary->End_Date = $request->input('Start_Date') ; 
                $objLastSalary->save();
            }
            
            $objSalary->fkStaffID = $request->get('fkStaffID');
            $objSalary->Salary = $request->get('Salary');
            $objSalary->Start_Date = $request->get('Start_Date');
            $objSalary->save();

            session()->flash('success' ,'Your Salary has been Updated successfully.');
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
    public function destroy(HrSalaryRequest $request,$id)
    {
        //When delete a salary  it deletes the latest End_Date in previous row
        try { 
            $objSalary = HrSalary::find($id);
            $fkStaffID = $objSalary->fkStaffID;
            if (!is_null($objSalary)) {
                $objSalary->delete();
            }
            $objSalary = HrSalary::where('fkStaffID',$fkStaffID)
            ->orderBy('pkSalaryID', 'desc')->first();
            
            if($objSalary){
                $objSalary->End_Date = null ; 
                $objSalary->save();
         }
            Session::flash('message' , 'Successfully Deleted!');
         } catch (\Exception $e){
            Session()->flash('message' ,'Error In Deleted');
         }
         return Redirect::back();
    }

    public function GetSalaries($fkStaffID)
    {
        $objSalary = HrSalary::where('fkStaffID',$fkStaffID)->orderBy('pkSalaryID', 'desc')->first();
        // print_r( $objSalary);die;
        return response($objSalary, 200) ;   /// json 
    }

    
}
