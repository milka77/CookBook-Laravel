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

Route::get('/news', [NewsController::class, 'index'])->name('news.index');

Route::middleware('auth')->prefix('admin')->group(function(){
   
    // Admin Routes
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/allrecipe', [AdminController::class, 'allRecipies'])->name('admin.allrecipies');




});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
