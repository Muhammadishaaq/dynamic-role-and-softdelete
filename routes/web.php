<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;


/* login */
Route::get('/', [LoginController::class, 'loginForm'])->name('loginPage');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function () {
   
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('roles', RoleController::class);
    Route::get('role/trashed', [RoleController::class, 'show'])->name('roles.trashed');
    Route::get('role/restore/{id}', [RoleController::class, 'restore'])->name('roles.restore');
    Route::delete('role/force-delete/{id}', [RoleController::class, 'forceDelete'])->name('roles.forceDelete');

    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/trashed', [PermissionController::class, 'show'])->name('permissions.trashed');
    Route::get('permissions/restore/{id}', [PermissionController::class, 'restore'])->name('permissions.restore');
    Route::delete('permissions/force-delete/{id}', [PermissionController::class, 'forceDelete'])->name('permissions.forceDelete');

    // Assign permissions to roles
    Route::get('roles/{role}/assign', [RoleController::class, 'assign'])->name('roles.assign');
    Route::post('roles/{role}/assign', [RoleController::class, 'assignPermission'])->name('roles.assignPermission');
    
    /* Employee routes */
    Route::resource('employees', EmployeeController::class); 


});


