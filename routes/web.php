<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ONTController;
use App\Http\Controllers\Auth\LoginController;

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
    return view('auth.login');
});

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [ONTController::class, 'home'])->name('home');
Route::get('/ont', [ONTController::class, 'index'])->name('ont.show');
Route::post('/ont', [ONTController::class, 'addONT'])->name('ont.add');
Route::delete('/ont/{id_ont}', [ONTController::class, 'deleteONT'])->name('ont.del');



