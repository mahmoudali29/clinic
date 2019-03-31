<?php

namespace App\Model;
use App\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class HrAllowance extends Model
{
    protected $table = 'tbl_hr_allowances';
    protected $primaryKey='pkAllowanceID';
    const TYPE_FIXED   = "fixed";
    const TYPE_VARIABLE  = "variable";
    protected $fillable =['fkStaffID','Allowance','Start_Date','End_Date','fkCreatedByUserID','fldType'];
 
    public function Admin()
    {
       return $this->belongsTo(Admin::class,'fkStaffID','id');
    }  

   //  public function Job()
   // {
	//   return $this->belongsTo(Job::class,'fkJobID' , 'pkJobID');
   // }

   // public function Department()
   // {
   //    return $this->belongsTo(Department::class,'fkDepartmentID','pkDepartmentID');
   // }


}
