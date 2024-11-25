<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // Show the login form
    public function showLogin()
    {
        return view('auth.login'); // Assuming you have a separate 'login' view
    }

    // Handle login logic
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    // Attempt to authenticate using 'username' instead of 'email'
    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        return redirect()->intended('dashboard'); // Redirect to the intended page (dashboard)
    }

    return back()->withErrors(['username' => 'Invalid credentials'])->withInput(); // Show error if invalid login
}


    // Show the registration form
    public function showRegister()
    {
        return view('auth.register'); // Assuming you have a separate 'register' view
    }

    // Handle registration logic
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users', // Ensure username is unique
            'email' => 'required|email|unique:users', // Ensure email is unique
            'password' => 'required|confirmed|min:8', // Ensure password matches confirmation and is at least 8 characters
        ]);

        // Create the user instance and hash the password
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash the password
        $user->save();

        // Log the user in immediately after registration
        Auth::login($user);

        return redirect('dashboard'); // Redirect to the dashboard or home page after registration
    }
}
