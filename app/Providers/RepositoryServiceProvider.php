<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    ProductRepositoryInterface,
    ChartRepositoryInterface,
    UserRepositoryInterface};

use App\Repositories\Core\Eloquent\{
    EloquentCategoryRepository,
    EloquentProductRepository,
    EloquentChartRepository,
    EloquentUserRepository};

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
        $this->app->bind(
            UserRepositoryInterface::class, EloquentUserRepository::class
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
