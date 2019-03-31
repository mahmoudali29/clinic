<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    const GENDER_MALE          = "Male";
    const GENDER_FEMALE        = "Female";

    protected $table = 'tbl_patients';
    protected $primaryKey='pkPatientID';
    protected $fillable =['fkAreaID','fldNameEN','fldNameAR','fldPhone1','fldPhone2','fldGender','fldAddressAR','fldAddressEN','fldDateOfBirth','fldEmail','fldPhoto','fkCountryID','fkCityID','fkBranchID','fkCreatedByUserID'];
    
    public function Country()
    {
        return $this->belongsTo(Country::class, 'fkCountryID', 'pkCountryID');
    }
    public function Area()
    {
        return $this->belongsTo(Area::class, 'fkAreaID', 'pkAreaID');
    }
    public function City()
    {
        return $this->belongsTo(City::class, 'fkCityID', 'pkCityID');
    }
    public function Branch()
    {
        return $this->belongsTo(Branch::class, 'fkBranchID', 'pkBranchID');
    }

    public function Reservations()
    {
        return $this->hasMany(Reservation::class , 'fkPatientID');
    }

    
}
