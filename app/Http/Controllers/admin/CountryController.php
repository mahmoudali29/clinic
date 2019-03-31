<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use App\Http\Controllers\Controller;
use App\Model\Country;
use Redirect;
use Session;
use DB;
use Auth;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
      
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $arrCountries = Country::all();
        $strTitle = "Show Countries" ;
        return view('admin.countries.index',compact('arrCountries','strTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $strTitle = 'Create Country' ;
        return view('admin.countries.create',compact('strTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        try {
            $objCountry = new Country();
            $objCountry->fldNameAR = $request->fldNameAR;
            $objCountry->fldNameEN = $request->fldNameEN;
            $objCountry->fkCreatedByUserID = Auth::user()->id;
            $objCountry->save();
            // print_r($objCountry);die;
            session()->flash('success' ,'Your Country has been Created successfully.');
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
        $objCountry = Country::find($id);
        $strTitle = "Edit Country ";
        return view('admin.countries.edit',compact('objCountry','strTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        try {
            $objCountry = Country::find($id);
            $objCountry->fldNameAR = $request->get('fldNameAR');
            $objCountry->fldNameEN = $request->get('fldNameEN');
            $objCountry->save();
            session()->flash('success' ,'Your Country has been Updated successfully.');
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
    public function destroy($id)
    {
         try { 
            Country::find($id)->delete();
            Session::flash('message' , 'Successfuly Deleted!!');
        } catch (\Exception $e){
            session()->flash('message' ,'Error in Deleted');
        }
        return Redirect::back();
    }
}
