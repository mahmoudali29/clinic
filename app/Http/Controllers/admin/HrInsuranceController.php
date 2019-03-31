<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\HrInsurance;
use App\Http\Requests\HrInsuranceRequest;
use Redirect;
use Session;
use DB;
use Auth;
class HrInsuranceController extends Controller
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
        $arrInsurances = HrInsurance::all();
        $strTitle = "Show Insurances" ;
        return view('admin.hr_insurances.index',compact('arrInsurances','strTitle')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $strTitle = 'Create Insurance' ;
        return view('admin.hr_insurances.create',compact('strTitle')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HrInsuranceRequest $request)
    {
        try {
            #insert
            $objInsurance = new HrInsurance();
            $objInsurance->fldBasicMin = $request->input('fldBasicMin');
            $objInsurance->fldBasicMax = $request->input('fldBasicMax');
            $objInsurance->fldVariableMin = $request->input('fldVariableMin');
            $objInsurance->fldVariableMax = $request->input('fldVariableMax');
            $objInsurance->Start_Date = $request->input('Start_Date');
            $objInsurance->End_Date = $request->input('End_Date');
            $objInsurance->fkCreatedByUserID = Auth::user()->id;
            $objInsurance->save();
            session()->flash('success' ,'Your Insurance has been added successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check data');
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HrInsurance  $hrInsurance
     * @return \Illuminate\Http\Response
     */
    // public function show(HrInsurance $hrInsurance)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HrInsurance  $hrInsurance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $strTitle = "Edit Insurance ";
        $objInsurance = HrInsurance::find($id);
        // $arrStaffs = Admin::where('type',Admin::TYPE_STAFF)->get();
        return view('admin.hr_insurances.edit' , compact('strTitle' , 'objInsurance')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HrInsurance  $hrInsurance
     * @return \Illuminate\Http\Response
     */
    public function update(HrInsuranceRequest $request, $id)
    {
        try{
            $objInsurance = HrInsurance::find($id);
            $objInsurance->fldBasicMin = $request->get('fldBasicMin');
            $objInsurance->fldBasicMax = $request->get('fldBasicMax');
            $objInsurance->fldVariableMin = $request->get('fldVariableMin');
            $objInsurance->fldVariableMax = $request->get('fldVariableMax');
            $objInsurance->Start_Date = $request->get('Start_Date');
            $objInsurance->End_Date = $request->get('End_Date');
            $objInsurance->save();
            session()->flash('success' ,'Your Insurance has been Updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check your data again');
    }
    return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HrInsurance  $hrInsurance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try { 
            $objInsurance = HrInsurance::find($id)->delete();
            Session::flash('message' , 'Successfully Deleted!');
         } catch (\Exception $e){
            Session()->flash('message' ,'Error In Deleted');
         }
         return Redirect::back();
    }

    public function GetInsurances($fkInsuranceID)
    {
        $objInsurance = HrInsurance::find($fkInsuranceID);
        return response($objInsurance, 200) ;   /// json 
         
    }
}
