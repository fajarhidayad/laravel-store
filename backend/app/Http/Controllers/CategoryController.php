<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return $categories;
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|max:100"
        ]);

        $category = Category::create($data);

        return $category;
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate(["name" => 'required|max:100']);

        $category->update($data);

        return $category;
    }

    public function destroy(Category $category)
    {
        $deleted = Category::find($category->id)->delete();

        return $deleted;
    }
}
