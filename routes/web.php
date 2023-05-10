<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    CategoryController,
    ProductController,
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
    Route::any('products/search', [ProductController::class, 'search'])->name('products.search');
    Route::resource('products', ProductController::class);

    Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::resource('categories', CategoryController::class);

    Route::get('/', function () {})->name('admin');
});

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
