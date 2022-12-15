<?php



        Route::prefix('dashboard')->name('dashboard.')->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');

             //category routes
           // Route::resource('categories', 'CategoryController')->except(['show']);

        });//end of dashboard routes


