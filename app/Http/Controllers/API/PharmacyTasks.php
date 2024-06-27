<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RiskAssesment;
use App\Models\Pharmacy;
use App\Models\Medicine;
use App\Models\Cart;
use App\Models\cartHistory;
use App\Models\PharmacyOrder;
use App\Models\Chatgpt;
use App\Models\Profile;
use App\Models\OrderedMedicine;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PharmacyTasks extends Controller
{
    //
    public function riskAssesment(Request $request) {
        try{
            $validateUser = Validator::make($request->all(), [
                'age' => 'required|integer|min:1|max:120',
                'weight' => 'required|numeric|min:10|max:300',
                'height' => 'required|numeric|min:1.64|max:8.2',
                'pressure' =>  ['required','string', 'regex:/^\d{2,3}\/\d{2,3}$/',
                    function ($attribute, $value, $fail) {
                        list($systolic, $diastolic) = explode('/', $value);

                        if ($systolic < 60 || $systolic > 180 || $diastolic < 40 || $diastolic > 120) {
                            $fail('The '.$attribute.' must be between 60/40 mmHg and 180/120 mmHg.');
                        }
                    },
                ],
                'sugar' => 'required|numeric|min:50|max:300',
            ]);
            if($validateUser->fails()){
                return response()->json([
                    'status'=>false,
                    'messege'=>'validation error',
                    'error'=>$validateUser->errors()
                ],401);
            }

             // Get the authenticated user
        $user = auth()->user();
        // Fetch email and username from the authenticated user
        $email = $user->email;
        $username = $user->name;
        $riskAssesment = RiskAssesment::where('email', $user->email)->first();

         if (!$riskAssesment) {
            // Profile doesn't exist, create a new one
            $riskAssesment = new RiskAssesment();
            $riskAssesment->email = $email; // Set email retrieved from the authenticated user
            $riskAssesment->username = $username; // Set username retrieved from the authenticated user
        }
        // Update profile fields with the validated data and user's email/username
        $riskAssesment->email = $email;
        $riskAssesment->username = $username;
        $riskAssesment->age = $request->age;
        $riskAssesment->weight = $request->weight;
        $riskAssesment->height = $request->height;
        $riskAssesment->pressure = $request->pressure;
        $riskAssesment->sugar = $request->sugar;


            $riskAssesment->save();
            return response()->json([
                'status' => true,
                'message' => 'data sent successfully']);
    }
    catch(\Throwable $th){
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
        ], 500);
    }
}

public function getPharmacy()
    {
        try {
            // Retrieve all pharmacies
            $pharmacies = Pharmacy::with('medicines')->get();

            if(!$pharmacies){
                return response()->json([
                    'status'=>false,
                    'messege'=>'no pharmacy available',
                ],401);
            }

            return response()->json([
                'status' => true,
                'data' => $pharmacies,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
    public function getMedicine()
{
    try {
        // Fetch all medicines with eager loading of pharmacies
        $medicines = Medicine::with('pharmacy')->get();

        if (!$medicines) {
            return response()->json([
                'status' => false,
                'message' => 'No medicines available',
            ], 401);
        }

        // Group medicines by name
        $groupedMedicines = $medicines->groupBy('medicine_name');

        // Prepare response data
        $data = [];
        foreach ($groupedMedicines as $medicineName => $medicineGroup) {
            $firstMedicine = $medicineGroup->first(); // Get first medicine object

            $data[] = [
                'id' => $firstMedicine->id,
                'pharmacy_id' => $firstMedicine->pharmacy_id, // Consider using null if pharmacy_id is not consistent within the group
                'pharmacy_name' => '', // Placeholder, can be filled if needed
                'medicine_name' => $medicineName,
                'category' => $firstMedicine->category,
                'price' => $firstMedicine->price,
                'quantity' => $firstMedicine->quantity,
                'description' => $firstMedicine->description,
                'created_at' => $firstMedicine->created_at,
                'updated_at' => $firstMedicine->updated_at,
                'pharmacies' => $medicineGroup->pluck('pharmacy')->unique()->values()->toArray(), // Combine, de-duplicate, and convert to standard array
            ];
        }

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
        ], 500);
    }
}
public function addToCart(Request $request)
{
    try{
        // Validate request data
        $validateUser = Validator::make($request->all(), [
            'pharmacyName' => 'required|string',
            'medicineName' => 'required|string',
            'medicineCategory' => 'required|string',
            'medicinePrice' => 'required|numeric',
            'pharmacyLocation' => 'nullable|string',
          ]);

        if($validateUser->fails()){
          return response()->json([
              'status'=>false,
              'messege'=>'validation error',
              'error'=>$validateUser->errors()
          ],401);
      }

        // Get user ID (assuming you have a logged-in user)
        $userId = auth()->id();
        $pharmacy = Pharmacy::where('name', $request->pharmacyName)->first();
        if (!$pharmacy) {
            return response()->json([
                'status' => false,
                'message' => 'Pharmacy not found',
            ], 404);
        }

        // Create a new Cart item
        $cart = Cart::create([
            'user_id' => $userId,
            'pharmacy_id' => $pharmacy->id, // Use the retrieved pharmacy_id
            'pharmacyName' => $request->pharmacyName,
            'medicineName' => $request->medicineName,
            'medicineCategory' => $request->medicineCategory,
            'medicinePrice' => $request->medicinePrice,
            'pharmacyLocation' => $request->pharmacyLocation,
        ]);

        $cart->save();
        if ($cart) {
            // Item added successfully
            return response()->json([
              'status' => true,
              'message' => 'Item added to cart successfully!',
              'data' => $cart,
            ]);
          } else {
            // Item addition failed (handle error)
            return response()->json([
              'status' => false,
              'message' => 'Failed to add item to cart.', // Provide a specific error message
            ], 500);
          }
    }
    catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
        ], 500);
    }
}
/*public function addToCart(Request $request){
    try{$validateUser = Validator::make($request->all(), [
        'pharmacyName' => 'required|string',
        'medicineName' => 'required|string',
        'medicineCategory' => 'required|string',
        'medicinePrice' => 'required|numeric',
        'pharmacyLocation' => 'nullable|string',]);

        if($validateUser->fails()){
            return response()->json([
                'status'=>false,
                'messege'=>'validation error',
                'error'=>$validateUser->errors()
            ],401);}

    $user = auth()->user();
    $cart=new Cart();
    $cart->user_id=$user->id;
    $cart->pharmacyName=$request->pharmacyName;
    $cart->medicineName=$request->medicineName;
    $cart->medicineCategory = $request->medicineCategory;
    $cart->medicinePrice = $request->medicinePrice;
    $cart->pharmacyLocation = $request->pharmacyLocation;
    $cart->save();

    return response()->json([
        'status' => true,
        'message' => 'Item added to cart successfully!',
        'data' => $cart,
      ]);}
      catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
        ], 500);
    }
}*/
public function getMyCart()
{
    try {
        // Get the authenticated user (assuming a logged-in user)
    $user = auth()->user();

    // Retrieve cart items for the authenticated user
    $cartItems = Cart::where('user_id', $user->id)->get();

        if(!$cartItems->isEmpty()) {
            return response()->json([
                'status' => true,
                'data' => $cartItems
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No orders found.'
            ], 404);
        }
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
}

public function getMyCartHistory()
{
    try {
        // Get the authenticated user (assuming a logged-in user)
    $user = auth()->user();

    // Retrieve cart items for the authenticated user
    $cartHistoryItems = cartHistory::where('order_id', $user->id)->get();

        if(!$cartHistoryItems->isEmpty()) {
            return response()->json([
                'status' => true,
                'data' => $cartHistoryItems
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No orders found.'
            ], 404);
        }
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
}
public function deleteCartItem($id)
    {
        $cartItem = Cart::find($id);

        if (!$cartItem) {

            return response()->json([
                'status'=>false,
                'message' => 'Cart item not found'], 404);
        }

        $cartItem->delete();

        return response()->json([
            'status' => true,
            'message' => 'Cart item deleted successfully'], 200);
    }

    public function deleteCartHistoryItem($id)
    {
        $cartHistoryItem = cartHistory::find($id);

        if (!$cartHistoryItem) {

            return response()->json([
                'status'=>false,
                'message' => 'Cart item not found'], 404);
        }

        $cartHistoryItem->delete();

        return response()->json([
            'status' => true,
            'message' => 'Cart item deleted successfully'], 200);
    }


    public function moveCartsToOrderHistory()
{
    try {
        // Get the authenticated user
        $user = Auth::user();

        // Get all carts belonging to the authenticated user
        $carts = Cart::where('user_id', $user->id)->get();

        // Array to store all order history data
        $orderHistoryData = [];

        // Move each cart to order history (with null order_id as confirmed order might not exist yet)
        foreach ($carts as $cart) {
            $cartHistory = cartHistory::create([
                'order_id' => $user->id, // Set order ID to null if not using separate orders table
                'pharmacyName' => $cart->pharmacyName,
                'medicineName' => $cart->medicineName,
                'medicineCategory' => $cart->medicineCategory,
                'medicinePrice' => $cart->medicinePrice,
                'pharmacyLocation' => $cart->pharmacyLocation,
                // Add other necessary fields
            ]);

            // Add the created order history to the array
            $orderHistoryData[] = $cartHistory;
        }

        // Delete all carts belonging to the authenticated user
        Cart::where('user_id', $user->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Carts moved to order history successfully',
            'data'=>$orderHistoryData
        ], 200);
    } catch (Exception $e) {
        // Handle error
        return response()->json(['error' => 'Failed to move carts to order history: ' . $e->getMessage()], 500);
    }
}
public function sendOrderToPharmacy(Request $request)
{
    try {
        // Validate request data
        $validateData = Validator::make($request->all(), [
            'prescription' => 'required|file',
        ]);

        if ($validateData->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'error' => $validateData->errors()
            ], 401);
        }



        // Get the authenticated user
        $user = Auth::user();

        // Fetch profile data for the authenticated user
        $profile = Profile::where('email', $user->email)->first();

        if (!$profile) {
            return response()->json([
                'status' => false,
                'message' => 'Profile not found for the user',
            ], 404);
        }

        // Fetch cart data for the specified user_id
        $carts = Cart::where('user_id', $user->id)->get();

        $pharmacyOrderData = [];

        if ($carts->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No cart data found for the user',
            ], 404);
        }


        if ($request->hasFile('prescription')) {
            $image = $request->file('prescription');
            $prescriptionName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('prescription'), $prescriptionName);
        }

        foreach ($carts as $cart) {


            // Create a new record in pharmacy_orders table for each cart item
            $pharmacyOrder = PharmacyOrder::create([
                'user_id' => $cart->user_id,
                'pharmacy_id' => $cart->pharmacy_id,
                'pharmacyName' => $cart->pharmacyName,
                'medicineName' => $cart->medicineName,
                'medicineCategory' => $cart->medicineCategory,
                'medicinePrice' => $cart->medicinePrice,
                'pharmacyLocation' => $cart->pharmacyLocation,
                'prescription' => $prescriptionName,
                // Add other necessary fields
                'user_name' => $profile->username,
                'user_email' => $profile->email,
                'user_address' => $profile->street,
            ]);

            // Create a record in ordered_medicines table for each cart item
                  OrderedMedicine::create([
                 'pharmacy_order_id' => $cart->user_id,
                 'medicineName' => $cart->medicineName,
                 'medicineCategory' => $cart->medicineCategory,
                 'medicinePrice' => $cart->medicinePrice,
          ]);

            $pharmacyOrderData[] = $pharmacyOrder;
        }

        // You may choose to delete the carts data here if needed
        // Cart::where('user_id', $request->user_id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Orders sent to pharmacy successfully',
            'data' => $pharmacyOrderData,
        ], 200);
    } catch (Exception $e) {
        // Handle error
        return response()->json(['error' => 'Failed: ' . $e->getMessage()], 500);
    }
}
public function getRiskResults()
{
    try {
        // Get the authenticated user (assuming a logged-in user)
    $user = auth()->user();

    // Retrieve cart items for the authenticated user
    $chatgptResults = Chatgpt::where('user_id', $user->id)->get();

        if(!$chatgptResults->isEmpty()) {
            return response()->json([
                'status' => true,
                'data' => $chatgptResults
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No results found.'
            ], 404);
        }
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
}

}
