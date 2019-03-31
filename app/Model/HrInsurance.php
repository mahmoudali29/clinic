<?php

namespace App\Model;
use App\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class HrInsurance extends Model
{
    protected $table = 'tbl_hr_insurances';
    protected $primaryKey='pkInsuranceID';

    protected $fillable =['fldBasicMin','fldBasicMax','fldVariableMin','fldVariableMax','Start_Date','End_Date','fkCreatedByUserID'];
    
    public function Admin()
    {
       return $this->hasMany(Admin::class,'fkInsuranceID');
    }  



}
