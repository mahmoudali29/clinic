<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\File;


class Room extends Model
{
    protected $table = 'tbl_rooms';
    protected $primaryKey='pkRoomID';

    protected $fillable = ['fldNameAR','fldNameEN','fkBranchID','fkCreatedByUserID'];

    public function Branch()
    {
        return $this->belongsTo(Branch::class,'fkBranchID','pkBranchID');
    }
    //  public function Image()
    // {
    //    return $this->hasOne(File::class,'fkTableID')->where('fldType',File::TYPE_CLIENT);
    // }
}
