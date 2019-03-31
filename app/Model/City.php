<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'tbl_cities';
    protected $primaryKey='pkCityID';
    protected $fillable =['fkAreaID','fldNameEN','fldNameAR' ,'fkCreatedByUserID'];

    public function Area()
    {
        return $this->belongsTo(Area::class,'fkAreaID','pkAreaID');
    }
}
