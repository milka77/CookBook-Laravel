<?php
namespace App\Http\Controllers;

use Facade\FlareClient\Glows\Recorder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('admin')->group(function(){
   
    // Admin Routes
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/allrecipe', [AdminController::class, 'allRecipies'])->name('admin.allrecipies');

    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/new', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');

    Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::patch('/role/{role}/update', [RoleController::class, 'update'])->name('role.update');

    Route::delete('/role/{role}/destroy', [RoleController::class, 'destroy'])->name('role.destroy');

});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
