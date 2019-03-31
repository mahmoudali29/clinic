<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\File;


class Client extends Model
{
    protected $table = 'tblclients';
    protected $primaryKey='pkClientID';

    protected $fillable = ['fldName','fldURL','fldType'];

    public function file()
    {
        return $this->hasOne(File::class,'fkTableID')->where('fldType',File::TYPE_CLIENT);
    }
     public function Image()
    {
       return $this->hasOne(File::class,'fkTableID')->where('fldType',File::TYPE_CLIENT);
    }
}
