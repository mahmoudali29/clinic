<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Service;
use App\Http\Requests\ServiceRequest;
use Redirect ;
use Session;
use DB;
use Auth;
class ServicesController extends Controller
{ 
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }

    public function index(){
          
        $arrServices = Service::all();
    	$strTitle = "Show Services";
    	return view('admin.services.index',compact('strTitle','arrServices'));

    }

    public function create(){
        
        $strTitle = "Add New Service" ;
    	return view('admin.services.create' , compact('strTitle'));
    }

    public function store(ServiceRequest $request){
    	try {
            $objService =new Service();
            $objService->fldServiceNameAR=$request->input('fldServiceNameAR');
            $objService->fldServiceNameEN=$request->input('fldServiceNameEN');
            $objService->fldPrice=$request->input('fldPrice');
            $objService->fldTax=$request->input('fldTax');
            $objService->fldNotes=$request->input('fldNotes');
            $objService->fkCreatedByUserID=Auth::user()->id;
            $objService->save();        
            session()->flash('success' ,'Your Service has been Created successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,trans('general.Please_check_data'));
        }
        return Redirect::back();
    }


    public function edit($id){

        $objService = Service::find($id) ;
    	$strTitle =  "Edit Service";
    	return view('admin.services.edit' , compact('objService' , 'strTitle')) ;
    }


    public function update(ServiceRequest $request , $id) {

    	try {
            Service::find($id)->update(request()->all());
            session()->flash('success' ,'Your Service has been Updated successfully');
        } catch (\Exception $e) {
            session()->flash('error' ,trans('general.Please_check_data'));
        }
        return Redirect::back();
    }


    public function destroy($id)
    {
         
        try { 
            Service::find($id)->delete();
            Session::flash('message' , trans('general.successfuly_deleted'));
        } catch (\Exception $e){
            Session()->flash('message' ,trans('general.Error_in_Deleted'));
        }
        return Redirect::back();
    }

}
