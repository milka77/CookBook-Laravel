<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('difficulty')->group(function(){
  
    // Difficulties routes
    Route::get('/', [DifficultyController::class, 'index'])->name('difficulty.index');
    Route::get('/new', [DifficultyController::class, 'create'])->name('difficulty.create');
    Route::post('/', [DifficultyController::class, 'store'])->name('difficulty.store');

    Route::get('/{difficulty}/edit', [DifficultyController::class, 'edit'])->name('difficulty.edit');
    Route::patch('/{difficulty}/update', [DifficultyController::class, 'update'])->name('difficulty.update');

    Route::delete('/{difficulty}/destroy', [DifficultyController::class, 'destroy'])->name('difficulty.destroy');
});