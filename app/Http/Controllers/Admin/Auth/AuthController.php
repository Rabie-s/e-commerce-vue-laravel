<?php

namespace App\Http\Controllers\Admin\Auth;


use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return Inertia::render('Admin/Auth/Login');
    }


    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }
        return back()->with('message', ['message' => 'Incorrect email or password', 'type' => 'error']);
    }

    public function logoutAdmin(Request $request)
    {

        auth('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home.index')->with('message', ['message' => 'good bay', 'type' => 'success']);
    }

    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8',
            'confirmNewPassword' => 'required|min:8|same:newPassword'

        ]);
        $checkPassword = Hash::check($request->currentPassword, $request->user()->password);

        if ($checkPassword) {
            $request->user()->password = $request->newPassword;
            $request->user()->save();
            return redirect()->back()->with('message', ['message' => 'Password Change Successful', 'type' => 'success']);
        }
        return redirect()->back()->with('message', ['message' => 'Incorrect Password', 'type' => 'error']);
    }
}
