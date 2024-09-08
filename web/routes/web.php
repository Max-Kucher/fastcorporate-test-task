<?php

use App\Enum\Users\Permissions\Permissions;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome')
    ->middleware(['guest'])
    ->name('home');

Route::middleware(['auth'])->group(function () {
    Route::view('profile', 'profile')
        ->name('profile');

    Volt::route('admin/statistics', 'pages.admin.statistics')
        ->middleware('can:'.Permissions::VIEW_STATISTICS->value)
        ->name('statistics');

    Volt::route('admin/reports', 'pages.admin.reports')
        ->middleware('can:'.Permissions::VIEW_REPORTS->value)
        ->name('reports');
});

require __DIR__.'/auth.php';
