<?php

use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\WelcomeController;
use App\Http\Controllers\dashboard\FoodController;
use App\Http\Controllers\dashboard\ChefsController;
use App\Http\Controllers\dashboard\ReservationController;
use App\Http\Controllers\dashboard\OrderController;
use App\Http\Controllers\dashboard\PilotController;
use App\Http\Controllers\dashboard\ArchiveController;
use Illuminate\Support\Facades\Route;
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

//All Admin Routes 
Route::group(['middleware'=>['auth','isAdmin']],function(){

    Route::prefix('admin')->name('admin.')->group(function(){
    
        Route::resource('/users', UserController::class);
        Route::resource('/foods', FoodController::class);
        Route::resource('/chefs', ChefsController::class);
        Route::resource('/reservations', ReservationController::class);
        Route::resource('/orders', OrderController::class);
        Route::resource('/pilots', PilotController::class);
        Route::get('/archives', [ArchiveController::class, 'index'])->name('archives.index');
        Route::get('/archives/{id}', [ArchiveController::class, 'show'])->name('archives.show');
    });

});
Route::get('/home', [WelcomeController::class, 'index'])->name('home');



