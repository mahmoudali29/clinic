<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\ContactUs;
use View;
use App;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    

    public function __construct()
	{
	    $objContact = ContactUs::first();

    	// Sharing is caring
    	View::share('objContact', $objContact);
	}
	  
 

}
