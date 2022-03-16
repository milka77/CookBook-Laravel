<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    //

    public function index() {
        $categories = Category::all();

        return view('admin.category.index', ['categories' => $categories]);
    }

    public function create() {
        return view('admin.category.new-category');
    }

    public function store() {

        // Field validation
        request()->validate([
            'name' => 'required|min:5',
        ]);

        $category = new Category;
        $category->name = Str::lower(request('name'));
        $category->name = Str::ucfirst($category->name);
        $category->slug = Str::slug(request('name'), '_');
        $category->save();

        Toastr::success('Category added successfuly!', 'System message');

        return back();
    }

    // Edit the category
    public function edit(Category $category) {
        return view('admin.category.edit-category', ['category'=>$category]);
    }

    // Update the category
    public function update(Category $category) {

        // Validations
        $inputs = request()->validate([
            'name' => 'required|min:5',
        ]);

        $category->name = Str::lower($inputs['name']);
        $category->name = Str::ucfirst($category->name);
        $category->slug = Str::slug($inputs['name'], '_');
        $category->save();

        Toastr::success('Category updated successfuly!', 'System message');

        return redirect(route('cat.index'));
    }

    // Deleting the category
    public function destroy(Category $category) {
        $category->delete();

        Toastr::success('Category was deleted!', 'System message');

        return redirect(route('cat.index'));
    }

}
