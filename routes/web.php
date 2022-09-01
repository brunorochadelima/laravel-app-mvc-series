<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;


/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', function () {
    return redirect('/series');
});

// Route::controller(SeriesController::class)->group(function () {
//     //Parâmetros são nome classe e nome da função
//     Route::get('/series', 'index')->name('series.index');
//     Route::get('/series/criar', 'criarSerie')->name('series.create');
//     Route::post('/series/salvar', 'store')->name('series.store');
//     Route::post('/series/destroy/{serie}', 'destroy')->name('series.destroy');
//     Route::get('/series/{series}/edit', 'edit')->name('series.edit');
//     Route::post('/series/{series}', 'update')->name('series.update');
//     // 2 opção informar id como parãmetro
//     // Router::post('/series/destroy?id=1', 'destroy')->name('series.destroy');
// });

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');