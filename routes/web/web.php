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

Route::middleware(['auth'])->group(function(){
    // Recipies Routes
    Route::get('/recipe', [RecipeController::class, 'index'])->name('recipe.index');
    Route::get('/recipe/new', [RecipeController::class, 'create'])->name('recipe.create');
    Route::post('/recipe', [RecipeController::class, 'store'])->name('recipe.store');

    Route::get('/recipe/{recipe}/show', [RecipeController::class, 'show'])->name('recipe.show');

    Route::get('/user/myrecipies', [RecipeController::class, 'userRecipies'])->name('user.myrecipies');

    // Admin Routes
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/allrecipe', [AdminController::class, 'allRecipies'])->name('admin.allrecipies');

    Route::get('/admin/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/admin/role/new', [RoleController::class, 'create'])->name('role.create');
    Route::post('/admin/role', [RoleController::class, 'store'])->name('role.store');

    Route::get('/admin/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::patch('/admin/role/{role}/update', [RoleController::class, 'update'])->name('role.update');

    Route::delete('/admin/role/{role}/destroy', [RoleController::class, 'destroy'])->name('role.destroy');

    
    // Categories Routes
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('cat.index');
    Route::get('/admin/category/new', [CategoryController::class, 'create'])->name('cat.create');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('cat.store');

    Route::get('/admin/category/{category}/edit', [CategoryController::class, 'edit'])->name('cat.edit');
    Route::patch('/admin/category/{category}/update', [CategoryController::class, 'update'])->name('cat.update');

    Route::delete('admin/category/{category}/destroy', [CategoryController::class, 'destroy'])->name('cat.destroy');

    // Difficulties routes
    Route::get('/admin/difficulty', [DifficultyController::class, 'index'])->name('difficulty.index');
    Route::get('/admin/difficulty/new', [DifficultyController::class, 'create'])->name('difficulty.create');
    Route::post('/admin/difficulty', [DifficultyController::class, 'store'])->name('difficulty.store');

    Route::get('/admin/difficulty/{difficulty}/edit', [DifficultyController::class, 'edit'])->name('difficulty.edit');
    Route::patch('/admin/difficulty/{difficulty}/update', [DifficultyController::class, 'update'])->name('difficulty.update');

    Route::delete('/admin/difficulty/{difficulty}/destroy', [DifficultyController::class, 'destroy'])->name('difficulty.destroy');
});
