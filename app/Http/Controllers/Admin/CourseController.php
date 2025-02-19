<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with(['admin:id,name', 'category:id,title'])
            ->select('id', 'title', 'price', 'admin_id', 'category_id')->orderByDesc('id')->paginate(8);
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
            'main_image' => 'required|file|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required|string',
            'category_id' => 'required|numeric|exists:categories,id',
            'admin_id' => 'required|numeric|exists:admins,id',
            'active' => 'nullable|boolean',
        ]);

        // Store the image
        $mainImagePath = $request->file('main_image')->store('images', 'public'); 
        $validatedData['main_image'] = basename($mainImagePath);

        // Generate Slug
        $validatedData['slug'] = Str::slug($validatedData['title']);

        // Convert 'active' field to integer
        $validatedData['active'] = $request->has('active') ? 1 : 0;

        // Create Course
        Course::create($validatedData);

        return back()->with('message', ['message' => 'Course inserted successfully', 'type' => 'success']);
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
        $course = Course::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'category_id' => 'required|numeric|exists:categories,id',
            'admin_id' => 'required|numeric|exists:admins,id',
            'active' => 'nullable|boolean',
        ]);

        // Update Slug if title changed
        if ($course->title !== $validatedData['title']) {
            $validatedData['slug'] = Str::slug($validatedData['title']);
        }

        // Handle Image Update
        if ($request->hasFile('main_image')) {
            // Delete old image
            if ($course->main_image) {
                Storage::disk('public')->delete('images/' . $course->main_image);
            }
            // Store new image
            $mainImagePath = $request->file('main_image')->store('images', 'public');
            $validatedData['main_image'] = basename($mainImagePath);
        }

        // Convert 'active' field to integer
        $validatedData['active'] = $request->has('active') ? 1 : 0;

        // Update Course
        $course->update($validatedData);

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
