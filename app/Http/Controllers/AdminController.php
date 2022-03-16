<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function index() {
        return view('admin.index');
    }

    public function allRecipies() {
    //     $recipies = auth()->user()->recipies()->get();
        $recipies = Recipe::paginate(10);

        return(view('admin.recipe.index-recipe', ['recipies' => $recipies]));
    }
}
