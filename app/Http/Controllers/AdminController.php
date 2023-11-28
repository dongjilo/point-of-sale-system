<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\UserType;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function save_category(Request $request){
        $data = new Category;
        $data->category_name=$request->categoryName;
        $data->category_desc=$request->categoryDesc;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully!');

    }

    function save_supplier(Request $request){
        $data = new Supplier;
        $data->supplier_name=$request->supplierName;
        $data->supplier_phone=$request->supplierPhone;
        $data->supplier_email=$request->supplierEmail;

        $data->save();

        return redirect()->back()->with('message', 'Supplier Added Successfully!');
    }

    function save_usertype(Request $request){
        $data = new UserType;
        $data->category_name=$request->categoryName;
        $data->category_desc=$request->categoryDesc;
        $data->save();

        return redirect()->back()->with('message', 'User Type Added Successfully!');

    }
}
