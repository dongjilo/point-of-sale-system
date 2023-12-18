<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorySaveRequest;
use App\Http\Requests\ProductSaveRequest;
use App\Http\Requests\SupplierSaveRequest;
use App\Http\Requests\InventorySaveRequest;
use App\Models\Billing;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Supplier;
use App\Models\SupplierOrder;
use App\Models\SupplierReceive;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    // products
    public function view_product() {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    public function store_product(ProductSaveRequest $request) {
            session()->forget('error');

            $product = new Product;
            $product->request->all();
            $product->save();

            return back()->with('success', 'Product added successfully!');
    }

    public function update_product(Request $request, Product $product) {
        try{
            $formFields = $request->all();
            $product->update($formFields);

            session()->forget('error');
            return back()->with('success', 'Product updated successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Product was not updated successfully.');
        }

    }

    public function destroy_product(Product $product) {
        try{
            $product->delete();
            session()->forget('error');
            return back()->with('success', 'Product deleted successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            if ($ex->getCode() === '23000') {
                return back()->with('error', 'Product cannot be deleted, because [Product: '.$product->product_name .'] is used elsewhere...');
            }else{
                return back()->with('error', 'Category was not deleted successfully.');
            }
        }
    }
    //end products



    // suppliers
    public function view_supplier() {
        return view('suppliers.index', [
            'suppliers' => Supplier::all()
        ]);
    }

    public function store_supplier(SupplierSaveRequest $request) {
            session()->forget('error');

            $supplier = new Supplier;
            $supplier->request->all();
            $supplier->save();

            return back()->with('success', 'Supplier added successfully!');
    }

    public function update_supplier(Request $request, Supplier $supplier) {
        try{
            $formFields = $request->all();
            $supplier->update($formFields);

            session()->forget('error');
            return back()->with('success', 'Supplier updated successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Supplier was not updated successfully.');
        }

    }

    public function destroy_supplier(Supplier $supplier) {
        try{
            $supplier->delete();

            session()->forget('error');
            return back()->with('success', 'Supplier deleted successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
           if ($ex->getCode() === '23000') {
                return back()->with('error', 'Supplier cannot be deleted, because [Supplier: '.$supplier->supplier_name .'] is used elsewhere...');
            }else{
                return back()->with('error', 'Category was not deleted successfully.');
            }
        }

    }
    // end suppliers



    //  category
    public function view_category() {
        return view('categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function store_category(CategorySaveRequest $request) {
       session()->forget('error');
            $category = new Category;
            $category->$request->all();
            $category->save();

            return back()->with('success', 'Category added successfully!');
    }

    public function update_category(Request $request, Category $category) {
        try{
            $formFields = $request->all();
            $category->update($formFields);

            session()->forget('error');
            return back()->with('success', 'Category updated successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Category was not updated successfully.');
        }

    }

    public function destroy_category(Category $category) {
        try{
            $category->delete();

            session()->forget('error');
            return back()->with('success', 'Category deleted successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            if ($ex->getCode() === '23000') {
                return back()->with('error', 'Category cannot be deleted, because [Category: '.$category->category_name .'] is used elsewhere...');
            }else{
                return back()->with('error', 'Category was not deleted successfully.');
            }
        }
    }
    // end category



    //  order
    public function view_order() {
        return view('orders.create', [
            'orders' => Order::all()
        ]);
    }

    public function store_order(Request $request) {
        try{
            $orderFormFields = $request->all();
            Order::create($orderFormFields);

            $orderItemFormFields = $request->all();
            OrderItem::create($orderItemFormFields);

            session()->forget('error');
            return back()->with('success', 'Order added successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Category was not added successfully.');
        }
    }

    public function update_order(Request $request, Order $order, OrderItem $orderItem) {
        try{
            $orderFormFields = $request->all();
            $orderItemFormFields = $request->all();

            $order->update($orderFormFields);
            $orderItem->update($orderItemFormFields);


            session()->forget('error');
            return back()->with('success', 'Category updated successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Category was not updated successfully.');
        }

    }

    public function destroy_order(Order $order, OrderItem $orderItem) {
        try{
            $order->delete();
            $orderItem->where('order_id', $order)->delete();
            session()->forget('error');
            return back()->with('success', 'Order deleted successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Order was not deleted successfully.');
        }
    }
    // end order

    // inventory
    public function view_inventory() {
        return view('inventories.index', [
            'inventories' => Inventory::all()
        ]);
    }

    public function store_inventory(InventorySaveRequest $request) {
        session()->forget('error');

            $inventory = new Inventory;
            $inventory->request->all();
            $inventory->save();

            return back()->with('success', 'Inventory added successfully!');
    }

    public function update_inventory(Request $request, Inventory $inventory) {
        try{
            $formFields = $request->all();
            $inventory->update($formFields);

            session()->forget('error');
            return back()->with('success', 'Inventory updated successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Inventory was not updated successfully.');
        }

    }

    public function destroy_inventory(Inventory $inventory) {
        try{
            $inventory->delete();

            session()->forget('error');
            return back()->with('success', 'Inventory added successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            if ($ex->getCode() === '23000') {
                return back()->with('error', 'Category cannot be deleted, because [Inventory ID: '.$inventory->inventory_id .'] is used elsewhere...');
            }else{
                return back()->with('error', 'Inventory was not deleted successfully.');
            }
        }
    }
    // end inventory

    // billings
    public function index() {
        return view('billings.index', [
            'billings' => Billing::all()
        ]);
    }


    // fetch data

    public function fetchAlmostOutOfStock()
    {
        $lowStock = Inventory::where('inventory_quantity', '<=', 20)->count();
        return response()->json([
            'success' => true,
            'message' => 'Products almost out of stock',
            'data' => $lowStock
        ], 200);
    }

    public function fetchNearlyExpiredProducts()
    {
        $nearlyExpiredProducts = Inventory::where('inventory_expiry', '<=', now()->addWeek())->count();
        return response()->json([
            'success' => true,
            'message' => 'Nearly expired products',
            'data' => $nearlyExpiredProducts
        ], 200);
    }

    public function fetchMonthlySales()
    {
        $monthlySales = Billing::select(
            DB::raw('MONTH(billing_date) as month'),
            DB::raw('SUM(billing_total_amount) as total_sales')
        )
            ->groupBy(DB::raw('MONTH(billing_date)'))
            ->orderBy(DB::raw('MONTH(billing_date)'))
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Monthly sales',
            'data' => $monthlySales
        ], 200);
    }

}
