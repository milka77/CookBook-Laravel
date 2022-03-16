<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
  
  
    // Difficulties routes
    Route::get('/difficulty', [DifficultyController::class, 'index'])->name('difficulty.index');
    Route::get('/difficulty/new', [DifficultyController::class, 'create'])->name('difficulty.create');
    Route::post('/difficulty', [DifficultyController::class, 'store'])->name('difficulty.store');

    Route::get('/difficulty/{difficulty}/edit', [DifficultyController::class, 'edit'])->name('difficulty.edit');
    Route::patch('/difficulty/{difficulty}/update', [DifficultyController::class, 'update'])->name('difficulty.update');

    Route::delete('/difficulty/{difficulty}/destroy', [DifficultyController::class, 'destroy'])->name('difficulty.destroy');
});