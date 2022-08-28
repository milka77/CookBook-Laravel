<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// User Routes
Route::middleware(['auth', 'role:admin'])->prefix('roles')->group(function() {
  
  Route::get('/role', [RoleController::class, 'index'])->name('role.index');
  Route::get('/role/new', [RoleController::class, 'create'])->name('role.create');
  Route::post('/role', [RoleController::class, 'store'])->name('role.store');

  Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
  Route::patch('/role/{role}/update', [RoleController::class, 'update'])->name('role.update');

  Route::delete('/role/{role}/destroy', [RoleController::class, 'destroy'])->name('role.destroy');

});