<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {
        return view('suppliers.index', [
            'suppliers' => Supplier::all()
        ]);

    }

    public function show(Supplier $supplier) {
        return view('suppliers.show', [
            'supplier' => $supplier
        ]);
    }

    public function create() {
        return view('suppliers.create');
    }

    public function store(Request $request) {

        $formFields = $request->all();

        Supplier::create($formFields);



        return redirect('/suppliers')->with('success', 'Supplier created successfully!');
    }

    public function edit(Supplier $supplier) {
        return view('suppliers.edit', [
            'supplier' => $supplier
        ]);
    }

    public function update(Request $request, Supplier $supplier) {
        $formFields = $request->all();
        $supplier->update($formFields);
        return redirect('suppliers');
    }

    public function destroy(supplier $supplier) {
        $supplier->delete();
        return redirect('suppliers');
    }
}
