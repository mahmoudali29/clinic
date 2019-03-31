<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Branch ;
use App\Model\City ;
use App\Model\Country ;
use App\Model\Area ;
use App\Http\Requests\BranchRequest;
use Redirect;
use Session;
use DB;
use Auth;


class BranchController extends Controller
{
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $arrBranches = Branch::all();
        $arrcity = City::all();
    	$strTitle = "Show Branches" ;
    	return view('admin.branches.index',compact('strTitle','arrBranches','arrcity'));

    }

    public function create(){
       
    	$strTitle = 'Create Branch' ;
        $arrCountries = Country::all();
        $arrAreas = Area::all();
        $arrBranches = Branch::all();
        $arrcities = City::all();
    	return view('admin.branches.create' , compact('strTitle','arrBranches','arrCountries','arrAreas','arrcities'));
 
    }

    public function store(BranchRequest $request){
    	try {
           
            $objBranch = new Branch();
            $objBranch->fldNameAR = $request->input('fldNameAR');
            $objBranch->fldNameEN = $request->input('fldNameEN');
            $objBranch->fkCityID = $request->input('fkCityID');
            $objBranch->fldPhone1 = $request->input('fldPhone1');
            $objBranch->fldPhone2 = $request->input('fldPhone2');
            $objBranch->fldAddressAR = $request->input('fldAddressAR');
            $objBranch->fldAddressEN = $request->input('fldAddressEN');
            $objBranch->fkCreatedByUserID = Auth::user()->id;
            $objBranch->save();

            session()->flash('success' ,'Your Branch has been added successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check data');
        }
        return Redirect::back();

    }


    public function edit($id){
        $objBranch  = Branch::find($id) ;
        $objcities  = City::find($id) ;
        $objcountries  = Country::find($id) ;
        $objareas  = Area::find($id) ;
        $arrCountries = Country::all();
        $pkCountryID = @$objBranch->City->Area->Country->pkCountryID ; 
        $arrAreas = Area::where('fkCountryID',$pkCountryID)->get();
        
        $fkAreaID = @$objBranch->City->Area->pkAreaID ; 
        $arrCities = City::where('fkAreaID',$fkAreaID)->get();
        // $arrAreas = Area::all();
        // $objBranch = Branch::find($id);
        // $arrcities = City::all();
    	$strTitle = "Edit Branch ";
    	return view('admin.branches.edit' , compact('objareas','objcountries','objcities','objBranch' , 'strTitle','arrBranches','arrAreas','arrCities','arrCountries')) ;
        
    }


    public function update(BranchRequest $request , $id) {
        
    	try {
            
            $objBranch = Branch::find($id);
            $objBranch->fldNameAR = $request->get('fldNameAR');
            $objBranch->fldNameEN = $request->get('fldNameEN');
            $objBranch->fkCityID = $request->get('fkCityID');
            $objBranch->fldPhone1 = $request->get('fldPhone1');
            $objBranch->fldPhone2 = $request->get('fldPhone2');
            $objBranch->fldAddressAR = $request->get('fldAddressAR');
            $objBranch->fldAddressEN = $request->get('fldAddressEN');
            $objBranch->save();

            session()->flash('success' ,'Your Branch has been Updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check your data again');
        }
        return Redirect::back();
    }


    public function destroy($id)
    {
        
        try { 
           Branch::find($id)->delete();
            Session::flash('message' , 'Successfuly Deleted!');
        } catch (\Exception $e){
            Session()->flash('message' ,'Error in Deleted');
        }
        return Redirect::back();
    }

    public function GetBranches($fkCityID)
    {
        $arrBranches = Branch::where('fkCityID',$fkCityID)->get();
        return response($arrBranches, 200) ;   /// json 
         
    }

}
