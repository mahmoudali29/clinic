<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 
use App\Model\Admin;
use App\Model\Setting;
use Auth;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function ($view) 
        {
            @$objLoginAdmin = Admin::find(Auth::user()->id);
            //print_r($objAdmin); die;
            @$objSetting = Setting::find(1);
            //...with this variable
            $view->with('objLoginAdmin', $objLoginAdmin );    
            $view->with('objSetting', $objSetting );
        }); 

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
