<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with(['admin:id,name', 'category:id,title'])
            ->select('id', 'title', 'price', 'admin_id', 'category_id')->paginate(12);
        return Inertia::render('Admin/Courses/Index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'title')->get();
        $teachers = Admin::select('id', 'name')->get();
        return Inertia::render('Admin/Courses/Create', ['categories' => $categories, 'teachers' => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'main_image' => 'required', //'required|file|mimes:png,jpg,jpeg|max:2048'
            'description' => 'required|string',
            'category_id' => 'required|numeric|exists:categories,id', // Ensure category_id exists in the categories table
            'admin_id' => 'required|numeric|exists:admins,id', // Ensure category_id exists in the categories table
        ]);
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $validatedData['active'] = $request->active;

        Course::create($validatedData);
        return back()->with('message', ['message' => 'Course inserted successful', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::select('id', 'title')->get();
        $teachers = Admin::select('id', 'name')->get();
        return Inertia::render('Admin/Courses/Edit', ['course' => $course, 'categories' => $categories, 'teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the course
        $course = Course::findOrFail($id);

        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'main_image' => 'required', // Consider adding file validation if necessary
            'description' => 'required|string',
            'category_id' => 'required|numeric|exists:categories,id',
            'admin_id' => 'required|numeric|exists:admins,id',
        ]);

        // Update the slug if the title has changed
        if ($course->title !== $validatedData['title']) {
            $validatedData['slug'] = Str::slug($validatedData['title']);
        }

        // Update the course
        $course->update($validatedData);

        // Redirect back with a success message
        return back()->with('message', ['message' => 'Course updated successfully', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return back()->with('message', ['message' => 'Course deleted successful', 'type' => 'success']);
    }
}
