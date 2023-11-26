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
        $formFields = $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
        ]);

        Product::create($formFields);

        return redirect('/products')->with('success', 'Product created successfully!');
    }
}
