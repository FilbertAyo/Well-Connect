<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pharmacy = Pharmacy::all();

        return view('layout.system_admin',compact('pharmacy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $requestData= $request->all();
        $fileName = time().$request->file('licence')->getClientOriginalName();
        $path = $request->file('licence')->storeAs('folder',$fileName,'public');
        $requestData['licence'] = '/storage/'.$path;
        Pharmacy::create($requestData);

        return redirect()->back()->with('success',"Product added successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pharmacy= Pharmacy::findOrFail($id);

        return view('layout.pharmacy_details',compact('pharmacy'));
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
