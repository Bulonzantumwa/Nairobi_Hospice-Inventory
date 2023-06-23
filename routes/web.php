<?php

use App\Http\Controllers\Admin\ConditionController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SAInventoryController;
use App\Http\Controllers\Admin\SiteIdentityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UtilityController;
use App\Http\Controllers\CEO\CEOFormsController;
use App\Http\Controllers\CEO\CEORequisitionFormController;
use App\Http\Controllers\CEO\InventoryController;
use App\Http\Controllers\FinanceOffice\ApprovedRequisitionsController;
use App\Http\Controllers\FinanceOffice\FOInventoryController;
use App\Http\Controllers\FinanceOffice\FORequisitionFormController;
use App\Http\Controllers\HOD\CEOApprovedRequisitionController;
use App\Http\Controllers\HOD\ClinicalInventoryController;
use App\Http\Controllers\HOD\DrugListController;
use App\Http\Controllers\HOD\FOApprovedRequisitions;
use App\Http\Controllers\HOD\ItemsRentController;
use App\Http\Controllers\HOD\RequisitionFormController;
use App\Http\Controllers\HOD\RequisitionItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
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



Route::get('/', [WelcomeController::class, 'index'])->name('home');

//Route::get('/dashboard', function () {
//    return view('superAdmin.index');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/superAdmin', function () {
//    return view('superAdmin.index');
//})->middleware(['auth', 'verified','role:super_admin'])->name('superAdmin.index');
Route::middleware(['auth','role:super_admin'])->name('superAdmin.')->prefix('superAdmin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions',[RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}',[RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::get('/users',[UserController::class, 'index'])->name('users.index');
    Route::get('/users/create',[UserController::class, 'create'])->name('users.create');
    Route::post('store', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.role');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::resource('/siteIdentity', SiteIdentityController::class);
    Route::resource('/condition', ConditionController::class);
    Route::resource('/utility', UtilityController::class);
    Route::resource('/location', LocationController::class);
    Route::get('/clinicInventory', [SAInventoryController::class, 'clinicInventory'])->name('clinicInventory.index');
    Route::get('/itemsRent',[SAInventoryController::class, 'itemsRent'])->name('itemsRent.index');
    Route::get('/drugList',[SAInventoryController::class, 'drugList'])->name('drugList.index');
});

Route::middleware(['auth','role:head_of_department'])->name('hod.')->prefix('hod')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/requisitionForm', RequisitionFormController::class);
    Route::resource('/requisitionItem', RequisitionItemController::class);
    Route::put('/forward/{requisitionForm}', [RequisitionFormController::class, 'forward'])->name('requisitionForm.forward');
    Route::resource('/clinicalInventory', ClinicalInventoryController::class);
    Route::resource('/itemsRent', ItemsRentController::class);
    Route::resource('/drugList', DrugListController::class);
    Route::get('/foForm', [FOApprovedRequisitions::class, 'index'])->name('foForm.index');
    Route::get('/foForm/{requisitionForm}/edit', [FOApprovedRequisitions::class, 'edit'])->name('foForm.edit');
    Route::get('/ceoForm', [CEOApprovedRequisitionController::class, 'index'])->name('ceoForm.index');
    Route::get('/ceoForm/{requisitionForm}/edit', [CEOApprovedRequisitionController::class, 'edit'])->name('ceoForm.edit');
    Route::put('/ceoform/{requisitionForm}/edit', [CEOApprovedRequisitionController::class, 'requisitionStatus'])->name('requisitionStatus');
});

Route::middleware(['auth','role:finance_officer'])->name('financeOfficer.')->prefix('financeOfficer')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/requisitionForm', FORequisitionFormController::class);
    Route::put('/forward/{requisitionForm}', [FORequisitionFormController::class, 'forward'])->name('requisitionForm.forward');
    Route::get('/clinicInventory', [FOInventoryController::class, 'clinicInventory'])->name('clinicInventory.index');
    Route::get('/itemsRent',[FOInventoryController::class, 'itemsRent'])->name('itemsRent.index');
    Route::get('/drugList',[FOInventoryController::class, 'drugList'])->name('drugList.index');
    Route::get('/ceoForm', [ApprovedRequisitionsController::class, 'index'])->name('ceoForm.index');
    Route::get('/ceoForm/{requisitionForm}/edit', [ApprovedRequisitionsController::class, 'edit'])->name('ceoForm.edit');
});

Route::middleware(['auth','role:chief_executive_officer'])->name('ceo.')->prefix('ceo')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/requisitionForm', CEORequisitionFormController::class);
    Route::put('/forward/{requisitionForm}', [CEORequisitionFormController::class, 'forward'])->name('requisitionForm.forward');
    Route::get('/clinicInventory', [InventoryController::class, 'clinicInventory'])->name('clinicInventory.index');
    Route::get('/itemsRent',[InventoryController::class, 'itemsRent'])->name('itemsRent.index');
    Route::get('/drugList',[InventoryController::class, 'drugList'])->name('drugList.index');
    Route::get('/ceoForm', [CEOFormsController::class, 'index'])->name('ceoForm.index');
    Route::get('/ceoForm/{requisitionForm}/edit', [CEOFormsController::class, 'edit'])->name('ceoForm.edit');
});

require __DIR__.'/auth.php';
