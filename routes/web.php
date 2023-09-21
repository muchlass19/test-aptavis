<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\StandingsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', ClubController::class . '@index')->name('clubs.index');
Route::group(['prefix' => 'clubs'], function() {
    Route::get('/', ClubController::class . '@create')->name('clubs.create');
    Route::get('/{club}', ClubController::class . '@show')->name('clubs.show');
    Route::post('/store', ClubController::class . '@store')->name('clubs.store');
    Route::get('/edit/{club}', ClubController::class . '@edit')->name('clubs.edit');
    Route::put('/update/{club}', ClubController::class . '@update')->name('clubs.update');
    Route::get('/destroy/{club}', ClubController::class . '@destroy')->name('clubs.destroy');
});
Route::group(['prefix' => 'games'], function() {
    Route::get('/', GameController::class . '@index')->name('games.index');
    Route::get('/create', GameController::class . '@create')->name('games.create');
    Route::get('/{game}', GameController::class . '@show')->name('games.show');
    Route::post('/store', GameController::class . '@store')->name('games.store');
    Route::get('/edit/{game}', GameController::class . '@edit')->name('games.edit');
    Route::put('/update/{game}', GameController::class . '@update')->name('games.update');
    Route::get('/destroy/{game}', GameController::class . '@destroy')->name('games.destroy');
});
Route::group(['prefix' => 'standings'], function() {
    Route::get('/', StandingsController::class . '@index')->name('standings.index');
    Route::get('/reset', StandingsController::class . '@update')->name('standings.reset');
});
