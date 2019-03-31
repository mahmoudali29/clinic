<?php

namespace App\Model;
use App\Model\staff;
use App\Model\Item;
use Illuminate\Database\Eloquent\Model;
 


class Income extends Model
{

    protected $table = 'tbl_incomes';
    protected $primaryKey='pkIncomeID';

    protected $fillable =['fkItemID','fldAmount','fkCreatedByUserID'];
 
    public function items()
    {
       return $this->belongsTo(Item::class, 'fkItemID');
    }
    
}

