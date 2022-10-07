<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::prefix('/admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);

     //category routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index'); //requwat view table
        Route::get('category/create', 'create'); //request view
        Route::post('category', 'toko'); //request data
        Route::get('category/{category}/edit', 'edit'); //request view
        Route::post('category/{category}/update', 'update'); //request data
    });


});
