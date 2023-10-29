<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/mahasiswas', [MahasiswaController::class, 'index']);
Route::get('/presences', [MahasiswaController::class, 'getPresences']);
Route::get('/mahasiswas/{mahasiswa:nim}', [MahasiswaController::class, 'show']);
Route::get('/check-mahasiswa/{nim}', [MahasiswaController::class, 'checkMahasiswa']);
Route::get('/check-presence/{nim}', [MahasiswaController::class, 'checkPresence']);

Route::post('/presences', [MahasiswaController::class, 'store']);