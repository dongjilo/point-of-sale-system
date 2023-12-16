<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index() {
        return view('cart.index', ['products' => Product::all()]);
    }

    public function fetchAll() {
        $wrapper = array();
        $result = DB::table('products')->select('product_id','product_name', 'product_price')->get();
        foreach($result as $item){
            $data = array();
            foreach ($item as $key => $value){
                $data[] = $value;
            }
            $wrapper[] = $data;
        }
        return response()->json($wrapper);
    }

    public function store() {

    }
}
