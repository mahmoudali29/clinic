<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminResetPassword;
use App\Http\Requests\AdminRequest;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DB;
use Config;
use Session;
use Redirect;
use App\Model\File;
use App\Model\Admin;
use App;

class AdminController extends Controller
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

    public function adminProfile()
    {
        return view('admin.profile.admin_profile');
    }


    public function dashboard()
    {
        $strTitle = "Dashboard";
        return view('admin.dashboard', compact('strTitle'));
    }


    public function index()
    {
        $this->Header();
        $arrAdmins = Admin::all();         
        $strTitle = "Show Admins";
        return view('admin.admins.index' , compact('strTitle' , 'arrAdmins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $strTitle = "Add New Admin";
        return view('admin.admins.create' , compact('strTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(AdminRequest $request)
    {
        //DB::beginTransaction();
        $filename = "";
        try {
            DB::transaction(function()use($request){
                try{
                    $objadmin = new Admin;
                    $objadmin->name     = $request->name;
                    $objadmin->email    = $request->email;
                    $objadmin->password = Hash::make($request->password);
                    $objadmin->save();
                    $file = $request->file;
                    $filename = $file->store(Config::get('constants.ADMIN_IMAGE_PATH'));
                    $objFile = new File();
                    $objFile->fkTableID = $objadmin->id; 
                    $objFile->fldFile = $filename;
                    $objFile->fldType = File::TYPE_ADMIN; 
                    $objFile->save();
                    //DB::commit();
                    session()->flash('success' ,'Your Admin has been added successfully.');
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
        $objAdmin = Admin::find($id);
        $objImage = $objAdmin->file;
        $strTitle = "Edit Admin Data";
        return view('admin.admins.edit' , compact('strTitle', 'objAdmin' ,'objImage'));
    }

    
    public function update(AdminRequest $request, $id)
    {

        DB::transaction(function()use($id,$request){
            try{
                $objadmin = Admin::find($id);
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
                        session()->flash('success' ,'Success Update.');

                    }
                }
            }
            catch (\Exception $e){
                Session::flash('message' , 'Something Wrong!');
            }
            
            
        });
        return Redirect::back();
    }

    
    public function destroy($id)
    {
        try{
            $objadmin = Admin::find($id);
            $objadmin->delete();
            Session::flash('message' , 'The Admin is successfuly deleted!');   
        }catch (\Exception $e){
            Session::flash('message' , 'Something Wrong!');
        }
        return Redirect()->route('admins.index');
    }

    public function passwordForm($id)
    {
        $objAdmin = Admin::find($id);
        $strTitle = "Reset Password";
        return view('admin.admins.resetPassword' , compact('strTitle', 'objAdmin'));
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
    public function Header(){

        $strlanguage=Session('strlanguage')==null?"en":session('strlanguage');
        App::setLocale($strlanguage); 
    }

    public function ChangeLanguage($language)
    {
        Session(['strlanguage' => $language]);
        return Redirect::back();
    }

}
