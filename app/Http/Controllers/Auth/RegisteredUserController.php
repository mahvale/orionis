<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Classrooms;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $classes = Classrooms::all();
        return view('auth.register',compact('classes'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'classroom_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


         if ($request->hasFile('profile_picture')) {
        // Enregistrer l'image dans le dossier "uploads/profile_pictures"
        $fileName = time() . '.' . $request->profile_picture->extension();
        $filePath = "uploads/profile_pictures/$fileName";
        $request->profile_picture->move(public_path('uploads/profile_pictures'), $fileName);
    } else {
         $filePath = 'uploads/profile_pictures/avatar.jpg';
    }
        
        $user = User::create([
            'name' => $request->name,
            'classroom_id' => $request->classroom_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $filePath,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
