<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'tblmessages';
    protected $primaryKey='pkMessageID';
 
    protected $fillable = ['fldName','fldEmail','fldSubject','fldPhone','fldMessage'];
}
