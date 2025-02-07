<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::select('id', 'name', 'email', 'phone_number')->orderBy('id')->paginate(12);
        return Inertia::render('Admin/Admins/Index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Admins/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'phone_number' => 'min:8|unique:admins',
            'password' => 'required|min:8',
        ]);
        Admin::create($validated);
        return back()->with('message', ['message' => 'Admin inserted successful', 'type' => 'success']);
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
        $admin = Admin::findOrFail($id);
        return Inertia::render('Admin/Admins/Edit', ['admin' => $admin]);
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
        $admin = Admin::findOrFail($id);
        $admin->update($validated);
        return back()->with('message', ['message' => 'Admin updated successful', 'type' => 'success']); 
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return back()->with('message', ['message' => 'Admin deleted successful', 'type' => 'success']); 
    }
}
