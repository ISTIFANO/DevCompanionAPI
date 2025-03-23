<?php

namespace App\Providers;

use App\Models\Hackathon_rule;
use App\Repository\NoteRepositery;
use App\Repository\RoleRepositery;
use App\Repository\UserRepositery;
use App\Repository\ThemeRepositery;
use App\Services\HackathonServices;
use Illuminate\Support\Facades\Schema;
use App\Repository\HackathonRepositery;
use Illuminate\Support\ServiceProvider;
use App\Repository\interfaces\NoteInterface;
use App\Repository\interfaces\RoleInterface;
use App\Repository\interfaces\UserInterface;
use App\Repository\interfaces\Themeinterface;
use App\Services\interfaces\HackathonInterfaces;
use App\Repository\interfaces\HackathonInterface;
use App\Repository\interfaces\RulesInterface;
use App\Repository\RulesRepositery;

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
        $this->app->bind(HackathonInterfaces::class,HackathonServices::class);
        $this->app->bind(RulesInterface::class,RulesRepositery::class);


    }

    /**
     * Bootstrap any application services.
     */
   public function boot()
{
    Schema::defaultStringLength(191);
}
}
