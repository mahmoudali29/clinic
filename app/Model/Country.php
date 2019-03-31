<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table      = 'tbl_countries';
    protected $primaryKey = 'pkCountryID';
    protected $fillable   = ['fldNameAR' , 'fldNameEN','fkCreatedByUserID'];

    public function Cities()
    {
        return $this->hasmany(City::class, 'fkCountryID');
    }
}
