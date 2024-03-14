<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('user')->name('user.')->group(function(){

    Route::middleware('guest')->group(function(){

        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/user/login', [UserController::class, 'check'])->name('check');
    });

    Route::middleware('auth')->group(function(){

        Route::get('/home', [UserController::class, 'index'])->name('index');
    });

});
