<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
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
        $admins = Admin::select('id', 'name', 'email', 'phone_number')
        ->latest()->paginate(12);
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
    public function store(StoreAdminRequest $request)
    {
        Admin::create($request->validated());
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
    public function update(UpdateAdminRequest $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->validated());
        return back()->with('message', ['message' => 'Admin updated successful', 'type' => 'success']); 
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //TODO fix admin can delete him self
        $authenticatedAdminId = auth(guard: 'admin')->user()->id;
        if($authenticatedAdminId ==$id){
            return back()
            ->with('message', ['message' => 'Admin cannot delete him self', 'type' => 'error']); 

        }
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return back()->with('message', ['message' => 'Admin deleted successful', 'type' => 'success']); 
    }
}
