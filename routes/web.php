<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\userController;

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

        Route::get('/home',     [UserController::class, 'index'])->name('index');
        Route::get('/logout',   [UserController::class, 'logout'])->name('logout');
    });

});
