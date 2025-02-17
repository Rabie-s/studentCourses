<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'phone_number')->orderBy('id')->paginate('12');
        return Inertia::render('Admin/Students/Index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Students/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'min:8|unique:users',
            'password' => 'required|min:8',
        ]);
        User::create($validated);
        return back()->with('message', ['message' => 'Student inserted successful', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return Inertia::render('Admin/Students/Edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'min:8',
        ]);
        $user = User::findOrFail($id);
        $user->update($validated);
        return back()->with('message', ['message' => 'Student updated successful', 'type' => 'success']); 
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('message', ['message' => 'Student deleted successful', 'type' => 'success']); 
    }
}
