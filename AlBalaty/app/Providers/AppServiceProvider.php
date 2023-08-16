<?php

namespace App\Providers;

use App\Localization\Locale;
use App\Transcode;
use App\Transcode\TranscodeService;
use App\UserRole\PermissionService;
use App\Zone\ZoneService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
        //
        Schema::defaultStringLength(255);

        $this->app->singleton('Transcode', function($app){
            return new TranscodeService;
        });

        $this->app->singleton('Zone', function($app){
            return new ZoneService;
        });
        $this->app->singleton('Permission', function($app){
            return new PermissionService;
        });

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
