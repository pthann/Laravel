<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AuthService;
use App\Services\Implements\AuthServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AuthService::class, AuthServiceImpl::class);
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
