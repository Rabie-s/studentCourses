<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        // Fetch all necessary counts
        $data = [
            'totalUsers'       => User::count(),
            'totalEnrollments' => Enrollment::count(),
            'totalCourses'     => Course::count(),
        ];

        // Return Inertia Dashboard with data
        return Inertia::render('Admin/Dashboard/Home', $data);
    }
}

