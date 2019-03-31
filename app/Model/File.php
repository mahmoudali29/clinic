<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Model\Admin;
use App\Model\News;
use App\Model\Offers;

class File extends Model
{

	const TYPE_PRODUCT = "product" ;
    const TYPE_NEWS    = "news" ;
    const TYPE_BLOG    = "blog" ;
    const TYPE_ADMIN   = "admin" ;
    const TYPE_CLIENT  = "client" ;
    const TYPE_PARTNER  = "partner" ;
    const TYPE_OFFERS  = "offers" ;

	protected $table = 'tblfiles';
    protected $primaryKey='pkFileID';

    protected $fillable = ['fkTableID' , 'fldFile' , 'fldTitle' , 'fldType'];

    public function product()
    {
       return $this->belongsTo(Product::class,'FkProductID');
    }

    public function news()
    {
       return $this->belongsTo(News::class);
    }

    public function offers()
    {
       return $this->belongsTo(Offers::class);
    }

    //public function admin()
    //{
    //    return $this->belongsTo(Admin::class);
    //}
}
