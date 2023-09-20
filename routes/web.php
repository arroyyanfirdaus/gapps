<?php

use App\Http\Controllers\AksesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TerlambatController;
use App\Models\Karyawan;
use App\Models\Terlambat;
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
    return view('welcome');
});


// Route::get('/guru', [StudentController::class, 'index'])->name('guru.index');


// Route::get('/terlambat/create', [TerlambatController::class, 'create'])->name('terlambat.create');
// Route::post('/student', [StudentController::class, 'store'])->name('student.store');
// Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
// Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
// Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

// Route::resource('student', StudentController::class)->middleware('auth');
// Route::resource('student-classes', StudentClassController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('student', StudentController::class)->middleware('auth');
    Route::resource('student-classes', StudentClassController::class)->middleware('auth');
    Route::resource('akses', AksesController::class)->middleware('auth');

    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/terlambat', [TerlambatController::class, 'index'])->name('terlambat.index');
    Route::get('/terlambat/create', [TerlambatController::class, 'create'])->name('terlambat.create');
    Route::get('/akses/create', [AksesController::class, 'create'])->name('akses.create');
    Route::get('/gatepass/create', [DataController::class, 'create'])->name('gatepass.create');
    Route::get('/akses', [AksesController::class, 'index'])->name('akses.index');
    Route::get('akses/{id}/edit', 'AksesController@edit')->name('akses.edit');
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/gatepass', [DataController::class, 'index'])->name('gatepass.index');
    // Route::get('data/create', [DataController::class, 'create'])->name('data.create');

    Route::post('/data/store', [DataController::class, 'store'])->name('gatepass.store');
    Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::post('/terlambat/store', [TerlambatController::class, 'store'])->name('terlambat.store');
    Route::post('/akses/store', [AksesController::class, 'store'])->name('akses.store');
    Route::resource('gatepass', DataController::class);

    Route::put('akses/{id}', 'AksesController@update')->name('akses.update');
});

require __DIR__ . '/auth.php';
