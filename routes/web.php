<?php

use App\Http\Controllers\AdminDashboardController;
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
Route::middleware(['auth', 'role:user'])->prefix('dashboard')->name('user.dashboard.')->group(function () {
    Route::get('/', [UserDashboardController::class, 'index'])->name('index');
});

// Protected Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.dashboard.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
});

// Protected SuperAdmin Routes
Route::middleware(['auth', 'role:super-admin'])->prefix('superadmin')->name('superadmin.dashboard.')->group(function () {
    Route::get('/', [SuperAdminDashboardController::class, 'index'])->name('index');
});

require __DIR__.'/auth.php';
