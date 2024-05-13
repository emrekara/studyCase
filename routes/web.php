<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\FrontController::class,'index'])->name('front.index');

Route::name('admin.')->prefix('admin')->group(function (){
    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/login',[\App\Http\Controllers\LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[\App\Http\Controllers\LoginController::class,'login'])->name('login.post');
    Route::get('/logout', [\App\Http\Controllers\LoginController::class,'logout'])->name('logout');

    Route::middleware(['auth:admin'])->group(function (){

        /*admin currencies_api*/
        Route::prefix('currencies_api')->name('currencies_api.')->group(function (){
            Route::get('/',[\App\Http\Controllers\CurrenciesApiController::class,'index'])->name('index');
            Route::post('/',[\App\Http\Controllers\CurrenciesApiController::class,'indexPost'])->name('index.post');
            Route::get('/create',[\App\Http\Controllers\CurrenciesApiController::class,'create'])->name('create');
            Route::post('/create',[\App\Http\Controllers\CurrenciesApiController::class,'createPost'])->name('put');
            Route::get('/update/{id}',[\App\Http\Controllers\CurrenciesApiController::class,'update'])->name('edit');
            Route::post('/update/{id}',[\App\Http\Controllers\CurrenciesApiController::class,'updatePost'])->name('update');
        });

        /*admin currencies_api*/
        Route::prefix('currencies_logs')->name('currencies_logs.')->group(function (){
            Route::get('/',[\App\Http\Controllers\CurrenciesLogsController::class,'index'])->name('index');
            Route::post('/',[\App\Http\Controllers\CurrenciesLogsController::class,'indexPost'])->name('index.post');
            Route::get('/create',[\App\Http\Controllers\CurrenciesLogsController::class,'create'])->name('create');
            Route::post('/create',[\App\Http\Controllers\CurrenciesLogsController::class,'createPost'])->name('put');
            Route::get('/update/{id}',[\App\Http\Controllers\CurrenciesLogsController::class,'update'])->name('edit');
            Route::post('/update/{id}',[\App\Http\Controllers\CurrenciesLogsController::class,'updatePost'])->name('update');
        });
    });
});
