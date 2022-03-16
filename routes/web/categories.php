<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
  
  // Categories Routes
  Route::get('/category', [CategoryController::class, 'index'])->name('cat.index');
  Route::get('/category/new', [CategoryController::class, 'create'])->name('cat.create');
  Route::post('/category', [CategoryController::class, 'store'])->name('cat.store');

  Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('cat.edit');
  Route::patch('/category/{category}/update', [CategoryController::class, 'update'])->name('cat.update');

  Route::delete('/category/{category}/destroy', [CategoryController::class, 'destroy'])->name('cat.destroy');

});