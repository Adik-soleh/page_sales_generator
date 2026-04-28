<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $salesPages = auth()->user()->salesPages()->latest()->take(6)->get();
    $totalPages = auth()->user()->salesPages()->count();
    return view('dashboard', compact('salesPages', 'totalPages'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('sales-pages', SalesPageController::class);
    Route::get('sales-pages/{salesPage}/export', [SalesPageController::class, 'export'])
        ->name('sales-pages.export');
    Route::post('sales-pages/{salesPage}/regenerate-section', [SalesPageController::class, 'regenerateSection'])
        ->name('sales-pages.regenerate-section');
});

require __DIR__.'/auth.php';
