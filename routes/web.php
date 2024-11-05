<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TipController;
use App\Http\Controllers\AdminController;

Route::get('/', [TipController::class, 'index'])->name('tips.index');  // Vista pública para ver tips
Route::get('/tips/{id}', [TipController::class, 'show'])->name('tips.show');
Route::get('/search', [TipController::class, 'search'])->name('tips.search');

// Rutas protegidas para administradores y dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');

    // Rutas adicionales para el dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/stats', [AdminController::class, 'stats'])->name('admin.stats');
    Route::get('/admin/filters', [AdminController::class, 'filters'])->name('admin.filters');
    Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
});

// Autenticación
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
