<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();

        foreach ($product as $prod) {
            // Check if quantity is below 20
            if ($prod['quantity']< 20) {
                // Update status to 'low'
                $prod->update(['status'=>'low']);
            } else {
                // Update status to 'enough'
                $prod->update(['status'=>'sufficient']);
            }
        }

        return view('layout.stock',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layout.stock');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData= $request->all();
        Product::create($requestData);
        return redirect()->route('stock.index')->with('success',"NCD medicine added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product= Product::findOrFail($id);

        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product= Product::findOrFail($id);

        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product= Product::findOrFail($id);

        $product->update($request->all());

        return redirect()->route('stock.index')->with('success',"NCD medicine updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product= Product::findOrFail($id);

        $product->delete();

        return redirect()->route('stock.index')->with('success',"NCD Medicine deleted successfully");
    }
}
