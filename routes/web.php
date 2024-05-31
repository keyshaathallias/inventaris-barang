<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\PembelianController;
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

Route::get('/', function(){
    return view('pages.index');
})->name('landing'); 

// login
Route::get('/login', [LoginController::class, 'index'])->name('login'); 
Route::post('/login', [LoginController::class, 'login'])->name('login.login'); 
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout'); 

Route::middleware(['auth'])->group(function()
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('index');

    Route::middleware(['checkrole:administrator'])->group(function()
    {
        // user
        Route::resource('/user', UserController::class);

        // Inventarisir Barang
        Route::resource('/barang', BarangController::class);
        Route::get('/tambah-barang', [BarangController::class, 'create'])->name('barang.create');
        Route::get('/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');

        // Laporan
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.exportPdf');
    });

    Route::middleware(['checkrole:administrator,operator'])->group(function()
    {
        // Pemakaian
        Route::resource('/pemakaian', PemakaianController::class);
        Route::get('/tambah-pemakaian', [PemakaianController::class, 'create'])->name('pemakaian.create');
        Route::get('/edit/{id}', [PemakaianController::class, 'edit'])->name('pemakaian.edit');
    });

    Route::middleware(['checkrole:administrator,operator,petugas'])->group(function()
    {
        // Pembelian
        Route::resource('/pembelian', PembelianController::class);
        Route::get('/tambah-pembelian', [PembelianController::class, 'create'])->name('pembelian.create');
        Route::get('/edit/{id}', [PembelianController::class, 'edit'])->name('pembelian.edit');
    });
});
