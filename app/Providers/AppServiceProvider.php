<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $myVariable = 'Hello, World!';
        $this->app->singleton('myVariable', function () use ($myVariable) {
            return $myVariable;
        });
    }
}
