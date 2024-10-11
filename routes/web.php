<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\EkskulController;
use App\Http\Controllers\Admin\JamaahController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\SmartController;
use App\Http\Controllers\Pelatih\DataSiswaController;
use App\Http\Controllers\Siswa\InfoEkskulController;
use App\Http\Controllers\Siswa\InfoKriteriaController;
use App\Http\Controllers\Siswa\PemilihanEkskulController;
use App\Http\Controllers\Siswa\RiwayatPemilihanController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
})->name('welcome');

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::prefix('jamaah')->group(function () {
        Route::get('/show', [JamaahController::class, 'index'])->name('jamaah.show');
        Route::post('/store', [JamaahController::class, 'store'])->name('jamaah.store');
        Route::get('/preview/{id}', [JamaahController::class, 'show'])->name('jamaah.preview');
        Route::get('/edit/{id}', [JamaahController::class, 'edit'])->name('jamaah.edit');
        Route::post('/update/{id}', [JamaahController::class, 'update'])->name('jamaah.update');
        Route::get('/destroy/{id}', [JamaahController::class, 'destroy'])->name('jamaah.destroy');
        Route::get('/download', [JamaahController::class, 'downloadExcel'])->name('jamaah.download');
    });

    Route::prefix('users')->group(function () {
        Route::get('/show', [UserController::class, 'index'])->name('users.show');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/download', [UserController::class, 'download'])->name('user.download');
    });
});

require __DIR__ . '/auth.php';
