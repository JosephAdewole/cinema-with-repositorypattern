<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MovieRepositoryInterface;
use App\Repositories\MovieRepository;
use App\Interfaces\CinemaRepositoryInterface;
use App\Repositories\CinemaRepository;
use App\Interfaces\ScheduleRepositoryInterface;
use App\Repositories\ScheduleRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
        $this->app->bind(CinemaRepositoryInterface::class, CinemaRepository::class);
        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
