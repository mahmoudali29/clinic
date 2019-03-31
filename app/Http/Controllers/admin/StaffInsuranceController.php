<?php
namespace App\Http\Controllers\admin;

use App\Model\Admin;
use App\Model\StaffInsurance;
use App\Model\HrInsurance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffInsuranceRequest;
use Redirect;
use Session;
use DB;
use Auth;
class StaffInsuranceController extends Controller
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
        $arrStaffInsurances = StaffInsurance::all();
        $strTitle = "Show Staff Insurances" ;
        $arrStaffs = Admin::where('type',Admin::TYPE_STAFF)->get();
        $arrInsurances = HrInsurance::all();
        return view('admin.staffs_insurances.index',compact('arrStaffInsurances','strTitle' ,'arrStaffs' ,'arrInsurances')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objStaffInsurance = new StaffInsurance();
        $strTitle = 'Create Staff Insurance' ;
        $arrStaffs = Admin::where('type',Admin::TYPE_STAFF)->get();
        $arrInsurances = HrInsurance::all();
        return view('admin.staffs_insurances.create',compact('objStaffInsurance','strTitle' , 'arrStaffs' , 'arrInsurances')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffInsuranceRequest $request)
    {
        try {
            #insert
            $objStaffInsurance = new StaffInsurance();
            $objStaffInsurance->fkStaffID = $request->input('fkStaffID');
            $objStaffInsurance->fkInsuranceID = $request->input('fkInsuranceID');
            $objStaffInsurance->fldMinFixAmount = $request->input('fldMinFixAmount');
            $objStaffInsurance->fldMaxVarAmount = $request->input('fldMaxVarAmount');
            $objStaffInsurance->fkCreatedByUserID = Auth::user()->id;
            $objStaffInsurance->save();
            
            session()->flash('success' ,'Your Staff Insurance has been added successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check data');
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StaffInsurance  $staffInsurance
     * @return \Illuminate\Http\Response
     */
    // public function show(StaffInsurance $staffInsurance)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaffInsurance  $staffInsurance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $strTitle = "Edit Staff Insurance ";
        $objStaffInsurance = StaffInsurance::find($id);
        $arrStaffs = Admin::where('type',Admin::TYPE_STAFF)->get();
        $arrInsurances = HrInsurance::all();
        return view('admin.staffs_insurances.edit' , compact('strTitle' , 'objStaffInsurance' ,'arrInsurances', 'arrStaffs')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaffInsurance  $staffInsurance
     * @return \Illuminate\Http\Response
     */
    public function update(StaffInsuranceRequest $request, $id)
    {
        try{
            $objStaffInsurance = StaffInsurance::find($id);
            $objStaffInsurance->fkStaffID = $request->get('fkStaffID');
            $objStaffInsurance->fkInsuranceID = $request->get('fkInsuranceID');
            $objStaffInsurance->fldMinFixAmount = $request->get('fldMinFixAmount');
            $objStaffInsurance->fldMaxVarAmount = $request->get('fldMaxVarAmount');
            $objStaffInsurance->save();
            session()->flash('success' ,'Your Insurance has been Updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check your data again');
    }
    return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaffInsurance  $staffInsurance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try { 
            $objStaffInsurance = StaffInsurance::find($id)->delete();
            Session::flash('message' , 'Successfully Deleted!');
         } catch (\Exception $e){
            Session()->flash('message' ,'Error In Deleted');
         }
         return Redirect::back();
    }
}
