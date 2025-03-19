<?php

namespace App\Providers;

use App\Repository\HackathonRepositery;
use App\Repository\interfaces\HackathonInterface;
use App\Repository\interfaces\NoteInterface;
use App\Repository\interfaces\RoleInterface;
use App\Repository\interfaces\Themeinterface;
use App\Repository\interfaces\UserInterface;
use App\Repository\NoteRepositery;
use App\Repository\RoleRepositery;
use App\Repository\ThemeRepositery;
use App\Repository\UserRepositery;
use App\Services\HackathonServices;
use App\Services\interfaces\HackathonInterface as InterfacesHackathonInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class,UserRepositery::class);
        $this->app->bind(RoleInterface::class,RoleRepositery::class);
        $this->app->bind(NoteInterface::class,NoteRepositery::class);
        $this->app->bind(Themeinterface::class,ThemeRepositery::class);
        $this->app->bind(HackathonInterface::class,HackathonRepositery::class);

        $this->app->bind(InterfacesHackathonInterface::class,HackathonServices::class);

    }

    /**
     * Bootstrap any application services.
     */
   public function boot()
{
    Schema::defaultStringLength(191);
}
}
