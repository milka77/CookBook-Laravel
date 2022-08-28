<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('category')->group(function(){
  
  // Categories Routes
  Route::get('/', [CategoryController::class, 'index'])->name('cat.index');
  Route::get('/new', [CategoryController::class, 'create'])->name('cat.create');
  Route::post('/', [CategoryController::class, 'store'])->name('cat.store');

  Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('cat.edit');
  Route::patch('/{category}/update', [CategoryController::class, 'update'])->name('cat.update');

  Route::delete('/{category}/destroy', [CategoryController::class, 'destroy'])->name('cat.destroy');

});