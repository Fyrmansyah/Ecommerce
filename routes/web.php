<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProdukController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('user.home');
// });

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/detail/{id}', 'detail');
    Route::get('/cart', 'cart');
    Route::get('/getcart', 'getCart');
    Route::post('/addcart', 'addCart');
});

Route::prefix('/admin')->middleware(['auth','isAdmin'])->group(function(){
    // Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
<<<<<<< HEAD
    Route::get('/dashboard', [DashboardController::class, 'index']);
=======

Route::get('dashboard', [DashboardController::class, 'index']);
>>>>>>> dfd032d2cb9e9d57e9133aadf9224ad4194c8301

     //category routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index'); //requwat view table
        Route::get('category/create', 'create'); //request view
        Route::post('category', 'toko'); //request data
        Route::get('category/{category}/edit', 'edit'); //request view
        Route::post('category/{category}/update', 'update'); //request data
    });

    Route::controller(ProdukController::class)->group(function () {
        Route::get('produks', 'index');
        Route::get('produks/create', 'create');
        Route::post('produks', 'store');
    });
});
