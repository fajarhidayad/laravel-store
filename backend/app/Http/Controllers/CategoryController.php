<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponses;

    public function index(Request $request)
    {
        $limit = $request->query('limit', 5);
        $categories = Category::take($limit)->get();

        return $this->success_data($categories);
    }

    public function show(Category $category)
    {
        return $this->success_data($category);
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
