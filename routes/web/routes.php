<?php

declare(strict_types=1);

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth', 'verified'])->group(static function (): void {
    Route::inertia('/', 'Welcome')->name('home');
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(static function (): void {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('billing')->as('billing.')->group(base_path(
        path: 'routes/web/billing.php',
    ));
});

Route::middleware(['guest'])->group(base_path(
    path: 'routes/web/auth.php',
));

