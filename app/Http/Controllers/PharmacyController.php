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

        $validatedData =  $request->validate([
            'pharmacyName' => 'required|regex:/^[a-zA-Z\s]+$/|max:100', // Ensure the name contains only alphabetic characters
            'street' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'region' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'city' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'contact' => [
                'required',
                'regex:/^0[67][0-9]{8}$/'
            ],
            'pharmacyEmail' => 'required',
            'certification'=> 'required',
            'un_pharmacy_image'=>'required',
            // 'file'=>'required',
        ]);

        $pharmacy = UnverifiedPharmacy::create([
            'pharmacyName' => $request->pharmacyName,
            'street' => $request->street,

            'region'=> $request->region,
            'city'=> $request->city,
            'contact'=> $request->contact,
            'pharmacyEmail'=> $request->pharmacyEmail,
            'certification'=> $request->certification,
            'un_pharmacy_image'=> $request->un_pharmacy_image,
            // 'file'=> null, //Default value if no file is uploaded
        ]);

        if ($request->hasFile('certification')) {
            $certification = $request->file('certification');
            $certification_name = time().'.'.$certification->getClientOriginalExtension();
            $certification->move('cert_image', $certification_name);
            $pharmacy->certification = $certification_name;
            $pharmacy->save();
        }

         if ($request->hasFile('un_pharmacy_image')) {
            $un_pharmacy_image = $request->file('un_pharmacy_image');
            $un_pharmacy_name = time().'.'.$un_pharmacy_image->getClientOriginalExtension();
            $un_pharmacy_image->move('pharmacy_image', $un_pharmacy_name);
            $pharmacy->un_pharmacy_image = $un_pharmacy_name;
            $pharmacy->save();
        }



        return redirect()->back()->with('success',"Request sent successfully, Wait for verification ...");

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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function registered(){

        $pharmacy = UnverifiedPharmacy::all();

        return view('layout.registered_pharma',compact('pharmacy'));
    }

    public function pending(){

        $pharmacy = UnverifiedPharmacy::all();

        return view('layout.pending_pharma',compact('pharmacy'));
    }
}
