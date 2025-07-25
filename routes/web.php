<?php

use App\Http\Controllers\ImportUserController;

Route::get('/', [ImportUserController::class, 'showForm'])->name('import.form');
Route::post('/', [ImportUserController::class, 'import'])->name('import.users');
