<?php

use App\Http\Controllers\HandleParseRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowParsePageController;
use App\Jobs\BlogParsingJob;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return to_route('parse.show');
});

Route::get('/dashboard', function () {
    return to_route('parse.show');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/parse', ShowParsePageController::class)->name('parse.show');
    Route::post('/parse', HandleParseRequestController::class)->name('parse.start');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
