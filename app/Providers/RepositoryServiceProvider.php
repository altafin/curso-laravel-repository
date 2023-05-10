<?php

namespace App\Providers;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Core\Eloquent\EloquentCategoryRepository;
use App\Repositories\Core\Eloquent\EloquentProductRepository;
use App\Repositories\Core\QueryBuilder\QueryBuilderCategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProductRepositoryInterface::class, EloquentProductRepository::class
        );
        $this->app->bind(
            CategoryRepositoryInterface::class, QueryBuilderCategoryRepository::class
        );
        //CategoryRepositoryInterface::class, EloquentCategoryRepository::class

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
