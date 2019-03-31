<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\File;


class Branch_Admin extends Model
{
    protected $table = 'tbl_branches_admins';
    protected $primaryKey='pkBranchAdminID';

    protected $fillable = ['fkBranchID','fkAdminID'];

    public function Branch()
    {
        return $this->belongsTo(Branch::class,'fkBranchID','pkBranchID');
    }
     public function Admin()
    {
       return $this->belongsTo(Admin::class,'fkAdminID','id');
    }
 }
