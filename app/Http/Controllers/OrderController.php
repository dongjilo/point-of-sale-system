<?php

namespace App\Http\Controllers;

use App\Models\Bestseller;
use App\Models\Billing;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function create()
    {
        return view('orders.create');
    }

    public function index()
    {
        $orders = Order::with('user')->get();
        return view('orders.index', compact('orders'));
    }


    public function fetchProducts()
    {
        $wrapper = array();
        $result = Product::select(
            'products.product_id',
            'products.product_name',
            'products.product_price',
            'inventories.inventory_id',
            DB::raw('SUM(inventories.inventory_quantity) as inventory_quantity'),
            DB::raw('MIN(inventories.inventory_expiry) as inventory_expiry')
        )
            ->join('inventories', 'products.product_id', '=', 'inventories.product_id')
            ->where('inventories.inventory_quantity', '>', 0)
            ->groupBy(
                'products.product_id',
                'products.product_name',
                'products.product_price',
                'inventories.inventory_id',
                'inventories.inventory_expiry'
            )
            ->orderBy('inventories.inventory_expiry', 'asc')
            ->get();

        $response = $result->toArray();
        return  response()->json($response);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'product_expiry' => 'required',
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
            $order->order_date = now();
            $order->save();
            $order_id = $order->order_id;

            // order_items model
            for ($product_id = 0; $product_id < count($request->product_id); $product_id++) {
                $order_item = new OrderItem;
                $order_item->order_id = $order_id;
                $order_item->product_id = $request->product_id[$product_id];
                $order_item->order_item_quantity = $request->product_quantity[$product_id];
                $order_item->order_item_subtotal = $request->total[$product_id];
                $order_item->save();

                $inventory = Inventory::where('product_id', $request->product_id[$product_id])
                    ->where('inventory_id', $request->inventory_id[$product_id])
                    ->first();

                $inventory->inventory_quantity -= $request->product_quantity[$product_id];
                $inventory->save();
            }

            foreach ($request->product_id as $key => $productId) {
                $quantitySold = $request->product_quantity[$key];
                $totalRevenue = $request->total[$key];

                Bestseller::updateOrCreate(
                    ['product_id' => $productId, 'bestseller_month' => now()->month, 'bestseller_year' => now()->year],
                    ['bestseller_quantity_sold' => DB::raw("bestseller_quantity_sold + $quantitySold"), 'bestseller_total_sales' => DB::raw("bestseller_total_sales + $totalRevenue")]
                );
            }

            // billings model
            $billing = new Billing;
            $billing->order_id = $order_id;
            $billing->user_id = Auth::id();
            $billing->billing_payment_method = $request->payment_method;
            $billing->billing_total_amount = $request->order_total;
            $billing->billing_amount_tendered = $request->amount_paid;
            $billing->billing_date = now();
            $billing->save();

            // inventory model

            // bestseller model
        });

        return redirect('/orders_create')->with('success', 'Transaction Successful!');
    }

    public function fetchSalesCount() {
        $lastMonthOrders = Billing::where('created_at', '>=', now()->subMonth())->count();
        return response()->json([
            'success' => true,
            'message' => 'Sales count for the last month',
            'data' => $lastMonthOrders
        ], 200);
    }
}
