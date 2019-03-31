<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Item;
use App\Model\Income;
use App\Http\Requests\IncomeRequest;
use Redirect ;
use Session;
use DB;
use Auth;
class IncomesController extends Controller
{ 
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }

    public function index(){
          
        $arrIncomes = Income::all();
    	$strTitle = trans('finance.show_Incomes');
    	return view('admin.incomes.index',compact('strTitle','arrIncomes'));

    }

    public function create(){
        
        $strTitle =  trans('finance.Add_New_Income') ;
        $arrItems=Item::where('fldType',Item::TYPE_INCOME)->get();
    	return view('admin.incomes.create' , compact('strTitle','arrItems'));
    }

    public function store(IncomeRequest $request){
    	try {
            $objIncome=new Income();
            $objIncome->fkItemID=$request->input('fkItemID');
            $objIncome->fldAmount=$request->input('fldAmount');
            $objIncome->fkCreatedByUserID=Auth::user()->id;
            $objIncome->save();        
            session()->flash('success' ,trans('finance.Your_Income_has_been_added_successfully'));
        } catch (\Exception $e) {
            session()->flash('error' ,trans('general.Please_check_data'));
        }
        return Redirect::back();
    }


    public function edit($id){

        $objIncome = Income::find($id) ;
        $arrItems=Item::where('fldType',Item::TYPE_INCOME)->get();
    	$strTitle =  trans('finance.edit_Income');
    	return view('admin.incomes.edit' , compact('objIncome' , 'strTitle','arrItems')) ;
    }


    public function update(IncomeRequest $request , $id) {

    	try {
            Income::find($id)->update(request()->all());
            session()->flash('success' ,trans('finance.Your_Income_has_been_Updated_successfully'));
        } catch (\Exception $e) {
            session()->flash('error' ,trans('general.Please_check_data'));
        }
        return Redirect::back();
    }


    public function destroy($id)
    {
         
        try { 
            Income::find($id)->delete();
            Session::flash('message' , trans('general.successfuly_deleted'));
        } catch (\Exception $e){
            Session()->flash('message' ,trans('general.Error_in_Deleted'));
        }
        return Redirect::back();
    }

}
