<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$loc = 'App\Http\Controllers\\';

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

Route::get('/home', [$loc . MainController::class, 'index'])->name('main');
Route::resource('jabatan', $loc . JabatanController::class);
Route::resource('pegawai', $loc . PegawaiController::class);
Route::resource('user', $loc . UserController::class);

// Route SoftDeletes
Route::put('/jabatan/{id}/restore', [$loc . JabatanController::class, 'restore'])->name('jabatan.restore');
Route::put('/pegawai/{id}/restore', [$loc . PegawaiController::class, 'restore'])->name('pegawai.restore');
Route::delete('/jabatan/{id}/force', [$loc . JabatanController::class, 'forceDelete'])->name('jabatan.force');
Route::delete('/pegawai/{id}/force', [$loc . PegawaiController::class, 'forceDelete'])->name('pegawai.force');


