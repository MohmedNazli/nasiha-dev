<?php



use App\Http\Controllers\Panel\Company\CompanyAuthController;
use App\Http\Controllers\Panel\Company\CompanyController;
use App\Http\Controllers\Panel\Company\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Company Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register company routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::prefix('dashboard/company/')->group(static function () {
    Route::get('login', [CompanyAuthController::class, 'create'])
        ->name('company.login');
    Route::post('login', [CompanyAuthController::class, 'store'])->name('company.login.store');


    Route::middleware(['auth:company', 'verified'])->group(static function () {
        Route::get('/', [CompanyController::class, 'index'])->name('company.dashboard');
        Route::post('logout', [CompanyAuthController::class, 'destroy'])
            ->name('company.logout');
        Route::resource('employees', EmployeeController::class);
    });
});
