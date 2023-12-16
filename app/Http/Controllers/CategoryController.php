<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('categories.index', [
            'categories' => Category::all()
        ]);

    }

    public function show(Category $supplier) {
        return view('categories.show', [
            'category' => $supplier
        ]);
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {

        $formFields = $request->all();

        Category::create($formFields);



        return redirect('/categories')->with('success', 'Category created successfully!');
    }

    public function edit(Category $supplier) {
        return view('categories.edit', [
            'category' => $supplier
        ]);
    }

    public function update(Request $request, Category $supplier) {
        $formFields = $request->all();
        $supplier->update($formFields);
        return redirect('categories');
    }

    public function destroy(category $supplier) {
        $supplier->delete();
        return redirect('categories');
    }
}
