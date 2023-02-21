<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix'=>'menu'], function () {
   Route::get('/', [MenuController::class, 'index'])->name('menu');
   Route::post('/store', [MenuController::class, 'store'])->name('menu.store');
   Route::delete('/delete/{id}', [MenuController::class, 'destroy'])->name('menu.delete');
   Route::post('/status/{id}', [MenuController::class, 'status'])->name('menu.status');
});
