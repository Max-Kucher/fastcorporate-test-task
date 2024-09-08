<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')
    ->middleware(['guest'])
    ->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
