<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Model\Client;
use App\Model\File;
use Session;
use Redirect;
use DB;
use Config;

class ClientController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrClients = Client::all();
        $strTitle = "Show Clients Data";
        return view('admin.clients.index' , compact('strTitle','arrClients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $strTitle = "Add New Client";
        return view('admin.clients.create' , compact('strTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        
        DB::beginTransaction();
        try{
            $objClient = new Client;
            $objClient->fldName  = $request->fldName ;
            $objClient->fldURL   = $request->fldURL ;
            $objClient->fldType  = "client" ;
            $objClient->save();
            $file = $request->file;
            $filename = $file->store(Config::get('constants.CLIENT_IMAGE_PATH'));
            $objFile = new File();
            $objFile->fkTableID = $objClient->pkClientID; 
            $objFile->fldFile = $filename;
            $objFile->fldType = File::TYPE_CLIENT; 
            $objFile->save();
            DB::commit();
            Session::flash('success' , 'Your Client has been added successfully.'); 
        } catch (\Exception $e){
            DB::rollback();
            Session::flash('error' , 'Something Wrong!');
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
        $objClient = Client::find($id);
        $objImage = $objClient->file;
        $Type = $objClient->fldType;
        $strTitle = "Edit Client Data ";
        return view('admin.clients.edit' , compact('strTitle','Type' , 'objClient','objImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        DB::beginTransaction();
        try{
            $objClient = Client::find($id);
            $objClient->fldName  = $request->fldName ;
            $objClient->fldURL   = $request->fldURL ;
            $objClient->fldType  = "client" ;
            $objClient->save();
            if(!empty($request->file)){
                #check if admin uplaod new image
                $objFile = $objClient->file;
                $oldImage = $objFile->fldFile;
                $file = $request->file;
                $filename = $file->store(Config::get('constants.CLIENT_IMAGE_PATH'));
                $objFile->fldFile = $filename;
                if($objFile->save()){
                    unlink("storage/app/".$oldImage); 
                    Session::flash('success' , 'Your Client has been updated successfully.'); 
                }
            }
            DB::commit();
        } catch (\Exception $e){
            DB::rollback();
            Session::flash('error' , 'Something Wrong!');
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
        DB::beginTransaction();
        try{
            $objClient = Client::find($id);
            $objFile = $objClient->file;
            if( $objFile->fldType == "client" ) {
                unlink("storage/app/".$objFile->fldFile); 
                $objFile->delete();
            }    
            $objClient->delete();
            DB::commit();
            Session::flash('message' , 'Successfuly deleted!'); 
        } catch (\Exception $e){
            DB::rollback();
            Session::flash('message' , 'Something Wrong!');
        }
        return redirect()->route('clients.index');
    }
}
