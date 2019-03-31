<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
use App\Model\File;
use App\Model\Department;
use App\Model\Job ;

class Admin extends Authenticatable
{
    //use Notifiable;
    protected $guard = "admin";
    protected $table = 'tbladmins';

    const TYPE_ADMIN  = "admin" ;
    const TYPE_STAFF  = "staff" ;
    const GENDER_MALE   = "Male";
    const GENDER_FEMALE  = "Female";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fldNameAR','name','fldPhone1', 'fldPhone2','fldGender','fldAddressAR','fldAddressEN','fldDegree','fldDateOfBirth','fldPhoto','email', 'password','fkCreatedByUserID','fkDepartmentID','fkJobID','type','fkCountryID','fkAreaID','fkCityID','fkBranchID'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
//override to original one from illuminate/auth/passwords/canreset
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function file()
    {
        return $this->hasOne(File::class,'fkTableID')->where('fldType',File::TYPE_ADMIN);
    }
    public function job()
    {
        return $this->belongsTo(Job::class,'fkJobID','pkJobID');
    }
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
