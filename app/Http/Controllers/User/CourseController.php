<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::with('category')->paginate(10);
        return Inertia::render('User/Courses/Index', ['courses' => $courses]);
    }

    public function showCoursesByCategories(string $id)
    {
        
        $courses = Course::with('category:id,title')->select('id', 'title', 'main_image', 'price','category_id')->where('category_id', $id)->paginate(10);
        
        return Inertia::render('User/Courses/Index', [
            'courses' => $courses
        ]);
    }

}
