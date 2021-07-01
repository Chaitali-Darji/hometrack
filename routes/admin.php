<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\SettingController;

Route::middleware('auth')->group(static function () {

    //User
    Route::resource('users', UserController::class);
    Route::POST('/users/active-inactive/{id}', [UserController::class, 'activeInactive'])->name('admin.users.active-inactive');

    //Role
    Route::resource('roles', RoleController::class);
    Route::POST('/roles/active-inactive/{id}', [RoleController::class, 'activeInactive'])->name('admin.roles.active-inactive');

    //Archive
    Route::POST('/archive/restore', [ArchiveController::class, 'restore'])->name('admin.archive.restore');

    //Settings
    Route::resource('settings', SettingController::class);
    Route::POST('/settings/setting-change', [SettingController::class, 'changeSetting'])->name('settings.setting-change');
});