<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($setting){
            $setting->with('setting', DB::table('settings')->find(1));
            $setting->with('extra_settings', DB::table('extra_settings')->find(1));

            if(!session()->has('popup')){
                view()->share('visit', 1);
            }
            session()->put('popup', 1);
        });
    }
}
