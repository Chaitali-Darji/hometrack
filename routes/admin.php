<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

Route::middleware('auth')->group(static function () {

    //User
    Route::resource('users', UserController::class);
    Route::POST('/users/active-inactive/{id}', [UserController::class, 'activeInactive'])->name('admin.users.active-inactive');

    //Role
    Route::resource('roles', RoleController::class);
    Route::POST('/roles/active-inactive/{id}', [RoleController::class, 'activeInactive'])->name('admin.roles.active-inactive');
});