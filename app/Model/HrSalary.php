<?php

namespace App\Model;
use App\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class HrSalary extends Model
{
    protected $table = 'tbl_hr_salaries';
    protected $primaryKey='pkSalaryID';

    protected $fillable =['fkStaffID','Salary','Start_Date','End_Date','fkCreatedByUserID'];
 
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
