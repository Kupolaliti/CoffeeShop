<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product', App\Http\Controllers\ProductController::class);

Route::get('cart', [App\Http\Controllers\ProductController::class, 'showCart'])->name('cart');

Route::get('/add/{id}',[App\Http\Controllers\CartController::class, 'addItem'])->name('add.item');

Route::get( '/clearCart', [App\Http\Controllers\CartController::class, 'clear'])->name('clearCart');

Route::get('/remove/{id}',[App\Http\Controllers\CartController::class, 'deleteItem'])->name('remove.item');

Route::get('/sub/{id}',[App\Http\Controllers\CartController::class, 'subItem'])->name('sub.item');

Route::resource('order', App\Http\Controllers\OrderController::class);

Route::post('save/{id}', [App\Http\Controllers\OrderController::class, 'save'])->name('saveOrder');

Route::resource('adress', App\Http\Controllers\AdressController::class);

Route::get('/catalog', [App\Http\Controllers\ProductController::class, 'getCatalog']);
