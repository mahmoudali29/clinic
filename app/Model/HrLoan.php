<?php

namespace App\Model;
use App\Model\Admin;
use App\Model\Department;
use App\Model\Job;
use Illuminate\Database\Eloquent\Model;

class HrLoan extends Model
{
   const PAID          = "Paid";
   const UNPAID        = "Unpaid";

    protected $table = 'tbl_hr_loans';
    protected $primaryKey ='pkLoanID';

    protected $fillable =['fkStaffID','fldAmount','fkCreatedByUserID' , 'fldStatus' , 'fldDate'];
 
    public function Admin()
    {
       return $this->belongsTo(Admin::class,'fkStaffID','id');
    }
}
