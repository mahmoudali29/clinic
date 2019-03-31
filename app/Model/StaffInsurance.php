<?php

namespace App\Model;
use App\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class StaffInsurance extends Model
{
    protected $table = 'tbl_staffs_insurances';
    protected $primaryKey='pkStaffInsuranceID';

    protected $fillable =['fkStaffID','fkInsuranceID','fkCreatedByUserID','fldMinFixAmount','fldMaxVarAmount'];

    public function Admin()
    {
       return $this->belongsTo(Admin::class,'fkStaffID','id');
    }

    public function Insurance()
    {
       return $this->belongsTo(HrInsurance::class,'fkInsuranceID' , 'pkInsuranceID');
    }

}
