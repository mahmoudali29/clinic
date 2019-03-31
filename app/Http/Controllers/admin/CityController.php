<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Model\Area;
use App\Model\City;
use App\Model\Country;
use Redirect;
use Session;
use DB;
use Auth;

class CityController extends Controller
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
        $arrCities = City::all();
        $strTitle = "Show Cities" ;
        return view('admin.cities.index',compact('arrCities','strTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $strTitle = 'Create Cities' ;
        $arrCities = City::all();
        $arrAreas = Area::all();
        $arrCountries = Country::all();
        return view('admin.cities.create',compact('strTitle','arrCities','objCity','arrAreas','arrCountries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        try {
            $objCity = new City();
            $objCity->fldNameAR = $request->input('fldNameAR');
            $objCity->fldNameEN = $request->input('fldNameEN');
            $objCity->fkAreaID = $request->input('fkAreaID');
            $objCity->fkCreatedByUserID = Auth::user()->id;
            $objCity->save();
            session()->flash('success' ,'Your City has been Created successfully.');
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
        $arrCountries = Country::all();
        $strTitle = "Edit City ";
        $objCity = City::find($id);
        $arrAreas = Area::where('fkCountryID',$objCity->Area->fkCountryID)->get(); //
        return view('admin.cities.edit',compact('objCity','strTitle','arrCountries','arrAreas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {

        
        try {
            City::find($id)->update(request()->all());
            session()->flash('success' ,'Your City has been Updated successfully.');
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
            City::find($id)->delete();
            Session::flash('message' , 'Successfuly Deleted!!');
        } catch (\Exception $e){
            Session()->flash('message' ,'Error in Deleted');
        }
        return Redirect::back();
    }
    
    public function GetCities($fkAreaID)
    {
        $arrCities = City::where('fkAreaID',$fkAreaID)->get();
        return response($arrCities, 200) ;   /// json 
         
    }
   
    


}
