<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;

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
})->middleware('check.login')->name('/');


Route::get('/user-login', [LoginController::class, 'showLoginForm'])->middleware('check.login')->name('user-login');
Route::get('/admin-login', [LoginController::class, 'showLoginForm'])->middleware('check.login')->name('admin-login');
Route::get('/provider-login', [LoginController::class, 'showLoginForm'])->middleware('check.login')->name('provider-login');


Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('login', [LoginController::class, 'login'])->name('login');


Route::post('/userdata', [UserDataController::class, 'store'])->name('userdata.store');
Route::post('/servicedata', [ServiceController::class, 'store'])->name('servicedata.store');

Route::get('/user', [UserDataController::class, 'showData'])->middleware(['auth', 'role:user'])->name('user');
Route::get('/admin', [AdminController::class, 'showData'])->middleware(['auth', 'role:admin'])->name('admin');
Route::get('/provider', [ServiceController::class, 'showData'])->middleware(['auth', 'role:provider'])->name('provider');


