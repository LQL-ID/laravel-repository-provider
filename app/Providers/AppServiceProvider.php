<?php

namespace App\Providers;

use App\Services\Biodata\{
    DestroyBiodata,
    GetBiodata,
    StoreBiodata,
    UpdateBiodata,
}; //end service

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
        // Biodata
        $this->registerService('GetSpecificBiodata', GetBiodata::class);
        $this->registerService('StoreBiodata', StoreBiodata::class);
        $this->registerService('UpdateBiodata', UpdateBiodata::class);
        $this->registerService('DestroyBiodata', DestroyBiodata::class);
        // End
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

    private function registerService($serviceName, $className)
    {
        $this->app->singleton($serviceName, function () use ($className) {
            return new $className;
        });
    }
}
