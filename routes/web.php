<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\DataAbsensiController;
use App\Http\Controllers\ProfilAdminController;
use App\Http\Controllers\DataMahasiswaController;
use App\Http\Controllers\DashboardAbsensiController;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    // Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware('auth')->group(function () {

        Route::get('/profil', [ProfilController::class, 'index'])->middleware('role:mahasiswa');
        Route::get('/profil/{mahasiswa:nim}/edit', [ProfilController::class, 'edit'])->middleware('role:mahasiswa');
        Route::put('/profil/{mahasiswa:nim}', [ProfilController::class, 'update'])->middleware('role:mahasiswa');
        Route::get('/generate-id-card', [ProfilController::class, 'generateIdCard'])->middleware('role:mahasiswa');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['middleware' => ['role:admin']], function () {
            Route::get('/dashboard/absensi', [DashboardAbsensiController::class, 'index']);
            Route::get('dashboard/data-absensi', [DataAbsensiController::class, 'index']);
            Route::put('dashboard/data-absensi/{presence}', [DataAbsensiController::class, 'update']);
            Route::get('/dashboard/data-mahasiswa', [DataMahasiswaController::class, 'index']);
            Route::post('/dashboard/data-mahasiswa', [DataMahasiswaController::class, 'store']);
            Route::get('/dashboard/data-mahasiswa/create', [DataMahasiswaController::class, 'create']);
            Route::get('/dashboard/data-mahasiswa/{mahasiswa:nim}/edit', [DataMahasiswaController::class, 'edit']);
            Route::put('/dashboard/data-mahasiswa/{mahasiswa:nim}', [DataMahasiswaController::class, 'update']);
            Route::delete('/dashboard/data-mahasiswa/{mahasiswa:nim}', [DataMahasiswaController::class, 'destroy']);
            Route::get('/dashboard/data-kelas', [DataKelasController::class, 'index']);
            Route::get('/dashboard/data-kelas/create', [DataKelasController::class, 'create']);
            Route::get('/dashboard/data-kelas/{classroom:slug}/edit', [DataKelasController::class, 'edit']);
            Route::post('/dashboard/data-kelas', [DataKelasController::class, 'store']);
            Route::put('/dashboard/data-kelas/{classroom:slug}', [DataKelasController::class, 'update']);
            Route::delete('/dashboard/data-kelas/{classroom:slug}', [DataKelasController::class, 'destroy']);
            Route::get('/profil-admin', [ProfilAdminController::class, 'index']);
            Route::get('/profil-admin/{user:id}/edit', [ProfilAdminController::class, 'edit']);
            Route::put('/profil-admin/{user:id}', [ProfilAdminController::class, 'update']);
        });
    });

    require __DIR__.'/auth.php';
});
