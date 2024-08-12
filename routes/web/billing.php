<?php

declare(strict_types=1);

use App\Http\Controllers\Billing;
use Illuminate\Support\Facades\Route;

Route::get('/', Billing\IndexController::class)->name('index');
