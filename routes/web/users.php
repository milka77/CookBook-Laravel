<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// User Routes
Route::middleware(['auth'])->prefix('user')->group(function() {
  Route::get('/{user}/show', [UserController::class, 'show'])->name('user.show');

  Route::patch('/{user}/update', [UserController::class, 'update'])->name('user.update');
});

Route::middleware(['auth', 'role:admin'])->prefix('user')->group(function() {
  Route::get('/', [UserController::class, 'index'])->name('user.index');
  
  Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('user.destroy');

  Route::put('/{user}/attach', [UserController::class, 'attach'])->name('user.role.attach');
  Route::put('/{user}/detach', [UserController::class, 'detach'])->name('user.role.detach');

});