<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Item;
use App\Http\Requests\ItemRequest;
use Redirect ;
use Session;
use DB;
use Auth;
class ItemsController extends Controller
{ 
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }

    public function index(){
          
        $arrItems = Item::all();
    	$strTitle = trans('finance.show_Items');
    	return view('admin.items.index',compact('strTitle','arrItems'));

    }

    public function create(){
        
    	$strTitle =  trans('finance.Add_New_Item') ;
    	return view('admin.items.create' , compact('strTitle'));
    }

    public function store(ItemRequest $request){
    	try {
            $objItem=new Item();
            $objItem->fldTitleAR=$request->input('fldTitleAR');
            $objItem->fldTitleEN=$request->input('fldTitleEN');
            $objItem->fldType=$request->input('fldType');
            $objItem->fkCreatedByUserID=Auth::user()->id;
            $objItem->save();        
            session()->flash('success' ,trans('finance.Your_Item_has_been_added_successfully'));
        } catch (\Exception $e) {
            session()->flash('error' ,trans('general.Please_check_data'));
        }
        return Redirect::back();
    }


    public function edit($id){

    	$objItem = Item::find($id) ;
    	$strTitle =  trans('finance.edit_Item');
    	return view('admin.items.edit' , compact('objItem' , 'strTitle')) ;
    }


    public function update(ItemRequest $request , $id) {

    	try {
            Item::find($id)->update(request()->all());
            session()->flash('success' ,trans('finance.Your_Item_has_been_Updated_successfully'));
        } catch (\Exception $e) {
            session()->flash('error' ,trans('general.Please_check_data'));
        }
        return Redirect::back();
    }


    public function destroy($id)
    {
         
        try { 
            Item::find($id)->delete();
            Session::flash('message' , trans('general.successfuly_deleted'));
        } catch (\Exception $e){
            Session()->flash('message' ,trans('general.Error_in_Deleted'));
        }
        return Redirect::back();
    }

}
