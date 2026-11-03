<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'index']);


/*
|--------------------------------------------------------------------------
| PELANGGAN
|--------------------------------------------------------------------------
*/

Route::get('/pelanggan', [PageController::class, 'pelanggan']);
Route::post('/pelanggan', [PageController::class, 'storePelanggan']);
Route::get('/pelanggan/{id}/edit', [PageController::class, 'editPelanggan']);
Route::put('/pelanggan/{id}', [PageController::class, 'updatePelanggan']);
Route::delete('/pelanggan/{id}', [PageController::class, 'deletePelanggan']);


/*
|--------------------------------------------------------------------------
| STAF
|--------------------------------------------------------------------------
*/

Route::get('/staf', [PageController::class, 'staf']);
Route::post('/staf', [PageController::class, 'storeStaf']);
Route::get('/staf/{id}/edit', [PageController::class, 'editStaf']);
Route::put('/staf/{id}', [PageController::class, 'updateStaf']);
Route::delete('/staf/{id}', [PageController::class, 'deleteStaf']);


/*
|--------------------------------------------------------------------------
| OBAT
|--------------------------------------------------------------------------
*/

Route::get('/obat', [PageController::class, 'obat']);
Route::post('/obat', [PageController::class, 'storeObat']);
Route::get('/obat/{id}/edit', [PageController::class, 'editObat']);
Route::put('/obat/{id}', [PageController::class, 'updateObat']);
Route::delete('/obat/{id}', [PageController::class, 'deleteObat']);