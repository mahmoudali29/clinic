<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Item;
use App\Model\Outcome;
use App\Http\Requests\OutcomeRequest;
use Redirect ;
use Session;
use DB;
use Auth;
class OutcomesController extends Controller
{ 
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }

    public function index(){
          
        $arrOutcomes = Outcome::all();
    	$strTitle = trans('finance.show_Outcomes');
    	return view('admin.outcomes.index',compact('strTitle','arrOutcomes'));

    }

    public function create(){
        
        $strTitle =  trans('finance.Add_New_Outcome') ;
        $arrItems=Item::where('fldType',Item::TYPE_OUTCOME)->get();
    	return view('admin.outcomes.create' , compact('strTitle','arrItems'));
    }

    public function store(OutcomeRequest $request){
    	try {
            $objOutcome=new Outcome();
            $objOutcome->fkItemID=$request->input('fkItemID');
            $objOutcome->fldAmount=$request->input('fldAmount');
            $objOutcome->fkCreatedByUserID=Auth::user()->id;
            $objOutcome->save();        
            session()->flash('success' ,trans('finance.Your_Outcome_has_been_added_successfully'));
        } catch (\Exception $e) {
            session()->flash('error' ,trans('general.Please_check_data'));
        }
        return Redirect::back();
    }


    public function edit($id){

        $objOutcome = Outcome::find($id) ;
        $arrItems=Item::where('fldType',Item::TYPE_OUTCOME)->get();
    	$strTitle =  trans('finance.edit_Outcome');
    	return view('admin.outcomes.edit' , compact('objOutcome' , 'strTitle','arrItems')) ;
    }


    public function update(OutcomeRequest $request , $id) {

    	try {
            Outcome::find($id)->update(request()->all());
            session()->flash('success' ,trans('finance.Your_Outcome_has_been_Updated_successfully'));
        } catch (\Exception $e) {
            session()->flash('error' ,trans('general.Please_check_data'));
        }
        return Redirect::back();
    }


    public function destroy($id)
    {
         
        try { 
            Outcome::find($id)->delete();
            Session::flash('message' , trans('general.successfuly_deleted'));
        } catch (\Exception $e){
            Session()->flash('message' ,trans('general.Error_in_Deleted'));
        }
        return Redirect::back();
    }

}
