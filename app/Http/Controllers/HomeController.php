<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recipies = Recipe::paginate();
        $recipiesSample = Recipe::inRandomOrder()->limit(4)->get();
        $my_news = News::limit(4)->orderBy('created_at', 'DESC')->get();

        $context = [
            'recipiesSample' => $recipiesSample,
            'recipies' => $recipies,
            'my_news' => $my_news,
        ];
        
        return view('home', $context);
    }
}
