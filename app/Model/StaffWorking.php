<?php

namespace App\Model;
use App\Model\staff;
use App\Model\Income;
use App\Model\Outcome;
use Illuminate\Database\Eloquent\Model;
 


class StaffWorking extends Model
{

    protected $table = 'tbl_staff_worktime';
    protected $primaryKey='pkStaffWorktimeID';

    protected $fillable =['fkStaffID','fldDay','fldFromHour','fldToHour','fldPatientTime','fkCreatedByUserID'];
 
 
    
}

