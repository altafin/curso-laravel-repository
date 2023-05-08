<?php

namespace App\Providers;

use App\Models\Category;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Core\Eloquent\EloquentProductRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProductRepositoryInterface::class, EloquentProductRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        view()->composer(
            'admin.products.*',
            function ($view) {
                $view->with('categories', Category::pluck('title', 'id'));
            }
        );
    }
}
