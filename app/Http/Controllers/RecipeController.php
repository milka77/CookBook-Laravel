<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Difficulty;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Auth;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;


class RecipeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // The recipe index page
    public function index(){
        $recipies = Recipe::paginate(8);

        return view('recipe.index-recipe', ['recipies'=>$recipies]);
    }
    
    // Search in recipies
    public function search() {
        $q = request()->query('q');

        $recipies = Recipe::latest()->where('name', 'LIKE', "%{$q}%")->orWhere('info', 'LIKE', "%{$q}%")->orWhere('ingredients', 'LIKE', "%{$q}%")->paginate(8);

        return view('recipe.index-recipe', ['recipies'=>$recipies]);
    }

    // Show the new recipe form
    public function create()
    {
        $categories = Category::all();
        $difficulties = Difficulty::all();

        $context = [
            'categories' => $categories,
            'difficulties' => $difficulties,
        ];

        return view('recipe.new-recipe', $context);
    }

    // Store the new recipe in the DB
    public function store(Request $request)
    {
        // $this->authorize('create', Recipe::class);

        request()->validate([
            'name' => 'required|min:8|max:255',
            'info' => 'required|min:8|max:255',
            'prep_time' => 'required|max:5',
            'cooking_time' => 'required|max:5',
            'servings' => 'required|max:5',
            'category' => 'required',
            'difficulty' => 'required',
            'ingredients' => 'required',
            'cook_instructions' => 'required',
            'file_path' => 'file',
        ]);
        
        // Checking and removing the last character if the input ends with a comma
        $ingredients = $_REQUEST['ingredients'];
        if(str_ends_with($ingredients, ',')) {
            $ingredients = substr_replace($ingredients ,"",-1);
        }

        // Checking and removing the last character if the input ends with a comma
        $prep_instructions = $_REQUEST['preparations'];
        if(str_ends_with($prep_instructions, ',')) {
            $prep_instructions = substr_replace($prep_instructions ,"",-1);
        }

        // Checking and removing the last character if the input ends with a comma
        $cook_instructions = $_REQUEST['cook_instructions'];
        if(str_ends_with($cook_instructions, ',')) {
            $cook_instructions = substr_replace($cook_instructions ,"",-1);
        }

        // Checking and removing the last character if the input ends with a comma
        $tools = $_REQUEST['tools'];
        if(str_ends_with($tools, ',')) {
            $tools = substr_replace($tools ,"",-1);
        }

        
        $data = [
            'name' => $_REQUEST['name'],
            'info' => $_REQUEST['info'],
            'prep_time' => $_REQUEST['prep_time'],
            'cooking_time' => $_REQUEST['cooking_time'],
            'servings' => $_REQUEST['servings'],
            'user_id' => Auth()->user()->id,
            'category_id' => $_REQUEST['category'],
            'difficulty_id' => $_REQUEST['difficulty'],
            'ingredients' => $ingredients,
            'prep_instructions' => $prep_instructions,
            'cook_instructions' => $cook_instructions,
            'tools' => $tools,
        ];
        
        //Checking if recipe image exist
        if(request('file_path')){
            $data['file_path'] = request('file_path')->store('images', 's3');
        }



        // dd($data);

        auth()->user()->recipies()->create($data);

        Toastr::success('Recipe added successfuly!', 'System message');

        return redirect()->route('recipe.index');
    }

    // Show a single recipe
    public function show(Recipe $recipe) {
        return view('recipe.show-recipe', ['recipe'=>$recipe]);
    } 

    // Users and Admin's Admin panel
    public function allRecipies() {
        $myRecipies = auth()->user()->recipies()->paginate(10);
        $recipies = Recipe::paginate(10);

        $context = [
            'myRecipies' => $myRecipies,
            'recipies' => $recipies
        ];

        return view('admin.recipe.all-recipe', $context);
    }

    // Recipe edit function
    public function edit(Recipe $recipe) {
        $categories = Category::all();
        $difficulties = Difficulty::all();

        $context = [
            'categories' => $categories,
            'difficulties' => $difficulties,
            'recipe' => $recipe,
        ];

        return view('admin.recipe.edit-recipe', $context);
    }

    // Recipe update function
    public function update(Recipe $recipe) {
        request()->validate([
            'name' => 'required|min:8|max:255',
            'info' => 'required|min:8|max:255',
            'prep_time' => 'required|max:5',
            'cooking_time' => 'required|max:5',
            'servings' => 'required|max:5',
            'category' => 'required',
            'difficulty' => 'required',
            'ingredients' => 'required',
            'cook_instructions' => 'required',
            'file_path' => 'file',
        ]);

        // Checking and removing the last character if the input ends with a comma
        $ingredients = $_REQUEST['ingredients'];
        if(str_ends_with($ingredients, ',')) {
            $ingredients = substr_replace($ingredients ,"",-1);
        }

        // Checking and removing the last character if the input ends with a comma
        $prep_instructions = $_REQUEST['preparations'];
        if(str_ends_with($prep_instructions, ',')) {
            $prep_instructions = substr_replace($prep_instructions ,"",-1);
        }

        // Checking and removing the last character if the input ends with a comma
        $cook_instructions = $_REQUEST['cook_instructions'];
        if(str_ends_with($cook_instructions, ',')) {
            $cook_instructions = substr_replace($cook_instructions ,"",-1);
        }

        // Checking and removing the last character if the input ends with a comma
        $tools = $_REQUEST['tools'];
        if(str_ends_with($tools, ',')) {
            $tools = substr_replace($tools ,"",-1);
        }

   
        $recipe->name = $_REQUEST['name'];
        $recipe->info = $_REQUEST['info'];
        $recipe->prep_time = $_REQUEST['prep_time'];
        $recipe->cooking_time = $_REQUEST['cooking_time'];
        $recipe->servings = $_REQUEST['servings'];
        $recipe->user_id = Auth()->user()->id;
        $recipe->category_id = $_REQUEST['category'];
        $recipe->difficulty_id = $_REQUEST['difficulty'];
        $recipe->ingredients = $ingredients;
        $recipe->prep_instructions = $prep_instructions;
        $recipe->cook_instructions = $cook_instructions;
        $recipe->tools = $tools;
        

        // Checking if recipe image exist
        if(request('file_path')){
            $recipe->file_path = request('file_path')->store('images', 's3');
        }

        // dd($recipe);
        $recipe->save();

        Toastr::success('Recipe updated successfuly!', 'System message');

        return redirect(route('recipe.index'));
    }

    // Deleting a recipe 
    public function destroy(Recipe $recipe) {
        $recipe->delete();

        Toastr::success('Recipe was deleted successfuly!', 'System message');

        return redirect(route('user.myrecipies'));
    }
}
