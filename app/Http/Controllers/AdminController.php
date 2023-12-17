<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Supplier;
use App\Models\SupplierOrder;
use App\Models\SupplierReceive;
use App\Http\Requests\ProductSaveRequest;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class AdminController extends Controller
{

    // products
    public function view_product() {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    public function store_product(ProductSaveRequest $request) {
            $product = new Product();
            $product->request->all();

            $product->save();
            return back()->with('success', 'Product added successfully!');
    }

    public function update_product(Request $request, Product $product) {
        try{
            $formFields=$request->all();
            $product->update($formFields);

            return back()->with('success', 'Product updated successfully!');
        }catch (\Illuminate\Database\QueryException $ex){

            return back()->with('error', 'Product was not updated successfully.');
        }

    }

    public function destroy_product(Product $product) {
        try{
            $product->delete();

            return back()->with('success', 'Product deleted successfully!');
        }catch (\Illuminate\Database\QueryException $ex){
            return back()->with('error', 'Product was not deleted successfully.');
        }
    }
    //end products



    // suppliers
    public function view_supplier() {
        return view('suppliers.index', [
            'suppliers' => Supplier::all()
        ]);
    }

    public function store_supplier(Request $request) {
        try{
            $formFields = $request->all();
            Supplier::create($formFields);

            session()->forget('error');
            return back()->with('success', 'Supplier added successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Supplier was not added successfully.');
        }
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
            return back()->with('error', 'Supplier was not deleted successfully.');
        }

    }
    // end suppliers



    //  category
    public function view_category() {
        return view('categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function store_category(Request $request) {
        try{
            $formFields = $request->all();
            Category::create($formFields);

            session()->forget('error');
            return back()->with('success', 'Category added successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Category was not added successfully.');
        }
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
            session()->forget('success');
            return back()->with('error', 'Category was not deleted successfully.');
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

    public function store_inventory(Request $request) {
        try{
            $formFields = $request->all();
            Inventory::create($formFields);

            session()->forget('error');
            return back()->with('success', 'Inventory added successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Inventory was not added successfully.');
        }
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
            return back()->with('success', 'Inventory deleted successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Inventory was not deleted successfully.');
        }
    }
    // end inventory


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

}
