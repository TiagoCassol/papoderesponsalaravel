<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashBoardController;


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

Route::get('/',[SiteController::class,'index'])->name('site.index');

Route::view('/login','login.form')->name('login.form');
Route::post('/auth',[LoginController::class,'auth'])->name('login.auth');

Route::get('/admin/dashboard', [DashBoardController::class,'index'])->name('admin.dashboard');
