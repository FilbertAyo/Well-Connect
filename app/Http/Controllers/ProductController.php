<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\UnverifiedPharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChMessage;

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
            if ($prod['quantity'] < 1) {
                // Delete the product if quantity is less than 1
                $prod->delete();
            } elseif ($prod['quantity'] >= 1 && $prod['quantity'] < 20) {
                // Update status to 'low' if quantity is between 1 and 19
                $prod->update(['status'=>'low']);
            } elseif ($prod['quantity'] >= 20) {
                // Update status to 'sufficient' if quantity is 20 or greater
                $prod->update(['status'=>'sufficient']);
            }

        }

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
            'user_id'=> $pharmacy->user_id,
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

        $product= Medicine::findOrFail($id);

        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $product= Medicine::findOrFail($id);

        $request->validate([
            'medicine_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'category' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'description' => 'required|regex:/^[a-zA-Z\s]+$/|max:400',
        ]);

        $product->update($request->all());

        return redirect()->route('stock.index')->with('success',"NCD medicine updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product= Medicine::findOrFail($id);

        $product->delete();

        return redirect()->route('stock.index')->with('success',"NCD Medicine deleted successfully");
    }

    public function stockStatus($id){
        $userId = Auth::id();

    // Find the pharmacy associated with the logged-in user
    $pharmacy = UnverifiedPharmacy::find($id);

    $user = User::where('email',$pharmacy->pharmacyEmail)->first();


    $product = Medicine::where('user_id', (string) $user->id)->get();

        foreach ($product as $prod) {
            // Check if quantity is below 20
            if ($prod['quantity'] < 1) {
                // Delete the product if quantity is less than 1
                $prod->delete();
            } elseif ($prod['quantity'] >= 1 && $prod['quantity'] < 20) {
                // Update status to 'low' if quantity is between 1 and 19
                $prod->update(['status'=>'low']);
            } elseif ($prod['quantity'] >= 20) {
                // Update status to 'sufficient' if quantity is 20 or greater
                $prod->update(['status'=>'sufficient']);
            }
        }

        return view('layout.statusOrder',compact('product','user'));
    }

    public function statusOrder(Request $request){

        $request->validate([
            'message' => 'required|string',
            'from_id' => 'required|integer',
            'to_id' => 'required|integer',
        ]);
    
        // Create and save the chat message
        $chat = new ChMessage();
        $chat->body = $request->input('message');
        $chat->from_id = $request->input('from_id');
        $chat->to_id = $request->input('to_id');
        $chat->seen = false;
        $chat->created_at = now();
        $chat->save();
    
        // Flash success message to the session
    session()->flash('success', 'Message sent successfully!');

    // Redirect back to the previous page
    return redirect()->back();
    }

}
