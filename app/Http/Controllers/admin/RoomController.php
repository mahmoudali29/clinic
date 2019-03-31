<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Room ;
use App\Model\Branch ;
use App\Model\Country ;
use App\Model\City ;
use App\Model\Area ;
use App\Http\Requests\RoomRequest;
use Redirect;
use Session;
use DB;
use Auth;



class RoomController extends Controller
{
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }
    public function index(){
        $arrRooms = Room::all();
        $arrCountries = Country::all();
        $arrAreas = Area::all();
        $arrBranches = Branch::all();
        $arrcities = City::all();
       
        
    	$strTitle = "Show Rooms" ;
    	return view('admin.rooms.index',compact('arrcities','arrAreas','arrCountries','strTitle','arrRooms','arrBranches'));

    }

    public function create(){
       
    	$strTitle = 'Create Room' ;
      
        $arrRooms = Room::all();
        $arrCountries = Country::all();
        $arrAreas = Area::all();
        $arrBranches = Branch::all();
        $arrcities = City::all();
       
    	return view('admin.rooms.create' , compact('arrcities','arrCountries','strTitle','arrBranches','arrRooms','arrAreas','arrcities'));
 
    }

    public function store(RoomRequest $request){
    	try {
           
            $objRoom = new Room();
            $objRoom->fldNameAR = $request->input('fldNameAR');
            $objRoom->fldNameEN = $request->input('fldNameEN');
            $objRoom->fkBranchID = $request->input('fkBranchID');
            $objRoom->fkCreatedByUserID = Auth::user()->id;
            $objRoom->save();

            session()->flash('success' ,'Your Room has been added successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check data');
        }
        return Redirect::back();

    }


    public function edit($id){
        $objRoom = Room::find($id) ;
        $objBranch  = Branch::find($id) ;
        $objcities  = City::find($id) ;
        $objcountries  = Country::find($id) ;
        $objareas  = Area::find($id) ;
        $arrCountries = Country::all();
        $pkCountryID = $objRoom->Branch->City->Area->Country->pkCountryID ; 
        $arrAreas = Area::where('fkCountryID',$pkCountryID)->get();
        
        $fkAreaID = $objRoom->Branch->City->Area->pkAreaID ; 
        $arrCities = City::where('fkAreaID',$fkAreaID)->get();
        $fkCityID =  $objRoom->Branch->City->pkCityID;
        $arrBranches = Branch::where('fkCityID',$fkCityID)->get();
    	$strTitle = "Edit Room ";
    	return view('admin.rooms.edit' , compact('objRoom' , 'strTitle','arrRooms','arrBranches','objcities','objcountries','objareas','arrCountries','arrAreas','arrCities','objBranch')) ;
        
    }


    public function update(RoomRequest $request , $id) {

    	try {
            $objRoom = Room::find($id);
            $objRoom->fldNameAR = $request->get('fldNameAR');
            $objRoom->fldNameEN = $request->get('fldNameEN');
            $objRoom->fkBranchID = $request->get('fkBranchID');
            
            $objRoom->save();
            session()->flash('success' ,'Your Data has been Updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check your data again');
        }
        return Redirect::back();
    }


    public function destroy($id)
    {
        
        try { 
           Room::find($id)->delete();
            Session::flash('message' , 'Successfuly Deleted!!');
        } catch (\Exception $e){
            Session()->flash('message' ,'Error in Deleted');
        }
        return Redirect::back();
    }

    

}
