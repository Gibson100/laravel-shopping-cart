<?php

use Illuminate\Console\Application;
use Illuminate\Support\Facades\Route;


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

Route::get('/',[App\Http\Controllers\ProductsController::class,'index']);

Route::get('/add',function() {
    return view('layouts.addproduct');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/add/products',[App\Http\Controllers\ProductsController::class, 'store']);

Route::post('/addtocart',[App\Http\Controllers\CartController::class, 'store']);

//cart count route
Route::get('/cartcount',[App\Http\Controllers\CartController::class, 'index']);

//cart/checkin page route
Route::get('/{id}/cart',[App\Http\Controllers\CartController::class, 'index']);

//orders route
Route::get('/{id}/orders',[App\Http\Controllers\CartController::class, 'index']);