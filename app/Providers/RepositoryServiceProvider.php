<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    ProductRepositoryInterface,
    ChartRepositoryInterface,
};

use App\Repositories\Core\Eloquent\{
    EloquentCategoryRepository,
    EloquentProductRepository,
    EloquentChartRepository,
};

use App\Repositories\Core\QueryBuilder\{
    QueryBuilderCategoryRepository,
};

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
        $this->app->bind(
            ChartRepositoryInterface::class, EloquentChartRepository::class
        );

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
