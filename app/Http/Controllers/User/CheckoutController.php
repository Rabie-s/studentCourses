<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(string $id)
    {
        $course = Course::select('id', 'title', 'price')->where('id', $id)->firstOrFail();
        return Inertia::render('User/Checkout/Index', ['course' => $course]);
    }

    public function enrollmentCheckout(Request $request)
    {
        $authenticatedUser = Auth::guard('user')->user();
        $course = Course::findOrFail($request->courseId);
        $userAddress = $authenticatedUser->userAddress()->updateOrCreate([
            'first_name' => $request->userAddress['first_name'],
            'last_name' => $request->userAddress['last_name'],
            'country' => $request->userAddress['country'],
            'area' => $request->userAddress['area'],
            'phone_number' => $request->userAddress['phone_number'],
        ]);
        $authenticatedUser->enrollments()->create([
            'course_id'=>$course->id, 
            'enrollment_price'=>$course->price
        ]);
        return redirect()->route('user.home')->with('message',['message'=>'You have successfully enrolled in the course!.','type'=>'success']);

    }
}
