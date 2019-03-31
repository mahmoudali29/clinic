<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Branch_Admin;
use App\Model\Admin;
use App\Model\City ;
use App\Model\Country ;
use App\Model\Area ;
use App\Model\Branch;

use App\Http\Requests\BranchAdminsRequest;
use Redirect ;
use Session;
use DB;

class BranchAdminsController extends Controller
{ 
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }

    public function index(){
        $arrCountries = Country::all();
        $arrAreas = Area::all();
        $arrBranches = Branch::all();
        $arrcities = City::all();
    
        $arrAdmins = Admin::all();
        $arrBranchAdmins = Branch_Admin::all();
    	$strTitle = "Show Branch Admins" ;
    	return view('admin.branch_admins.index',compact('arrcities','arrAreas','arrCountries','objAdmin','objBranch ','strTitle','arrBranchAdmins','arrBranches','arrAdmins'));

    }

    public function create(){
        $arrBranchAdmins = Branch_Admin::all();
        
        $arrCountries = Country::all();
        $arrAreas = Area::all();
        $arrBranches = Branch::all();
        $arrcities = City::all();

        $arrAdmins = Admin::all();

    	$strTitle = 'Create Branch Admins' ;
    	return view('admin.branch_admins.create' , compact('arrcities','arrAreas','arrCountries','strTitle','arrBranchAdmins','arrBranches','arrAdmins'));
    }

    public function store(BranchAdminsRequest $request){
    	try {
            $objBranchAdmin = new Branch_Admin();
            $objBranchAdmin->fkBranchID = $request->input('fkBranchID');
            $objBranchAdmin->fkAdminID = $request->input('fkAdminID');
            $objBranchAdmin->save();
            session()->flash('success' ,'Your BranchAdmin has been added successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check data');
        }
        return Redirect::back();
    }


    public function edit($id){

    	 
    }


    public function update(BranchAdminsRequest $request , $id) {

    	 
    }


    public function destroy($id)
    {
         
        try { 
            Branch_Admin::find($id)->delete();
            Session::flash('message' , 'successfuly deleted!');
        } catch (\Exception $e){
            Session()->flash('message' ,'Error in Deleted');
        }
        return Redirect::back();
    }

}
