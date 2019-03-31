<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Department;
use Redirect ;
use App\Http\Requests\DepartmentRequest;
use Session;
use DB;
use Auth;
class DepartmentsController extends Controller
{ 
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }

    public function index(){
          
        $arrDepartments = Department::all();
    	$strTitle = "Show Departments" ;
    	return view('admin.departments.index',compact('strTitle','arrDepartments'));

    }

    public function create(){
        
    	$strTitle = 'Create Department' ;
        return view('admin.departments.create',compact('strTitle','arrDepartments'));
    	// return view('department');
    }

    public function store(DepartmentRequest $request){
        
    	try {
           $objDepartment = new Department;
           $objDepartment->fldNameAR = $request->input('fldNameAR');
           $objDepartment->fldNameEN = $request->input('fldNameEN');
           $objDepartment->fkCreatedByUserID = Auth::user()->id;
           $objDepartment->save();
            session()->flash('success' ,'Your Department has been Added Successfully');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check your data again');
        }
        return Redirect::back();
    }


    public function edit($id){

    	$objDepartment  = Department::find($id) ;
    	$strTitle = "Edit Department ";
    	return view('admin.departments.edit' , compact('objDepartment' , 'strTitle','arrJobs')) ;
    }


    public function update(DepartmentRequest $request , $id) {

    	try {
            $objDepartment  = Department::find($id) ;
            $objDepartment->fldNameAR = $request->get('fldNameAR');
            $objDepartment->fldNameEN = $request->get('fldNameEN');
            // $objDepartment->fkCreatedByUserID = Auth::user()->id;
            $objDepartment->save();
            session()->flash('success' ,'Your Department has been Updated Successfully');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check your data again');
        }
        return Redirect::back();
    }


    public function destroy($id)
    {
         
        try { 
            Department::find($id)->delete();
            Session::flash('message' , 'Successfuly Deleted!!');
        } catch (\Exception $e){
            Session()->flash('message' ,'Error in Deleted');
        }
        return Redirect::back();
    }

}
