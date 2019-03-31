<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use App\Model\Area;
use App\Model\City;
use App\Model\Country;
use Redirect;
use Session;
use DB;
use Auth;
class AreaController extends Controller
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
       $strTitle = "Show Area";
       $arrCountries = Country::all();
       $arrAreas = Area::all();
       return view('admin.areas.index',compact('arrAreas','strTitle','arrCountries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $strTitle = "Show Area";
        $arrCountries = Country::all();
        return view('admin.areas.create',compact('strTitle','arrCountries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
         try {
            $objArea = new Area();
            $objArea->fldNameAR = $request->input('fldNameAR');
            $objArea->fldNameEN = $request->input('fldNameEN');
            $objArea->fkCountryID = $request->input('fkCountryID');
            $objArea->fkCreatedByUserID = Auth::user()->id;
            $objArea->save();
            session()->flash('success' ,'Your Area has been Created successfully.');
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
        $strTitle = "Edit Area";
        $arrCountries = Country::all(); 
        $objArea = Area::find($id);
        return view('admin.areas.edit',compact('objArea','arrCountries' , 'strTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        try {
            $objArea = Area::find($id);
            $objArea->fldNameAR = $request->get('fldNameAR');
            $objArea->fldNameEN = $request->get('fldNameEN');
            $objArea->fkCountryID = $request->get('fkCountryID');
            $objArea->save();
            session()->flash('success' ,'Your Area has been Updated successfully.');
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
            Area::find($id)->delete();
            Session::flash('message' , 'Successfuly Deleted!');
        } catch (\Exception $e){
            Session()->flash('message' ,'Error in Deleted');
        }
        return Redirect::back();
    }
    
    public function Getareas($fkCountryID)
    {
        $arrAreas = Area::where('fkCountryID',$fkCountryID)->get();
        return response($arrAreas, 200) ;   /// json 
         
    }
}
