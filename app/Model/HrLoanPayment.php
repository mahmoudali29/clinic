<?php

namespace App\Model;
use App\Model\Admin;
use App\Model\HrLoan;
use Illuminate\Database\Eloquent\Model;

class HrLoanPayment extends Model
{
    const PAID          = "Paid";
    const UNPAID        = "Unpaid";
    
    protected $table = 'tbl_hr_loans_payments';
    protected $primaryKey ='pkLoanPaymentID';

    protected $fillable =['fkLoanID','fldAmount','fkCreatedByUserID' , 'fldDate'];

    public function HrLoan()
    {
       return $this->belongsTo(HrLoan::class,'fkLoanID','pkLoanID');
    }    
}
