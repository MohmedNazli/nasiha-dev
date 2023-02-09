<?php


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Panel\Admin\AdminAuthController;
use App\Http\Controllers\Panel\Admin\AdminController;
use App\Http\Controllers\Panel\Admin\CompanyController;
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
    Route::get('login', [AdminAuthController::class, 'create'])
        ->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'store'])->name('admin.login.store');


    Route::middleware(['auth:admin', 'verified'])->group(static function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('companies', CompanyController::class);
        Route::post('logout', [AdminAuthController::class, 'destroy'])
            ->name('admin.logout');
    });
});

