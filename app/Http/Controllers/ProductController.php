<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Medicine;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



            // Get the ID of the logged-in user
    $userId = Auth::id();

    // Find the pharmacy associated with the logged-in user
    $pharmacy = Pharmacy::where('user_id', $userId)->first();

    if ($pharmacy) {


        // If pharmacy found, fetch only the medicines associated with that pharmacy
        $product = Medicine::where('pharmacy_id', $pharmacy->id)->get();

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

        // return view('layout.stock',compact('product'));

        // Pass the filtered medicines to the view
        return view('layout.stock', compact('product'));
    } else {
        // Handle the case where no pharmacy is found for the logged-in user
        return redirect()->route('stock.index')->with('error', "No pharmacy found for the logged-in user.");
    }
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
        $validatedData = $request->validate([
            'medicine_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:100',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'category' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'description' => 'required|regex:/^[a-zA-Z\s]+$/|max:400',
        ]);

             // Get the ID of the logged-in user
    $userId = Auth::id();

    // Find the pharmacy associated with the logged-in user
    $pharmacy = Pharmacy::where('user_id', $userId)->first();

    // Merge the pharmacy's ID and name into the request data
    if ($pharmacy) {
        // If pharmacy found, merge its ID and name into the request data
        $requestData = array_merge($request->all(), [
            'pharmacy_id' => $pharmacy->id,
            'pharmacy_name' => $pharmacy->name,
        ]);
        Medicine::create($requestData);
        return redirect()->route('stock.index')->with('success',"NCD medicine added successfully");
    }
    else {
        // Handle the case where no pharmacy is found for the logged-in user
        return redirect()->route('stock.index')->with('error', "No pharmacy found for the logged-in user.");
    }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product= Medicine::findOrFail($id);

        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $product= Product::findOrFail($id);

        // return view('products.edit',compact('product'));

        $product= Medicine::findOrFail($id);

        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $product= Product::findOrFail($id);

        // $product->update($request->all());

        // return redirect()->route('stock.index')->with('success',"NCD medicine updated successfully");

        $product= Medicine::findOrFail($id);

        $product->update($request->all());

        return redirect()->route('stock.index')->with('success',"NCD medicine updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $product= Product::findOrFail($id);

        // $product->delete();

        // return redirect()->route('stock.index')->with('success',"NCD Medicine deleted successfully");

        $product= Medicine::findOrFail($id);

        $product->delete();

        return redirect()->route('stock.index')->with('success',"NCD Medicine deleted successfully");
    }
}
