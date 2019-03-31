<?php

namespace App\Model;
use App\Model\staff;
use App\Model\Item;
use Illuminate\Database\Eloquent\Model;
 


class Service extends Model
{

    protected $table = 'tbl_services';
    protected $primaryKey='pkServiceID';
    protected $fillable =['fldServiceNameAR','fldServiceNameEN','fldPrice','fldTax','fldNotes','fkCreatedByUserID'];
 
     
    
}

