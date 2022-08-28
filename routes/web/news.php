<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// News Routes
Route::middleware(['auth', 'role:admin'])->prefix('news')->group(function() {
  
  Route::get('', [NewsController::class, 'adminIndex'])->name('news.admin');
    
  Route::get('/create', [NewsController::class, 'create'])->name('news.create');
  Route::post('', [NewsController::class, 'store'])->name('news.store');

  Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
  Route::patch('/{news}/update', [NewsController::class, 'update'])->name('news.update');
  
  Route::delete('/{news}/destroy', [NewsController::class, 'destroy'])->name('news.destroy');

  Route::get('/{news}/show', [NewsController::class, 'show'])->name('news.show');

});