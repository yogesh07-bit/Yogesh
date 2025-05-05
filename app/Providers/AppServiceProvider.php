<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MenuGenerator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(MenuGenerator::class, function ($app) {
            return new MenuGenerator();
        });
    }

    public function boot(): void
    {
        PaginationPaginator::useBootstrapFive();
    }
}
