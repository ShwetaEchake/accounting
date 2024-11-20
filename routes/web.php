<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
    return redirect()->route('login');
})->name('/');




// Guest Users
Route::middleware(['guest', 'PreventBackHistory'])->group(function () {
    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('signin');
    Route::get('register', [App\Http\Controllers\Admin\AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [App\Http\Controllers\Admin\AuthController::class, 'register'])->name('signup');
});




// Authenticated users
Route::middleware(['auth', 'PreventBackHistory'])->group(function () {

    // Auth Routes
    Route::get('home', fn() => redirect()->route('dashboard'))->name('home');
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'Logout'])->name('logout');
    Route::get('change-theme-mode', [App\Http\Controllers\Admin\DashboardController::class, 'changeThemeMode'])->name('change-theme-mode');
    Route::get('show-change-password', [App\Http\Controllers\Admin\AuthController::class, 'showChangePassword'])->name('show-change-password');
    Route::post('change-password', [App\Http\Controllers\Admin\AuthController::class, 'changePassword'])->name('change-password');


    // Common
    Route::resource('departments', App\Http\Controllers\Admin\Common\DepartmentController::class);
    Route::resource('tax-master', App\Http\Controllers\Admin\Common\TaxMasterController::class);
    Route::resource('tax-group', App\Http\Controllers\Admin\Common\TaxGroupController::class);
    Route::resource('tax-category', App\Http\Controllers\Admin\Common\TaxCategoryController::class);
    Route::resource('calculation-method', App\Http\Controllers\Admin\Common\CalculationMethodController::class);
    Route::resource('demand-classification', App\Http\Controllers\Admin\Common\DemandClassificationController::class);
    Route::resource('applicable-at', App\Http\Controllers\Admin\Common\ApplicableAtController::class);
    Route::resource('workflow-mode', App\Http\Controllers\Admin\Common\WorkflowModeController::class);
    Route::resource('units', App\Http\Controllers\Admin\Common\UnitController::class);
    Route::resource('events', App\Http\Controllers\Admin\Common\EventController::class);
    Route::resource('organizations', App\Http\Controllers\Admin\Common\OrganizationController::class);
    Route::resource('component-name', App\Http\Controllers\Admin\Common\ComponentNameController::class);
    Route::resource('template-type', App\Http\Controllers\Admin\Common\TemplateTypeController::class);
    Route::resource('voucher-type', App\Http\Controllers\Admin\Common\VoucherTypeController::class);


    // Masters
    Route::resource('masters', App\Http\Controllers\Admin\Masters\MasterController::class);
    Route::resource('financial-year', App\Http\Controllers\Admin\Masters\FinancialYearController::class);
    Route::resource('services', App\Http\Controllers\Admin\Masters\ServiceController::class);
    Route::resource('banks', App\Http\Controllers\Admin\Masters\BankController::class);
    Route::resource('taxes', App\Http\Controllers\Admin\Masters\TaxController::class);
    Route::resource('workflow', App\Http\Controllers\Admin\Masters\WorkflowController::class);

    //Others
    Route::resource('voucher_template_entry', App\Http\Controllers\Admin\Others\VoucherTemplateEntryController::class);
    Route::resource('receipt-details', App\Http\Controllers\Admin\Others\ReceiptDetailController::class);
    Route::resource('grant-details', App\Http\Controllers\Admin\GrantLoansInvests\GrantDetailController::class);



    // Chart of account
    Route::resource('chart-of-account', App\Http\Controllers\Admin\ChartAccount\ChartAccountController::class);
    Route::resource('field-master', App\Http\Controllers\Admin\ChartAccount\FieldMasterController::class);
    // Route::delete('field-master-child/{id}', [App\Http\Controllers\Admin\ChartAccount\FieldMasterController::class, 'deleteChild'])->name('field-master.delete-child');
    // Route::resource('function-master', App\Http\Controllers\Admin\ChartAccount\FunctionMasterController::class);
    // Route::delete('function-master-child/{id}', [App\Http\Controllers\Admin\ChartAccount\FunctionMasterController::class, 'deleteChild'])->name('function-master.delete-child');
    // Route::resource('fund-master', App\Http\Controllers\Admin\ChartAccount\FundMasterController::class);
    // Route::delete('fund-master-child/{id}', [App\Http\Controllers\Admin\ChartAccount\FundMasterController::class, 'deleteChild'])->name('fund-master.delete-child');
    // Route::resource('primary-account-head', App\Http\Controllers\Admin\Masters\TaxController::class);
    // Route::resource('secondary-account-head', App\Http\Controllers\Admin\Masters\WorkflowController::class);



    Route::post('/services/search', [App\Http\Controllers\Admin\Masters\ServiceController::class, 'search'])->name('services.search');
    Route::post('/import-banks', [App\Http\Controllers\Admin\Masters\BankController::class, 'importBanks'])->name('banks.import');


    // Users Roles n Permissions
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::get('users/{user}/toggle', [App\Http\Controllers\Admin\UserController::class, 'toggle'])->name('users.toggle');
    Route::get('users/{user}/retire', [App\Http\Controllers\Admin\UserController::class, 'retire'])->name('users.retire');
    Route::put('users/{user}/change-password', [App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('users.change-password');
    Route::get('users/{user}/get-role', [App\Http\Controllers\Admin\UserController::class, 'getRole'])->name('users.get-role');
    Route::put('users/{user}/assign-role', [App\Http\Controllers\Admin\UserController::class, 'assignRole'])->name('users.assign-role');
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
});




Route::get('/php', function (Request $request) {
    if (!auth()->check())
        return 'Unauthorized request';

    Artisan::call($request->artisan);
    return dd(Artisan::output());
});
