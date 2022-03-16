<?php
namespace App\Http\Controllers;

use Facade\FlareClient\Glows\Recorder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// User Routes
Route::middleware(['auth'])->group(function(){
  Route::get('/admin/users', [UserController::class, 'index'])->name('user.index');
});