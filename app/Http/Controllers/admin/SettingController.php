<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;

use Illuminate\Http\Request;
use App\Model\Setting;
use Auth;
use Config;
use Redirect;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $strTitle = "Show Settings" ;
        $arrSetting = Setting::all();
        return view('admin.settings.index',compact('strTitle','arrSetting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrSetting = Setting::all();
        $strTitle = 'Create Setting' ;
        return view('admin.settings.create',compact('strTitle','arrSetting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        try {
        $objSetting = new Setting();

        $objSetting->fldSiteNameAR = $request->fldSiteNameAR;
        $objSetting->fldSiteNameEN = $request->fldSiteNameEN;
        $objSetting->fldMinInsuranceAmount = $request->fldMinInsuranceAmount;
        
        $objSetting->fkCreatedByUserID = Auth::user()->id;
        $fldphoto = $request->fldPhoto;
        $picture = $fldphoto->store(Config::get('constants.Setting_IMAGE_PATH'));
        $objSetting->fldphoto = $picture;
        $objSetting->save();
        session()->flash('success' ,'Your Setting has been added successfully.');
    } catch (\Exception $e) {
        session()->flash('error' ,'Please check data');
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
        $objSetting = Setting::find($id);
        $strTitle = "Edit Setting ";
    	return view('admin.settings.edit' , compact('objSetting' , 'strTitle')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
         try {
            $objSetting = Setting::find($id);
    
            $objSetting->fldSiteNameAR = $request->fldSiteNameAR;
            $objSetting->fldSiteNameEN = $request->fldSiteNameEN;
            $objSetting->fldMinInsuranceAmount = $request->fldMinInsuranceAmount;
            
            // $objSetting->fkCreatedByUserID = Auth::user()->id;
            if(!empty($request->fldPhoto)){
                #check if admin uplaod new image
                
                $oldImage = $objSetting->fldphoto;

                $fldphoto = $request->fldPhoto;
                $picture = $fldphoto->store(Config::get('constants.Staff_IMAGE_PATH'));
                $objSetting->fldphoto = $picture;
                if($objSetting->save()){
                    @unlink("storage/app/".$oldImage);
             }
            }
            $objSetting->save();
            session()->flash('success' ,'Your Setting has been updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check data');
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
        //
    }
}
