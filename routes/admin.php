<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Panel\Admin\LoginController;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Admin Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register admin routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::prefix('dashboard/admin/')->group(static function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('admin.login');

    Route::middleware(['auth:admin', 'verified'])->group(static function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/companies', [AdminController::class, 'companies'])->name('companies');
        Route::post('/companies/store', [AdminController::class, 'storeCompany'])->name('companies.store');
    });
});

