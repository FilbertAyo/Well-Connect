<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Pharmacy;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $image=$request->file;
        // $imagename=time().'.'.$image->getClientOriginalExtension();
        // $request->file->move('productimage',$imagename);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'location'=> $request->location,
            'distance'=> $request->distance,
            'userType' => $request->userType,
            'file'=> null, //Default value if no file is uploaded
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('productimage', $imagename);
            $user->file = $imagename;
            $user->save();
        }


        // Logic to create Pharmacy entry if userType is 0
if ($user->userType == 0) {
    Pharmacy::create([
        'user_id' => $user->id, // Assigning the user's ID to the 'user_id' field
        'name' => $user->name,
        'location'=> $user->location,
        'region'=> $user->region,
        'distance'=> $user->distance,
        'image'=> $user->file,
    ]);


}

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
