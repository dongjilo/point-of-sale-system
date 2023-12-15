<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Supplier;
use App\Models\SupplierOrder;
use App\Models\SupplierReceive;

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

    public function show_product(Product $product) {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function create_product() {
        return view('products.create');
    }

    public function store_product(Request $request) {
        $formFields = $request->all();
        Product::create($formFields);
        return redirect('/products')->with('success', 'Product created successfully!');
    }

    public function edit_product(Product $product) {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update_product(Request $request, Product $product) {
        $formFields = $request->all();
        $product->update($formFields);
        return redirect('products');
    }

    public function destroy_product(Product $product) {
        $product->delete();
        return redirect('products');
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

    //category
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
            return back()->with('success', 'Supplier added successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Supplier was not added successfully.');
        }
    }

    public function update_category(Request $request, Category $category) {
        try{
            $formFields = $request->all();
            $category->update($formFields);

            session()->forget('error');
            return back()->with('success', 'Supplier updated successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Supplier was not updated successfully.');
        }

    }

    public function destroy_category(Supplier $category) {
        try{
            $category->delete();

            session()->forget('error');
            return back()->with('success', 'Supplier deleted successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'Supplier was not deleted successfully.');
        }
    }
    // end suppliers


}
