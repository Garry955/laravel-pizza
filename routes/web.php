<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\cart\CartController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\product\ProductController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('product/addCart/{product}', [CartController::class, 'addCart'])->name('cart.add');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

Route::controller(AuthController::class)->prefix('auth')->group(function() {
    //Show Login form
    Route::get('/login', 'login')->name('login')->middleware('guest');
    //Authenticate user
    Route::get('/authenticate', 'authenticate')->name('authenticate')->middleware('guest');
    // Logout user
    Route::get('/logout','logout')->name('logout')->middleware('auth');
    // Show register create user form
    Route::get('/register','register')->name('register')->middleware('guest');
    // Register user
    Route::post('store', 'store')->name('auth.store');
});

