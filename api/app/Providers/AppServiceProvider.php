<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Interfaces\Clinic\iGetClinics',
            'App\Services\Clinic\ClinicGet'
        );

        $this->app->bind(
            'App\Interfaces\Clinic\iClinicCreate',
            'App\Services\Clinic\ClinicCreate'
        );

        $this->app->bind(
            'App\Interfaces\Clinic\iClinicUpdate',
            'App\Services\Clinic\ClinicUpdate'
        );


    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
