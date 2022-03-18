<?php
namespace App\Http\Controllers;

use Facade\FlareClient\Glows\Recorder;
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

Route::middleware('auth')->group(function(){
   
    // Admin Routes
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/allrecipe', [AdminController::class, 'allRecipies'])->name('admin.allrecipies');

    Route::get('/admin/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/admin/role/new', [RoleController::class, 'create'])->name('role.create');
    Route::post('/admin/role', [RoleController::class, 'store'])->name('role.store');

    Route::get('/admin/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::patch('/admin/role/{role}/update', [RoleController::class, 'update'])->name('role.update');

    Route::delete('/admin/role/{role}/destroy', [RoleController::class, 'destroy'])->name('role.destroy');

});
