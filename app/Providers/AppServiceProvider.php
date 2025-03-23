<?php

namespace App\Providers;

use App\Models\Hackathon_rule;
use App\Models\Memberjurie;
use App\Repository\ActiviteRepositery;
use App\Repository\EquipeRepositery;
use App\Repository\NoteRepositery;
use App\Repository\RoleRepositery;
use App\Repository\UserRepositery;
use App\Repository\ThemeRepositery;
use App\Services\HackathonServices;
use Illuminate\Support\Facades\Schema;
use App\Repository\HackathonRepositery;
use App\Repository\interfaces\ActiviteInterface;
use App\Repository\interfaces\EquipeInterface;
use Illuminate\Support\ServiceProvider;
use App\Repository\interfaces\NoteInterface;
use App\Repository\interfaces\RoleInterface;
use App\Repository\interfaces\UserInterface;
use App\Repository\interfaces\Themeinterface;
use App\Services\interfaces\HackathonInterfaces;
use App\Repository\interfaces\HackathonInterface;
use App\Repository\interfaces\MemberjurieInterface;
use App\Repository\interfaces\ProjectInterface;
use App\Repository\interfaces\RulesInterface;
use App\Repository\MemberjurieRepositery;
use App\Repository\ProjectRepositery;
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
        $this->app->bind(EquipeInterface::class,EquipeRepositery::class);
        $this->app->bind(ProjectInterface::class,ProjectRepositery::class);
        $this->app->bind(ActiviteInterface::class,ActiviteRepositery::class);
        $this->app->bind(NoteInterface::class,NoteRepositery::class);
        $this->app->bind(MemberjurieInterface::class,MemberjurieRepositery::class);
    }

    /**
     * Bootstrap any application services.
     */
   public function boot()
{
    Schema::defaultStringLength(191);
}
}
