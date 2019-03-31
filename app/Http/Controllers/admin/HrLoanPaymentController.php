<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\HrLoanRequest;
use App\Http\Requests\HrLoanPaymentRequest;
use App\Http\Controllers\Controller;
use App\Model\HrLoan;
use App\Model\HrLoanPayment;
use Redirect;
use Session;
use DB;
use Auth;
use App\Model\Admin;

class HrLoanPaymentController extends Controller
{

    public function __construct()
    {
        # check if admin login
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $strTitle = 'Refund Loan';
        $objLoan = HrLoan::find($id);
        $TotalLoan = $objLoan->fldAmount;
        $TotalPayment = HrLoanPayment::where('fkLoanID',$objLoan->pkLoanID)
        ->sum('fldAmount');
        $RemainAmount = $TotalLoan - $TotalPayment;
        $arrPaymentsLoans = HrLoanPayment::where('fkLoanID',$objLoan->pkLoanID)->get();
        return view('admin.hr_loans_payments.create',compact('strTitle','objLoan' , 'TotalLoan' , 'TotalPayment' , 'RemainAmount' , 'arrPaymentsLoans')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HrLoanPaymentRequest $request,$id)
    {        
        try {
            #insert
            $objLoan = HrLoan::find($id);
            $TotalLoan = $objLoan->fldAmount;
            $TotalPayment = HrLoanPayment::where('fkLoanID',$objLoan->pkLoanID)->sum('fldAmount');
            $RemainAmount = $TotalLoan - $TotalPayment;

            if($request->input('fldAmount') > $RemainAmount){
                session()->flash('error' ,'Paid Amount Greater than Remainning');
                return Redirect::back();

            }
            if($request->input('fldAmount') == $RemainAmount){
                $objLoanPayment = new HrLoanPayment();
                $objLoanPayment->fldAmount = $request->input('fldAmount');
                $objLoanPayment->fkLoanID = $objLoan->pkLoanID;
                $objLoanPayment->fldDate = $request->input('fldDate');
                $objLoanPayment->fkCreatedByUserID = Auth::user()->id;
                $objLoanPayment->save();
                $objLoan->fldStatus = HrLoan::PAID;
                $objLoan->save();
            }
            if($request->input('fldAmount') < $RemainAmount){
                $objLoanPayment = new HrLoanPayment();
                $objLoanPayment->fldAmount = $request->input('fldAmount');
                $objLoanPayment->fkLoanID = $objLoan->pkLoanID;
                $objLoanPayment->fldDate = $request->input('fldDate');
                $objLoanPayment->fkCreatedByUserID = Auth::user()->id;
                $objLoanPayment->save();                 
            }

            session()->flash('success' ,'Your Loan Payment has been added successfully.');
        } catch (\Exception $e) {
            session()->flash('error' ,'Please check data');
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HrLoanPayment  $hrLoanPayment
     * @return \Illuminate\Http\Response
     */
    // public function show(HrLoanPayment $hrLoanPayment)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\HrLoanPayment  $hrLoanPayment
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(HrLoanPayment $hrLoanPayment)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\HrLoanPayment  $hrLoanPayment
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, HrLoanPayment $hrLoanPayment)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\HrLoanPayment  $hrLoanPayment
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(HrLoanPayment $hrLoanPayment)
    // {
    //     //
    // }
}
