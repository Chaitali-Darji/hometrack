<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\SMSTemplateController;
use App\Http\Controllers\Admin\SalesTaxController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SpecialPricingColumnController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\RegionController;

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

    //Sales Tax
    Route::resource('sales-tax', SalesTaxController::class);
    Route::POST('/sales-tax/active-inactive/{id}', [SalesTaxController::class, 'activeInactive'])->name('admin.sales-tax.active-inactive');

    //State
    Route::resource('states', StateController::class);
    Route::POST('/states/active-inactive/{id}', [StateController::class, 'activeInactive'])->name('admin.states.active-inactive');

    //Region
    Route::GET('/regions/get-dropdown-list', [RegionController::class, 'getDropdownList'])->name('admin.regions.get-dropdown-list');
    Route::resource('regions', RegionController::class);
    Route::POST('/regions/active-inactive/{id}', [RegionController::class, 'activeInactive'])->name('admin.regions.active-inactive');

    //Service Types
    Route::GET('/service-types/get-dropdown-list', [ServiceTypeController::class, 'getDropdownList'])->name('admin.service-types.get-dropdown-list');
    Route::resource('service-types', ServiceTypeController::class);
    Route::POST('/service-types/active-inactive/{id}', [ServiceTypeController::class, 'activeInactive'])->name('admin.service-types.active-inactive');

    //Services
    Route::POST('/services/update-order', [ServicesController::class, 'updateOrder'])->name('admin.services.update-order');
    Route::resource('services', ServicesController::class);
    Route::POST('/services/active-inactive/{id}', [ServicesController::class, 'activeInactive'])->name('admin.services.active-inactive');

    //Special Pricing Column
    Route::resource('special-pricing-columns', SpecialPricingColumnController::class);
    Route::POST('/special-pricing-columns/active-inactive/{id}', [SpecialPricingColumnController::class, 'activeInactive'])->name('admin.special-pricing-columns.active-inactive');

    //Pricing
    Route::resource('pricing', \App\Http\Controllers\Admin\PricingController::class);
    Route::POST('/pricing/active-inactive/{id}', [\App\Http\Controllers\Admin\PricingController::class, 'activeInactive'])->name('admin.pricing.active-inactive');
});
