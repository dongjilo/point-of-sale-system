<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $cartData = [
            'products' => Product::all()
        ];
        return view('cart.index')->with($cartData);

    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');

        // Implement your logic to add the product to the cart here

        return response()->json(['message' => 'Product added to cart']);
    }
}
