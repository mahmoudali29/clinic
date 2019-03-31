<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Job ;
use App\Model\Department ;
use App\Http\Requests\JobRequest;

 use Redirect ;
 use Auth;
 use Session;
// use App\Http\Requests\FAQRequest ;
use DB;
use App\Model\Admin;
class JobsController extends Controller
{
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }
    public function index(){
        $arrjobs = Job::all();
        $strTitle = "Show Jobs" ;
       
        return view('admin.jobs.index',compact('strTitle','arrjobs'));

    }

    public function create(){
       
        $strTitle = 'Create Jobs' ;
        $arrjobs = Job::all();
        $arrDepartments = Department::all();
       
        return view('admin.jobs.create' , compact('strTitle','arrDepartments','arrjobs'));
 
    }

    public function store(JobRequest $request){
        try {
           
            $objJob = new Job ;
            $objJob->fldNameAR = $request->input('fldNameAR');
            $objJob->fldNameEN = $request->input('fldNameEN');
            $objJob->fkDepartmentID = $request->input('fkDepartmentID');
            $objJob->fkCreatedByUserID = Auth::user()->id;
            $objJob->save();
            session()->flash('success' ,'Your Job has been Successfully Added.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please Check Your Data');
        }
        return Redirect::back();

    }


    public function edit($id){
        
        $arrDepartments = Department::all();
        $objectjob = Job::find($id) ;
        $strTitle = "Edit Job ";
        return view('admin.jobs.edit' , compact('objectjob','strTitle','arrDepartments')) ;
        
    }


    public function update(JobRequest $request , $id) {

             
        try { 
            $objJob = Job ::find( $id) ;
            $objJob->fldNameAR = $request->get('fldNameAR');
            $objJob->fldNameEN = $request->get('fldNameEN');
            $objJob->fkDepartmentID = $request->get('fkDepartmentID');
           
            $objJob->save();

            session()->flash('success' ,'Your Job has been Successfully Updated.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please Check Your Data');
        }
        return Redirect::back();
    }


    public function destroy($id)
    {
        
        try { 
           Job::find($id)->delete();
            Session::flash('success' , 'Successfuly Deleted!!');
        } catch (\Exception $e){
            Session()->flash('error' ,'Please check data');
        }
        return Redirect::back();
    }

    public function GetJobs($fkDepartmentID)
    {
        $arrjobs = Job::where('fkDepartmentID',$fkDepartmentID)->get();
        return response($arrjobs, 200) ;   /// json 
         
    }
  
}
