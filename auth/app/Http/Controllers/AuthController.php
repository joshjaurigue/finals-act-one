<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Process the user's registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the user's input
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create and store the new user
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        // Redirect the user after successful registration
        return redirect()->route('login.show')->with('success', 'Registration successful! Please log in.');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/posts');
        }

        return redirect()->back()->withInput($request->only('email'));
    }
}
