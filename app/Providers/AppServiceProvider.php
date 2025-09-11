<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\FileTaskRepository;
use App\Repositories\TaskRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            TaskRepositoryInterface::class,
            FileTaskRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
