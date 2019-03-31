<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Department;
use App\Model\Admin;
use App\Model\HrSalary;

class Job extends Model
{

    protected $table = 'tbl_jobs';
    protected $primaryKey='pkJobID';

    protected $fillable =['fldNameAR','fkDepartmentID','fldNameEN','fkCreatedByUserID'];

    public function Department()
    {
	   return $this->belongsTo(Department::class,'fkDepartmentID','pkDepartmentID');
    }

    public function Admin()
    {
       return $this->hasmany(Admin::class,'fkJobID');
    }

    public function HrSalary()
    {
       return $this->hasmany(HrSalary::class,'fkJobID');
    }
    
    public function HrAllowance()
    {
       return $this->hasmany(HrAllowance::class,'fkDepartmentID');
    }
}

