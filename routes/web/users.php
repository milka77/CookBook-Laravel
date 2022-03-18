<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// User Routes
Route::middleware(['auth'])->group(function(){
  Route::get('/user', [UserController::class, 'index'])->name('user.index');
  Route::get('/user/{user}/show', [UserController::class, 'show'])->name('user.show');

  Route::put('/users/{user}/attach', [UserController::class, 'attach'])->name('user.role.attach');
  Route::put('/users/{user}/detach', [UserController::class, 'detach'])->name('user.role.detach');

});