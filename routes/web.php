<?php

use App\Http\Controllers\ChampionsStatsController;
use App\Http\Controllers\ErrorController;
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

// Ruta index
Route::get('/', function () {
    return view('index');
})->name('index');

// Rutas Champion Stats
Route::get('/getChampionsStats', [ChampionsStatsController::class, 'index'])->name('championsStats.index');
Route::get('/newChampionStats', [ChampionsStatsController::class, 'create'])->name('championsStats.create');
Route::post('/postChampionStats', [ChampionsStatsController::class, 'store'])->name('championsStats.store');
Route::get('/showChampionStats/{champion_id}', [ChampionsStatsController::class, 'show'])->name('championsStats.show');
Route::get('/editChampion/{id}', [ChampionsStatsController::class, 'edit'])->name('championsStats.edit');
Route::put('/update/{id}', [ChampionsStatsController::class, 'update'])->name('championsStats.update');
Route::delete('/destroyChampionStats/{champion_id}', [ChampionsStatsController::class, 'destroy'])->name('championsStats.destroy');

// Errores
Route::get('/404', [ErrorController::class, 'show404'])->name('error.404');