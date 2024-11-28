<?php

namespace App\Providers;

use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\CrudInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CrudInterface::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
