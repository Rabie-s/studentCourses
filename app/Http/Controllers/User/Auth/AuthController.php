<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render('User/Auth/Login');
    }

    public function showRegistrationForm()
    {
        return Inertia::render('User/Auth/Register');
    }

    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'min:8|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create($validated);


        return redirect()->route('user.auth.showLoginForm');  
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user.home');
            
        }
        return back()->with('message', ['message' => 'Incorrect email or password', 'type' => 'error']);

    }

    public function logoutUser(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.home');
    }
}
