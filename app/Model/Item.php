<?php

namespace App\Model;
use App\Model\staff;
use App\Model\Income;
use App\Model\Outcome;
use Illuminate\Database\Eloquent\Model;
 


class Item extends Model
{

    const TYPE_INCOME = "Incomes" ;
    const TYPE_OUTCOME   = "Outcomes" ;

    protected $table = 'tbl_items';
    protected $primaryKey='pkItemID';

    protected $fillable =['fldTitleAR','fldTitleEN','fldType','fkCreatedByUserID'];
 
    public function incomes()
    {
        return $this->hasMany(Income::class , 'fkItemID');
    }
    public function outcomes()
    {
        return $this->hasMany(Outcome::class , 'fkItemID');
    }
    
}

