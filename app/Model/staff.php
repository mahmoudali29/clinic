<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
 


class staff extends Model
{
    const TYPE_Department = "Department" ;
    const TYPE_Job = "Job" ;

    protected $table = 'tblstaff';
    protected $primaryKey='pkStaffID';

    protected $fillable =['fldName','fldEmail','fldPassword','fldType','fkJopID','fkDepartmentID'];
 
    public function Jobs()
    {
	  return $this->hasmany(Job::class,'fkJopID','pkStaffID')->where('fldType',File::TYPE_Job);
    }

    public function Reservations()
    {
        return $this->hasMany(Reservation::class , 'fkPatientID');
    }
    
}

