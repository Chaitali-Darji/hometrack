<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\SMSTemplateController;   

Route::middleware(['auth','roles.auth'])->group(static function () {

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

    //Client
    Route::resource('clients', ClientController::class);
    Route::POST('/clients/active-inactive/{id}', [ClientController::class, 'activeInactive'])->name('admin.clients.active-inactive');

    //Email Template
    Route::resource('email-templates', EmailTemplateController::class);

    //SMS Template
    Route::resource('sms-templates', SMSTemplateController::class);
    Route::POST('/sms-templates/change-sms-template', [SMSTemplateController::class, 'changeSmsTemplate'])->name('admin.sms-templates.change-sms-template');
    Route::POST('/sms-templates/change-appointment-reminder', [SMSTemplateController::class, 'changeAppointmentReminder'])->name('admin.sms-templates.change-appointment-reminder');
    Route::POST('/sms-templates/send-test', [SMSTemplateController::class, 'sendTestSMS'])->name('admin.sms-templates.send-test');
});