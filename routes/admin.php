<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::middleware('auth')->group(static function () {
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});