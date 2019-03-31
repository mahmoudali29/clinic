<?php

namespace App\Model;
use App\Model\staff;
use App\Model\Item;
use Illuminate\Database\Eloquent\Model;
 


class Outcome extends Model
{

    protected $table = 'tbl_outcomes';
    protected $primaryKey='pkOutcomeID';

    protected $fillable =['fkItemID','fldAmount','fkCreatedByUserID'];
 
    public function items()
    {
       return $this->belongsTo(Item::class, 'fkItemID');
    }
    
}

