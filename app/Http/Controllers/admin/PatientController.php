<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use Illuminate\Support\Facades\Input;
use App\Model\Area;
use App\Model\City;
use App\Model\Patient;
use App\Model\Country;
use App\Model\Branch;
use Redirect;
use Session;
use DB;
use Auth;

class PatientController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        // print_r('here');die;
        $arrPatients = Patient::all();
        $strTitle = "Show Patients" ;
        return view('admin.patients.index',compact('arrPatients','strTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $strTitle = 'Create Patient' ;

        $arrCountries = Country::all();
        $arrCities = City::all();
        $arrAreas = Area::all();
        $arrBranches = Branch::all();
        $arrPatients = Patient::all();
        $objPatient = new Patient;
        //var_dump($objPatient); die;
        return view('admin.patients.create',compact('objPatient','strTitle','arrCities','arrPatients','arrAreas','arrCountries' , 'arrBranches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        try {
            // dd($request->input('fldGender'));
            $objPatient = new Patient();
            $objPatient->fldNameAR = $request->input('fldNameAR');
            $objPatient->fldNameEN = $request->input('fldNameEN');
            $objPatient->fldAddressAR = $request->input('fldAddressAR');
            $objPatient->fldAddressEN = $request->input('fldAddressEN');
            $objPatient->fldPhone1 = $request->input('fldPhone1');
            $objPatient->fldPhone2 = $request->input('fldPhone2');
            $objPatient->fldGender = $request->input('fldGender');
            $objPatient->fldDateOfBirth = $request->input('fldDateOfBirth');
            $objPatient->fldEmail = $request->input('fldEmail');

            if (Input::hasFile('fldPhoto'))
            {
                $fldPhoto = $request->fldPhoto;        
                $Photo = $fldPhoto->store('patientsPhoto');
                $objPatient->fldPhoto = $Photo;
            }
            
            $objPatient->fkCountryID = $request->input('fkCountryID');
            $objPatient->fkAreaID = $request->input('fkAreaID');
            $objPatient->fkCityID = $request->input('fkCityID');
            $objPatient->fkBranchID = $request->input('fkBranchID');
            $objPatient->fkCreatedByUserID = Auth::user()->id;
            $objPatient->save();
            session()->flash('success' ,'Your Patient has been Created successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check your data again');
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $strTitle = "Edit Patient ";
        $arrCountries = Country::all();
        $objPatient = Patient::find($id);
        $arrAreas = Area::where('fkCountryID',$objPatient->Area->fkCountryID)->get(); 
        $arrCities = City::where('fkAreaID',$objPatient->City->fkAreaID)->get(); 
        $arrBranches = Branch::where('fkCityID',$objPatient->Branch->fkCityID)->get();

        return view('admin.patients.edit',compact('objPatient','strTitle','arrCountries','arrAreas' ,'arrCities' , 'arrBranches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, $id)
    {

        
        try {
            $objPatient = Patient::find($id);
            $objPatient->fldNameAR = $request->get('fldNameAR');
            $objPatient->fldNameEN = $request->get('fldNameEN');
            $objPatient->fldAddressAR = $request->get('fldAddressAR');
            $objPatient->fldAddressEN = $request->get('fldAddressEN');
            $objPatient->fldPhone1 = $request->get('fldPhone1');
            $objPatient->fldPhone2 = $request->get('fldPhone2');
            $objPatient->fldGender = $request->get('fldGender');
            $objPatient->fldDateOfBirth = $request->get('fldDateOfBirth');
            $objPatient->fldEmail = $request->get('fldEmail');
            
            if (Input::hasFile('fldPhoto'))
            {
                $fldPhoto = $request->fldPhoto;        
                $Photo = $fldPhoto->store('patientsPhoto');
                $objPatient->fldPhoto = $Photo;
            }
            // else{
            //     $noPhoto = 'storage/app/patientsPhoto/NoImageAvailable.png';
            // }
            
            $objPatient->fkCountryID = $request->get('fkCountryID');
            $objPatient->fkAreaID = $request->get('fkAreaID');
            $objPatient->fkCityID = $request->get('fkCityID');
            $objPatient->fkBranchID = $request->get('fkBranchID');
            $objPatient->save();
            session()->flash('success' ,'Your Patient has been Updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check your data again');
        }
        return Redirect::back();
    }
    // print_r($objCity);die;
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          try { 
            Patient::find($id)->delete();
            Session::flash('message' , 'Successfuly Deleted!!');
        } catch (\Exception $e){
            Session()->flash('message' ,'Error in Deleted');
        }
        return Redirect::back();
    }
}
