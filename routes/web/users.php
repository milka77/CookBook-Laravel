<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// User Routes
Route::middleware(['auth'])->group(function(){
  Route::get('/users', [UserController::class, 'index'])->name('user.index');
});