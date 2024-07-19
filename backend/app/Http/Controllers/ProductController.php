<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponses;

    public function latest(Request $request)
    {
        $limit = $request->query('limit', 5);
        $products = Product::where('status', 1)
            ->orderByDesc('created_at')
            ->take($limit)
            ->get();

        return $this->success_data($products);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return $this->success_data($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'required|image:jpg,jpeg,png|max:2048',
            'description' => 'max:255',
            'price' => 'integer|required|min:0',
            'stock' => 'integer|min:0',
            'status' => 'boolean',
            'category_id' => 'required|exists:App\Models\Category,id'
        ]);

        $image_path = $request->file('image')->store('products');

        $product = Product::create([
            'name' => $request->name,
            'image' => $image_path,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
            'category_id' => $request->category_id
        ]);

        return $this->success_data($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->success_data($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $fields = $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:255',
            'price' => 'numeric|required|min:0',
            'stock' => 'numeric|min:0',
            'status' => 'boolean',
            'category_id' => 'required|exists:App\Models\Category,id'
        ]);

        $product->update($fields);

        return $this->success_data($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $this->ok("success");
    }
}
