<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\File;


class ReservationPayment extends Model
{
    protected $table = 'tbl_reservations_payment';
    protected $primaryKey='pkReservationPaymentID';

    protected $fillable = ['fkReservationID','fldAmount','fldPaidAmount','fldRemainingAmount','fldPaymentType','fldNotes','fkCreatedByUserID'];

    

     
}
