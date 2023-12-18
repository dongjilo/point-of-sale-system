<?php

namespace App\Http\Controllers;

use App\Models\Bestseller;
use App\Models\Product;
use Illuminate\Http\Request;

class BestsellerController extends Controller
{
    public function index()
    {
        $bestsellers = Bestseller::all();
        return view('bestsellers.index', compact('bestsellers'));
    }
    public function fetchBestseller()
    {
        $bestseller = Bestseller::where('bestseller_month', now()->month)
            ->where('bestseller_year', now()->year)
            ->orderByDesc('bestseller_quantity_sold')
            ->orderByDesc('bestseller_total_sales')
            ->first();

        $productDetails = Product::find($bestseller->product_id);
        $bestseller->product_details = $productDetails;

        return response()->json([
            'success' => true,
            'message' => 'Best Seller of the Month',
            'data' => $bestseller
        ], 200);
    }
}
