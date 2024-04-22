<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\UnverifiedPharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pharmacy = UnverifiedPharmacy::all();

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


        // $fileName = time().$request->file('certification','un_pharmacy_image')->getClientOriginalName();
        // $path = $request->file('certification','un_pharmacy_image')->storeAs('folder',$fileName,'public');
        // $requestData['certification'] = '/storage/'.$path;
        // $requestData['un_pharmacy_image'] = '/storage/'.$path;
        // UnverifiedPharmacy::create($requestData);


        $certification=$request->certification;
        $certification_name=time().'.'.$certification->getClientOriginalExtension();
        $request->certification->move('cert_image',$certification_name);

        $un_pharmacy_image=$request->un_pharmacy_image;
        $un_pharmacy_name=time().'.'.$un_pharmacy_image->getClientOriginalExtension();
        $request->un_pharmacy_image->move('pharmacy_image',$un_pharmacy_name);


        UnverifiedPharmacy::create($requestData);

        // $fileName = time().$request->file('un_pharmacy_image')->getClientOriginalName();
        // $path = $request->file('un_pharmacy_image')->storeAs('folder',$fileName,'public');
        // $requestData['un_pharmacy_image'] = '/storage/'.$path;
        // UnverifiedPharmacy::create($requestData);

        // $fileName = time().$request->file('licence')->getClientOriginalName();
        // $path = $request->file('licence')->storeAs('folder',$fileName,'public');
        // $requestData['licence'] = '/storage/'.$path;
        // Pharmacy::create($requestData);


        return redirect()->back()->with('success',"Verification sent successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pharmacy= UnverifiedPharmacy::findOrFail($id);

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
