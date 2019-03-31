<?php

namespace App\Model;
use App\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class HrDeduction extends Model
{
    protected $table = 'tbl_hr_deductions';
    protected $primaryKey='pkDeductionID';

    protected $fillable =['fkStaffID','fldTheAmount','fldHistory','fkCreatedByUserID'];
 
    public function Admin()
    {
       return $this->belongsTo(Admin::class,'fkStaffID','id');
    }  
}
