<?php

namespace App\Model;
use App\Model\Admin;
use App\Model\HrSalary;
use App\Model\HrAllowance;
use App\Model\Job;
use Illuminate\Database\Eloquent\Model;
 


class Department extends Model
{

    protected $table = 'tbl_departments';
    protected $primaryKey='pkDepartmentID';

    protected $fillable =['fldNameAR','fldNameEN','fkCreatedByUserID'];
 
   public function Jobs()
   {
	  return $this->hasmany(Job::class,'fkDepartmentID');
   }
    public function Admin()
   {
	  return $this->hasmany(Admin::class,'fkDepartmentID');
   }

   public function HrSalary()
    {
       return $this->hasmany(HrSalary::class,'fkDepartmentID');
    }

    public function HrAllowance()
    {
       return $this->hasmany(HrAllowance::class,'fkDepartmentID');
    }
}

