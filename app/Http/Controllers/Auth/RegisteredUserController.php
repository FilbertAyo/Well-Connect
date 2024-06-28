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
use App\Models\UnverifiedPharmacy;
use App\Notifications\RegistrationFormMail;
use App\Notifications\SuccessRegistration;
use Illuminate\Support\Facades\Log;


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

      //trigger status of the pharmacy after registered
      $verify_pharmacy = UnverifiedPharmacy::find($request->pid);
      $verify_pharmacy->status = 'registered';
      $verify_pharmacy->save();

      $user->notify(new RegistrationFormMail($request->name, $request->email, $request->password));

    return redirect()->back()->with('success','Registration done successfully');


}




        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
