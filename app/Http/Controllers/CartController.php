<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function fetchProducts()
    {
        $wrapper = array();
        $result = DB::table('products')->select('product_id', 'product_name', 'product_price')->get();
        foreach ($result as $item) {
            $data = array();
            foreach ($item as $key => $value) {
                $data[] = $value;
            }
            $wrapper[] = $data;
        }
        return response()->json($wrapper);
    }

    public function fetchInventories()
    {
        $wrapper = array();
        $result = DB::table('inventories')->select('inventory_id', 'inventory_location')->get();
        foreach ($result as $item) {
            $data = array();
            foreach ($item as $key => $value) {
                $data[] = $value;
            }
            $wrapper[] = $data;
        }
        return response()->json($wrapper);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'inventory_id' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
            'total' => 'required',
            'payment_method' => 'required',
            'amount_paid' => 'required',
            'order_total' => 'required'
        ]);
        DB::transaction(function () use ($request) {
            // order model
            $order = new Order;
            $order->user_id = Auth::id();
            $order->order_date = date_create();
            $order->save();
            $order_id = $order->order_id;

            // order_items model
            for ($product_id = 0; $product_id < count($request->product_id); $product_id++) {
                $order_item = new OrderItem;
                $order_item->order_id = $order_id;
                $order_item->product_id = $request->product_id[$product_id];
                $order_item->inventory_id = $request->inventory_id[$product_id];
                $order_item->order_item_quantity = $request->product_quantity[$product_id];
                $order_item->order_item_subtotal = $request->total[$product_id];
                $order_item->save();
            }

            // billings model
            $billing = new Billing;
            $billing->order_id = $order_id;
            $billing->user_id = Auth::id();
            $billing->billing_payment_method = $request->payment_method;
            $billing->billing_bank_name = $request->bank_name;
            $billing->billing_bank_account = $request->bank_account;
            $billing->billing_total_amount = $request->order_total;
            $billing->billing_amount_tendered = $request->amount_paid;
            $billing->billing_date = date_create();
            $billing->save();

        });

        return redirect('/cart')->with('success', 'Transaction Successful!');
    }
}
