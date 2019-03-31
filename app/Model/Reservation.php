<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\File;


class Reservation extends Model
{
    protected $table = 'tbl_reservations';
    protected $primaryKey='pkReservationID';

    protected $fillable = ['fldAppointmentID','fkDoctorID','fkPatientID','fldDate','fldAppointment','fldNotes','fkRoomID','fkCreatedByUserID'];

    public function Patients()
    {
        return $this->belongsTo(Patient::class, 'fkPatientID');
    }

    public function Doctors()
    {
        return $this->belongsTo(Admin::class, 'fkDoctorID');
    }
}
