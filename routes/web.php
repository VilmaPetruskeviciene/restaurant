<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestoranasController as R;
use App\Http\Controllers\PatiekalasController as P;
use App\Http\Controllers\HomeController as H;


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


Auth::routes();

Route::get('/', [H::class, 'homeList'])->name('home')->middleware('gate:home');
Route::put('/rate/{patiekalas}', [H::class, 'rate'])->name('rate')->middleware('gate:user');

Route::prefix('restoranas')->name('r_')->group(function () {
    Route::get('/', [R::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/create', [R::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [R::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{restoranas}', [R::class, 'show'])->name('show')->middleware('gate:user');
    Route::delete('/delete/{restoranas}', [R::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{restoranas}', [R::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{restoranas}', [R::class, 'update'])->name('update')->middleware('gate:admin');
});

Route::prefix('patiekalas')->name('p_')->group(function () {
    Route::get('/', [P::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/create', [P::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [P::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{patiekalas}', [P::class, 'show'])->name('show')->middleware('gate:user');
    Route::delete('/delete/{patiekalas}', [P::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{patiekalas}', [P::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{patiekalas}', [P::class, 'update'])->name('update')->middleware('gate:admin');
});
