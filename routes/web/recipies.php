<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
  
  // Recipies Routes
  Route::get('/recipe', [RecipeController::class, 'index'])->name('recipe.index');
  Route::get('/recipe/new', [RecipeController::class, 'create'])->name('recipe.create');
  Route::post('/recipe', [RecipeController::class, 'store'])->name('recipe.store');

  Route::get('/recipe/{recipe}/show', [RecipeController::class, 'show'])->name('recipe.show');

  Route::get('/user/myrecipies', [RecipeController::class, 'userRecipies'])->name('user.myrecipies');
});