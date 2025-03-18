<?php

namespace App\Providers;

use App\Repository\interfaces\UserInterface;
use App\Repository\UserRepositery;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositery::class,UserInterface::class);
    }

    /**
     * Bootstrap any application services.
     */
   public function boot()
{
    Schema::defaultStringLength(191);
}
}
