<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table      = 'tbl_areas';
    protected $primaryKey = 'pkAreaID';
    protected $fillable   = ['fldNameAR','fldNameEN','fkCountryID','fkCountryID','fkCreatedByUserID'];

    public function Country()
    {
        return $this->belongsTo(Country::class, 'fkCountryID', 'pkCountryID');
    }

}
