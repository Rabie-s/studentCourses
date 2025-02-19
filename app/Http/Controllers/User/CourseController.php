<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->orderByDesc('id')->paginate(8);
        return Inertia::render('User/Courses/Index', ['courses' => $courses]);
    }

    public function showCoursesByCategories(string $id)
    {

        $courses = Course::with('category:id,title')->select('id', 'title', 'main_image', 'price', 'category_id')->where('category_id', $id)->orderByDesc('id')->paginate(10);

        return Inertia::render('User/Courses/Index', [
            'courses' => $courses
        ]);
    }

    public function show(string $id)
    {
        $course = Course::with('category:id,title')->select('id', 'title', 'main_image', 'price', 'description', 'category_id')->findOrFail($id);
        return Inertia::render('User/Courses/Course', [
            'course' => $course
        ]);
    }
}
