<?php
namespace App\Http\Controllers\admin;
use App\Http\Requests\AdminResetPassword;
use App\Http\Requests\StaffRequest;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\WorkingTimeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;
use Config;
use Session;
use Redirect;
use App\Model\Branch ;
use App\Model\City ;
use App\Model\Country ;
use App\Model\Area ;
use App\Model\File;
use App\Model\Admin;
use App\Model\Department;
use App\Model\Job ;
use Auth;
use App\Model\StaffWorking; 
class StaffController extends Controller
{ 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

     

    public function index()
    {
        $arrCountries = Country::all();
        $arrAreas = Area::all();
        $arrBranches = Branch::all();
        $arrcities = City::all();
        $arrjobs = Job::all();
        $arrDepartments = Department::all();
        $arrAdmins = Admin::where('type',Admin::TYPE_STAFF)->get();         
        $strTitle = "Show Staffs";
        return view('admin.staffs.index' , compact('arrcities','arrBranches','arrAreas','arrCountries','strTitle' , 'arrAdmins','arrjobs','arrDepartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrAdmins = Admin::all();
        $arrCountries = Country::all();
        $arrAreas = Area::all();
        $arrBranches = Branch::all();
        $arrcities = City::all();
        $arrjobs = Job::all();
        $objadmin  = new Admin ; 

        $arrDepartments = Department::all();
        $strTitle = "Add New Staff";
        return view('admin.staffs.create' , compact('arrAdmins','objadmin','arrcities','arrBranches','arrAreas','arrCountries','strTitle','arrDepartments','arrjobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StaffRequest $request)
    {
        //DB::beginTransaction();
        $filename = "";
        try {
            DB::transaction(function()use($request){
                try{
                    $objadmin = new Admin;
                    $objadmin->fldNameAR     = $request->fldNameAR;
                    $objadmin->fldDegree     = $request->fldDegree;
                    $objadmin->name     = $request->name;
                    $objadmin->fldPhone1     = $request->fldPhone1;
                    $objadmin->fldPhone2     = $request->fldPhone2;
                    $objadmin->fldAddressAR     = $request->fldAddressAR;
                    $objadmin->fldAddressEN     = $request->fldAddressEN;
                    $objadmin->fldDateOfBirth     = $request->fldDateOfBirth;
                    $objadmin->fkCreatedByUserID = Auth::user()->id;
                    $objadmin->fkDepartmentID     = $request->fkDepartmentID;
                    
                    $objadmin->fkJobID     = $request->fkJobID;
                    $objadmin->fkCountryID     = $request->fkCountryID;
                    $objadmin->fldGender     = $request->fldGender;
                    $objadmin->fkAreaID     = $request->fkAreaID;
                    $objadmin->fkCityID     = $request->fkCityID;
                    $objadmin->fkBranchID     = $request->fkBranchID;
                    $objadmin->email    = $request->email;
                    
                    $objadmin->password = Hash::make($request->password);
                    $objadmin->type = Admin::TYPE_STAFF ; 
                    $objadmin->save();
                    $file = $request->file;
                    $filename = $file->store(Config::get('constants.Staff_IMAGE_PATH'));
                    $objFile = new File();
                    $objFile->fkTableID = $objadmin->id; 
                    $objFile->fldFile = $filename;
                    $objFile->fldType = File::TYPE_ADMIN; 
                    $objFile->save();
                    //DB::commit();
                    session()->flash('success' ,'Your Staff has been added successfully.');
                }
                catch (\Exception $e) {
                    unlink("storage/app/".$filename); 
                    session()->flash('error' ,'Please Check Data!!!');
                }
                
            });    
        } catch (\Exception $e) {
            //DB::rollback();
            session()->flash('error' ,'Please Check Data!!!');
        }
        return Redirect::back();
    }

    public function edit($id)
    {
        $objBranch  = Branch::find($id) ;
        $objcities  = City::find($id) ;
        $objcountries  = Country::find($id) ;
        $objareas  = Area::find($id) ;
        $arrCountries = Country::all();
        $objadmin = Admin::find($id);
        $objImage = $objadmin->file;
        $objDepartment  = Department::find($id) ;
        $objectjob = Job::find($id) ;
        $arrjobs = Job::all();
        $arrDepartments = Department::all();
        $pkCountryID = $objadmin->Branch->City->Area->Country->pkCountryID ; 
        $arrAreas = Area::where('fkCountryID',$pkCountryID)->get();
        
        $fkAreaID = $objadmin->Branch->City->Area->pkAreaID ; 
        $arrCities = City::where('fkAreaID',$fkAreaID)->get();
        $fkCityID =  $objadmin->Branch->City->pkCityID;
        $arrBranches = Branch::where('fkCityID',$fkCityID)->get();

        $strTitle = "Edit Staff";
        return view('admin.staffs.edit' , compact('arrjobs','arrDepartments','strTitle', 'objadmin' ,'objImage','arrBranches','objcities','objcountries','objareas','arrCountries','arrAreas','arrCities','objBranch'));
    }

    
    public function update(StaffRequest $request, $id)
    {
        $arrjobs = Job::all();
        $arrDepartments = Department::all();
        DB::transaction(function()use($id,$request){
            try{
                $objadmin = Admin::find($id);
                $objadmin->fldNameAR     = $request->fldNameAR;
                $objadmin->fldDegree     = $request->fldDegree;
                $objadmin->fldPhone1     = $request->fldPhone1;
                $objadmin->fldPhone2     = $request->fldPhone2;
                $objadmin->fldAddressAR     = $request->fldAddressAR;
                $objadmin->fldAddressEN     = $request->fldAddressEN;
                $objadmin->fldDateOfBirth     = $request->fldDateOfBirth;
                // $objadmin->fkCreatedByUserID = Auth::user()->id;
                $objadmin->fkDepartmentID     = $request->fkDepartmentID;
                
                $objadmin->fkJobID     = $request->fkJobID;
                $objadmin->fkCountryID     = $request->fkCountryID;
                $objadmin->fldGender     = $request->fldGender;
                $objadmin->fkAreaID     = $request->fkAreaID;
                $objadmin->fkCityID     = $request->fkCityID;
                $objadmin->fkBranchID     = $request->fkBranchID;
                $objadmin->name     = $request->name;
                $objadmin->email    = $request->email;
                $objadmin->save();

                if(!empty($request->file)){
                    #check if admin uplaod new image
                    $objFile = $objadmin->file;
                    $oldImage = $objFile->fldFile;
                    $file = $request->file;
                    $filename = $file->store(Config::get('constants.ADMIN_IMAGE_PATH'));
                    $objFile->fldFile = $filename;
                    if($objFile->save()){
                        unlink("storage/app/".$oldImage); 

                    }
                }
                session()->flash('success' ,'Your Staff has been Successfully Updated.');
            }
            catch (\Exception $e){
                Session::flash('error' , 'Something Wrong!');
            }
            
            
        });
        return Redirect::back();
    }

    
    public function destroy($id)
    {
        try{
            $objadmin = Admin::find($id);
            $objadmin->delete();
            Session::flash('message' , 'Successfuly Deleted!!');   
        }catch (\Exception $e){
            Session::flash('message' , 'Please check data');
        }
        return Redirect::back();
    }

    public function passwordForm($id)
    {
        $objAdmin = Admin::find($id);
        $strTitle = "Reset Password";
        return view('admin.staffs.resetPassword' , compact('strTitle', 'objAdmin'));
    }

    
    public function passwordupdate(AdminResetPassword $request, $id)
    {
        try{
            $objAdmin = Admin::find($id);
            $objAdmin->password = hash::make($request->password);
            $objAdmin->save();
            session()->flash('success' ,'Password has been updated successfully.');
        } catch(\Exception $e) {
            session()->flash('error' ,'Please check data');
        }

        return Redirect::back();
    }
    public function GetStaffs($job_id)
    {
        $arrAdmins = Admin::where('fkJobID',$job_id)->get();
        return response($arrAdmins, 200) ;   /// json 
         
    }

    public function workingtime($id)
    {
        $id = $id;
        $arrWorkingtime=StaffWorking::where('fkStaffID',$id)->get();
        $strTitle = "Working Time";
        return view('admin.staffs.staffworking' , compact('strTitle', 'id','arrWorkingtime'));
    }
    public function addworkingtime(WorkingTimeRequest $request, $id)
    {
        try{

            foreach ($request->fldDay as $key => $value) {
                $objStaffWorking = new StaffWorking;
                $objStaffWorking->fkStaffID     = $id;
                $objStaffWorking->fldDay    = $value;
                $objStaffWorking->fldFromHour    = $request->fldFromHour;
                $objStaffWorking->fldToHour    = $request->fldToHour;
                $objStaffWorking->fldPatientTime    = 20;
                $objStaffWorking->fkCreatedByUserID    = Auth::user()->id;
                $objStaffWorking->save();
            }
            
            session()->flash('success' ,'Working Time has been Added successfully.');
        } catch(\Exception $e) {
            session()->flash('error' ,'Please check data');
        }

        return Redirect::back();
    }

    public function deleteworktime($id,$staffID)
	{
        try{
            $objStaffWorking = StaffWorking::find($id);
            $objStaffWorking->delete();
            Session::flash('message' , 'The Work Time is successfuly deleted!');   
        }catch (\Exception $e){
            Session::flash('message' , 'Something Wrong!');
        }
        return Redirect::back();

		 
    }	
    public function GetAdmins($job_id)
    {
        $arrAdmins = Admin::where('fkJobID',$job_id)->get();
        return response($arrAdmins, 200) ;   /// json 
         
    }

    public function GetLoanStaffs($job_id)
    {
        $arrAdmins = Admin::where('fkJobID',$job_id)
        ->where('type',Admin::TYPE_STAFF)
        ->get();
        return response($arrAdmins, 200);   /// json 
         
    }

}
