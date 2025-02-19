<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Profile/Index');
    }
    public function userEnrollments()
    {
        $authenticatedUser = Auth::guard('user')->user();
        $userEnrollments = $authenticatedUser->enrollments()->with('course')->orderByDesc('id')->paginate(5);
        return Inertia::render('User/Profile/Enrollments', [
            'userEnrollments' => $userEnrollments
        ]);
    }

    public function userAddress(){
        $authenticatedUser = Auth::guard('user')->user();
        $userAddress = $authenticatedUser->userAddress()->firstOrFail();
        return Inertia::render('User/Profile/UserAddress', [
            'userAddress' => $userAddress
        ]);
    }
}
