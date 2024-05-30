<?php

namespace App\Http\Controllers;


use App\Models\OrderedMedicine;
use App\Models\Pharmacy;
use App\Models\PharmacyOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $userId = Auth::id();
          // Find the pharmacy associated with the logged-in user
    $pharmacy = Pharmacy::where('user_id', $userId)->first();

    if ($pharmacy) {

        // $order = PharmacyOrder::with('orderedMedicine')->get();
          // If pharmacy found, fetch only the medicines associated with that pharmacy
          $order = PharmacyOrder::where('pharmacy_id', $pharmacy->id)->get();
        $orderedMedicine = OrderedMedicine::with('orders')->get();

        return view('layout.order', compact('order','orderedMedicine'));
    }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //it should be from the app side of the patient
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // the same for the create ,should be from the app
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = PharmacyOrder::findOrFail($id);
        // $orders = Order::with('orderedMedicine')->get();
        $orderedMedicine = OrderedMedicine::where('pharmacy_order_id',$order->user_id)->get();

        // $order = PharmacyOrder::where('user_id', $user_id)->firstOrFail();

        // $orderedMedicines = $order->orderedMedicines;


        return view('layout.order_details', compact('order','orderedMedicine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
