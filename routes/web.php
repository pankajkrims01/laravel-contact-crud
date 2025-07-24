<?php

use App\Http\Controllers\ImportUserController;

Route::get('/import-users', [ImportUserController::class, 'showForm'])->name('import.form');
Route::post('/import-users', [ImportUserController::class, 'import'])->name('import.users');
