<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RumahController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/rumah', [RumahController::class, 'index'])->name('rumah.index');

Route::resource('users', UserController::class)->middleware('auth');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('pekerjaan', PekerjaanController::class);

Route::resource('penduduk', PendudukController::class);

Route::resource('kategori', KategoriController::class);

Route::resource('documents', DocumentController::class);

Route::resource('surat', SuratController::class);
Route::patch('/surat/{id}/{status}', [SuratController::class, 'updateStatus'])->name('surat.updateStatus');
Route::get('surat/{id}/print', [SuratController::class, 'printPdf'])->name('surat.printPdf');
