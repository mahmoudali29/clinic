<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\HrLoanRequest;
use App\Http\Controllers\Controller;
use App\Model\HrLoan;
use Redirect;
use Session;
use DB;
use Auth;
use App\Model\Department;
use App\Model\Job;
use App\Model\Admin;

class HrLoanController extends Controller
{

    public function __construct()
    {
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
        $arrDepartments = Department::all();
        $arrLoans = HrLoan::all();
        $strTitle = "Show Loans" ;
        return view('admin.hr_loans.index',compact('arrLoans','strTitle','arrDepartments')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $strTitle = 'Create Loan' ;
        $arrDepartments = Department::all();
        $arrStaffs = Admin::where('type',Admin::TYPE_STAFF)->get();
        $objLoan = new HrLoan;
        return view('admin.hr_loans.create',compact('strTitle' , 'arrDepartments', 'arrStaffs' , 'objLoan')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HrLoanRequest $request)
    {
        try {
            #insert
            $objLoan = new HrLoan();
            $objLoan->fldAmount = $request->input('fldAmount');
            $objLoan->fkStaffID = $request->input('fkStaffID');
            $objLoan->fldStatus = $request->input('fldStatus');
            $objLoan->fldDate = $request->input('fldDate');
            $objLoan->fkCreatedByUserID = Auth::user()->id;
            $objLoan->save();
            session()->flash('success' ,'Your Loan has been added successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check data');
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HrLoan  $hrLoan
     * @return \Illuminate\Http\Response
     */
    public function showStaffLoan(){
        $strTitle = 'Search Staff Loans';
        $arrDepartments = Department::all();   
        return view('admin.hr_loans.search_preview',compact('strTitle','arrDepartments'));
    }
    
    public function show(HrLoanRequest $request)
    {
        //show Unpaidloans by id
        $strTitle = 'Show Staff Loans';
        $fkStaffID = $request->input('fkStaffID'); 
        $arrLoans = HrLoan::where('fkStaffID',$fkStaffID)
            ->where('fldStatus',HrLoan::UNPAID)
            ->get();
        return view('admin.hr_loans.show',compact('strTitle' , 'arrLoans'));
    }
    // ['user' => User::findOrFail($id)]
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HrLoan  $hrLoan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $strTitle = "Edit Loan";
        $objLoan = HrLoan::find($id);
        $arrDepartments = Department::all();
        $arrJobs = Job::all();
        $arrStaffs = Admin::where('type',Admin::TYPE_STAFF)->get();
        return view('admin.hr_loans.edit' , compact('strTitle' , 'objLoan' , 'arrStaffs' , 'arrDepartments' , 'arrJobs')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HrLoan  $hrLoan
     * @return \Illuminate\Http\Response
     */
    public function update(HrLoanRequest $request, $id)
    {
        try{
            $objLoan = HrLoan::find($id);
            $objLoan->fldAmount = $request->input('fldAmount');
            $objLoan->fkStaffID = $request->input('fkStaffID');
            $objLoan->fldStatus = $request->input('fldStatus');
            $objLoan->fldDate = $request->input('fldDate');
            $objLoan->fkCreatedByUserID = Auth::user()->id;
            $objLoan->save();
            session()->flash('success' ,'Your Loan has been Updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check your data again');
    }
    return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HrLoan  $hrLoan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try { 
            $objLoan = HrLoan::find($id)->delete();
            Session::flash('message' , 'Successfully Deleted!');
         } catch (\Exception $e){
            Session()->flash('message' ,'Error In Deleted');
         }
         return Redirect::back();
    }
}
