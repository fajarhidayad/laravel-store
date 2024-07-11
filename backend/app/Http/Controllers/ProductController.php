<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return $this->success_data($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:255',
            'price' => 'integer|required|min:0',
            'stock' => 'integer|min:0',
            'status' => 'boolean',
            'category_id' => 'required|exists:App\Models\Category,id'
        ]);

        $product = Product::create($fields);

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
