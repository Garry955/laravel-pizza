<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\cart\CartController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\user\UserController;

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

Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function() {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{product}', 'edit')->name('edit');
    Route::post('/update/{product}', 'update')->name('update');
    Route::delete('/delete/{product}', 'destroy')->name('delete');
    Route::get('/{product}', 'show')->name('show');
});

Route::controller(OrderController::class)->prefix('admin/order')->name('order')->group(function() {
    Route::get('/', 'index');
    Route::delete('/delete/{order}', 'destroy')->name('.delete');
    Route::get('/edit/{order}', 'edit')->name('.edit');
    Route::patch('/update/{order}', 'update')->name('.update');
    Route::get('/{order}', 'show')->name('.show');
});

Route::controller(UserController::class)->prefix('admin/user')->name('user')->group(function() {
    Route::get('/', 'index');
    Route::get('/create', 'create')->name('.create');
    Route::post('/store', 'store')->name('.store');
    Route::delete('/delete/{user}', 'destroy')->name('.delete');
    Route::get('/edit/{user}', 'edit')->name('.edit');
    Route::patch('/update/{user}', 'update')->name('.update');
    Route::get('/{user}', 'show')->name('.show');
});

Route::post('product/addCart/{product}', [CartController::class, 'addCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::delete('/cart/delete/{cart}', [CartController::class, 'destroy'])->name('cart.delete');

route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::controller(AuthController::class)->group(function() {
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

/**
 * @todo
 * Create Admin endpoints and layouts.. maybe a middleware to check on auth()
 */
Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', 'login');
    Route::get('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/dashboard', 'index')->name('dashboard')->middleware('admin');
});

