<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::get('/recipe', [RecipeController::class, 'index'])->name('recipe.index');
Route::get('/recipe/search', [RecipeController::class, 'search'])->name('recipe.search');
Route::get('/recipe/{recipe}/show', [RecipeController::class, 'show'])->name('recipe.show');

Route::middleware(['auth'])->group(function(){
  
  // Recipies Routes
  Route::get('/recipe/new', [RecipeController::class, 'create'])->name('recipe.create');
  Route::post('/recipe', [RecipeController::class, 'store'])->name('recipe.store');

  Route::get('/recipe/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipe.edit');
  Route::patch('/recipe/{recipe}/update', [RecipeController::class, 'update'])->name('recipe.update');

  Route::delete('/recipe/{recipe}/delete', [RecipeController::class, 'destroy'])->name('recipe.destroy');

  Route::get('/recipe/allrecipies', [RecipeController::class, 'allRecipies'])->name('recipe.allrecipies');
});