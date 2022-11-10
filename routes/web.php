<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\TransactionController;
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



Route::middleware('auth')->group(function(){
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category/{id}/filter', 'filter');
        Route::get('category/filter', 'indexUser');
        Route::get('category/all', 'getAllProducts');
    });
    
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transaction', 'index');
    });
    
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->name('home');
        Route::get('/getcategory', 'getCategory');
        Route::get('/detail/{id}', 'detail');
        Route::get('/cart', 'cart');
        Route::get('/getcart', 'getCart');
        Route::post('/addcart', 'addCart');
    });


    Route::prefix('/admin')->middleware('isAdmin')->group(function(){
        Route::get('dashboard', [DashboardController::class, 'index']);

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

    Route::controller(TransaksiController::class)->group(function () {
        Route::get('transaksi', 'index');
      
    });
});
