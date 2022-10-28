<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/change', [LangController::class, 'change'])->name('changeLang');

//admin routes
Route::middleware(['IsAdmin'])->group(function () {
    Route::get('/company/index', [CompanyController::class, 'index'])->name('index');
    Route::post('/store', [CompanyController::class, 'store'])->name('storeCompany');
    Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('editCompany');
    Route::post('update/{id}', [CompanyController::class, 'update'])->name('updateCompany');
    Route::get('/delete/{id}', [CompanyController::class, 'destroy'])->name('deleteCompany');
    Route::get('/employee-list', [CompanyController::class, 'employeeList'])->name('employeeList');
});

//user routes
Route::middleware(['IsUser'])->group(function () {
    Route::get('/myprofile', [EmployeeController::class, 'myprofile'])->name('myprofile');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('storeEmployee');
    Route::get('/myprofile/edit/{id}', [EmployeeController::class, 'edit'])->name('editProfile');
    Route::post('/myprofile/update/{id}', [EmployeeController::class, 'update'])->name('updateEmployee');
    Route::get('/myprofile/delete/{id}', [EmployeeController::class, 'destroy'])->name('leaveCompany');
    Route::get('/company/apply/{id}', [EmployeeController::class, 'index'])->name('apply');
});
