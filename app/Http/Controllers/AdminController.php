<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
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

    public function store_product(Request $request) {
        try{
            $formFields = $request->all();
            Product::create($formFields);


            return back()->with('success', 'Product added successfully!');

        }catch (\Illuminate\Database\QueryException $ex){

            return back()->with('error', 'Product was not added successfully.');
        }
    }

    public function update_product(Request $request, Product $product) {
        try{
            $formFields = $request->all();
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

            return back()->with('success', 'Supplier added successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            return back()->with('error', 'Supplier was not added successfully.');
        }
    }

    public function update_supplier(Request $request, Supplier $supplier) {
        try{
            $formFields = $request->all();
            $supplier->update($formFields);

            return back()->with('success', 'Supplier updated successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            if ($ex->getCode() === '23000') {
                return back()->with('warning', 'Cannot be deleted, because the Product is used elsewhere...');
            }else{
                return back()->with('error', 'Supplier was not deleted successfully.');
            }
        }

    }

    public function destroy_supplier(Supplier $supplier) {
        try{

            $supplier->delete();

            return back()->with('success', 'Supplier deleted successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            if ($ex->getCode() === '23000') {
                return back()->with('warning', 'Cannot be deleted, because the Supplier is used elsewhere...');
            }else{

                return back()->with('error', 'Supplier was not deleted successfully.');
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

    public function store_category(Request $request) {
        try{
            $formFields = $request->all();
            Category::create($formFields);


            return back()->with('success', 'Category added successfully!');

        }catch (\Illuminate\Database\QueryException $ex){
            if ($ex->getCode() === '23000') {
                return back()->with('warning', 'Cannot be deleted, because the Category is used elsewhere...');
            }else{
                return back()->with('error', 'Category was not deleted successfully.');
            }
        }
    }

    public function update_category(Request $request, Category $category) {
        try{
            $formFields = $request->all();
            $category->update($formFields);


            return back()->with('success', 'Category updated successfully!');

        }catch (\Illuminate\Database\QueryException $ex){

            return back()->with('error', 'Category was not updated successfully.');
        }

    }

    public function destroy_category(Category $category) {
        try{
            $category->delete();

            return back()->with('success', 'Category deleted successfully!');

        }catch (\Illuminate\Database\QueryException $ex){

            return back()->with('error', 'Category was not deleted successfully.');
        }
    }
    // end suppliers
}
