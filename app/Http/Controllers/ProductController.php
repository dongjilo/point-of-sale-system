<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('products.index', [
            'products' => Product::all()
        ]);

    }

    public function show(Product $product) {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {

        $formFields = $request->all();

        Product::create($formFields);



        return redirect('/products')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product) {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product) {
        $formFields = $request->all();
        $product->update($formFields);
        return redirect('products')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect('products');
    }
}
