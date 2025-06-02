<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    } //end of index function

    public function create()
    {
        return view('products.edit');
    }//end of create function

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);//end of validation
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product Created successfully');
    }//end of store product

    // ✅ Show single product (optional)
    public function show(Product $product)
    {
        return view('products.view', compact('product'));
    }

    // ✅ Show edit form
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // ✅ Update product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // ✅ Delete product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }


}
