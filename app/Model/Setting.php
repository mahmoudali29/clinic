<?php

namespace App\Model;
use App\Model\staff;
use Illuminate\Database\Eloquent\Model;
 


class Setting extends Model
{

    protected $table = 'tbl_setting';
    protected $primaryKey='pkSettingID';

    protected $fillable =['fldSiteNameAR','fldSiteNameEN','fldPhoto','fkCreatedByUserID','fldMinInsuranceAmount'];
 
//     public function Jobs()
//    {
// 	  return $this->hasmany(Job::class,'fkDepartmentID');
//    }
   //  public function staff()
   // {
	  // return $this->belongsTo(staff::class,'fkDepartmentID','pkStaffID');
   // }
}

