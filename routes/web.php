<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\ReservationController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\OrderController;
use Illuminate\Support\Facades\Auth;

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


//All User Route
Auth::routes();

Route::get('/', [HomeController::class, 'index']);


//the user auth route
Route::group(['middleware'=>'auth'],function(){
    /*----------------------------------ReservationController-----------------------------------------*/
    Route::resource('/reservation', ReservationController::class);
    /*----------------------------------CartController-----------------------------------------*/
    Route::get('/addtoCart/{food}', [CartController::class, 'addtoCart'])->name('cart.add');
    Route::get('/shopping-cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::get('/checkout/{id}', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/charge', [CartController::class, 'charge'])->name('cart.charge');
    Route::delete('/cart/{food}', [CartController::class, 'destroy'])->name('food.remove');
    Route::put('/cart/{food}', [CartController::class, 'update'])->name('food.update');
    /*----------------------------------OrderController-----------------------------------------*/
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});
