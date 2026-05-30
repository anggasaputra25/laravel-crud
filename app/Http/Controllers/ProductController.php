<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('AddProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "color" => "required",
            "category" => "required",
            "price" => "required",
        ]);

        Product::create($validatedData);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return Inertia::render('Welcome', [
            'products' => $product->all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        return Inertia::render('EditProduct', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        $validatedData = $request->validate([
            "name" => "required",
            "color" => "required",
            "category" => "required",
            "price" => "required",
        ]);

        $product->update($validatedData);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Product::destroy($id);

        return redirect()->back();
    }
}
