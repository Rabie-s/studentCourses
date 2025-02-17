<?php

namespace App\Http\Controllers\Admin\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render('Admin/Auth/Login');
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }
        return back()->with('message', ['message' => 'Incorrect email or password', 'type' => 'error']);
    }

    public function logoutAdmin(Request $request)
    {

        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.home')->with('message', ['message' => 'good bay', 'type' => 'success']);
    }
}
