<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\File;


class Branch extends Model
{
    protected $table = 'tbl_branches';
    protected $primaryKey='pkBranchID';

    protected $fillable = ['fldNameAR','fldNameEN','fkCityID','fldPhone1','fldPhone2','fldAddressAR','fldAddressEN'];

    public function City()
    {
        return $this->belongsTo(City::class,'fkCityID','pkCityID');
    }
    //  public function Image()
    // {
    //    return $this->hasOne(File::class,'fkTableID')->where('fldType',File::TYPE_CLIENT);
    // }
}
