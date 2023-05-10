<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    CategoryController,
    ProductController,
    DashboardController,
    UserController,
};

use App\Http\Controllers\{
    SiteController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::any('users/search', [UserController::class, 'search'])->name('users.search');
    Route::resource('users', UserController::class);

    Route::any('products/search', [ProductController::class, 'search'])->name('products.search');
    Route::resource('products', ProductController::class);

    Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::resource('categories', CategoryController::class);

    Route::get('/', [DashboardController::class, 'index'])->name('admin');
});

Auth::routes(['register' => false]);

Route::get('/', [SiteController::class, 'index']);
