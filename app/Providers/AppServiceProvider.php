<?php

namespace App\Providers;

use App\Models\Car;
use App\Observers\CarsObserver;
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
        Car::observe(classes: CarsObserver::class);
    }
}
