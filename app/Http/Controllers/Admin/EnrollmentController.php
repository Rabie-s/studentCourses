<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::with(['course:id,title', 'user:id,name'])
            ->select('id', 'status', 'grade', 'enrollment_price', 'course_id', 'user_id')
            ->orderByDesc('id')
            ->paginate(10); // Add pagination for better performance

        return Inertia::render('Admin/Enrollments/Index', [
            'enrollments' => $enrollments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.enrollments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'status' => 'required|string',
            'grade' => 'nullable|numeric|min:0|max:100',
            'enrollment_price' => 'required|numeric|min:0',
        ]);

        $enrollment = Enrollment::create($request->all());

        return redirect()->route('admin.enrollments.index')->with('success', 'Enrollment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollment = Enrollment::with(['course', 'user'])->findOrFail($id);

        return Inertia::render('Admin/Enrollments/Show', [
            'enrollment' => $enrollment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enrollment = Enrollment::select('id', 'status', 'grade')
    ->findOrFail($id);

        return Inertia::render('Admin/Enrollments/Edit', [
            'enrollment' => $enrollment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|string',
            'grade' => 'nullable|numeric|min:0|max:100',
        ]);

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($request->all());
        return back()->with('message', ['message' => 'Enrollment updated successfully.', 'type' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();
        return back()->with('message', ['message' => 'Enrollment deleted successfully', 'type' => 'success']);

    }
}
