<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// User Routes
Route::middleware(['auth'])->prefix('user')->group(function(){
  Route::get('/', [UserController::class, 'index'])->name('user.index');
  Route::get('/{user}/show', [UserController::class, 'show'])->name('user.show');

  Route::put('/{user}/attach', [UserController::class, 'attach'])->name('user.role.attach');
  Route::put('/{user}/detach', [UserController::class, 'detach'])->name('user.role.detach');

});