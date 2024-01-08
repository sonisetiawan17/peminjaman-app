<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\SuperAdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');

// Protected User Routes
Route::middleware(['auth', 'role:user'])->prefix('dashboard')->name('user.')->group(function () {
    Route::get('/', [UserDashboardController::class, 'index'])->name('index');
});

// Protected Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('index');
    Route::get('/dataPemohon', [AdminDashboardController::class, 'dataPemohon'])->name('dataPemohon');
    Route::get('/lihatPemohon/{id_permohonan}', [AdminDashboardController::class, 'show'])->name('show');
});

// Protected SuperAdmin Routes
Route::middleware(['auth', 'role:super-admin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/dashboard', [SuperAdminDashboardController::class, 'index'])->name('index');
    Route::get('/jadwal', [CRUDController::class, 'index_jadwal'])->name('index_jadwal');
    Route::get('/fasilitas', [CRUDController::class, 'index_fasilitas'])->name('index_fasilitas');

    Route::get('/users', [CRUDController::class, 'index_users'])->name('index_users');
    Route::post('/simpanUsers', [CRUDController::class, 'simpan_users'])->name('simpan_users');
    Route::delete('/hapusInstansi/{id_user}', [CRUDController::class, 'hapus_users'])->name('hapus_users');
    Route::post('/ubahUsers/{id_user}', [CRUDController::class, 'ubah_users'])->name('ubah_users');

    Route::get('/instansi', [CRUDController::class, 'index_instansi'])->name('index_instansi');
    Route::post('/simpanInstansi', [CRUDController::class, 'simpan_instansi'])->name('simpan_instansi');
    Route::delete('/hapusInstansi/{id_instansi}', [CRUDController::class, 'hapus_instansi'])->name('hapus_instansi');
    Route::post('/ubahInstansi/{id_instansi}', [CRUDController::class, 'ubah_instansi'])->name('ubah_instansi');

    Route::get('/alat-pendukung', [CRUDController::class, 'index_alat'])->name('index_alat');
    Route::post('/simpanAlatPendukung', [CRUDController::class, 'simpan_alat'])->name('simpan_alat');
    Route::delete('/hapusAlatPendkukung/{id_alat_pendukung}', [CRUDController::class, 'hapus_alat'])->name('hapus_alat');
    Route::post('/ubahAlatPendukung/{id_alat_pendukung}', [CRUDController::class, 'ubah_alat'])->name('ubah_alat');

    Route::get('/bidang-kegiatan', [CRUDController::class, 'bidang_kegiatan'])->name('bidang_kegiatan');
    Route::post('/simpanBidangKegiatan', [CRUDController::class, 'simpan_bidang_kegiatan'])->name('simpan_bidang_kegiatan');
    Route::delete('/hapusBidangKegiatan/{id_bidang_kegiatan}', [CRUDController::class, 'hapus_bidang_kegiatan'])->name('hapus_bidang_kegiatan');
    Route::post('/ubahBidangKegiatan/{id_bidang_kegiatan}', [CRUDController::class, 'ubah_bidang_kegiatan'])->name('ubah_bidang_kegiatan');
});

require __DIR__.'/auth.php';
