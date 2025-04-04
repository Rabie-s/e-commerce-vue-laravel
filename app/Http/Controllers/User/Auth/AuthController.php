<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showRegistrationForm()
    {
        return Inertia::render('User/Auth/Register');
    }


    public function showLoginForm()
    {
        return Inertia::render('User/Auth/Login');
    }


    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'phone_number' => 'min:8|unique:admins',
            'password' => 'required|min:8',
        ]);

        User::create($validated);


        return redirect()->route('user.auth.showLoginForm');  
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home.index');
        }
        return back()->with('message', ['message' => 'Incorrect email or password', 'type' => 'error']);

    }

    public function logoutUser(Request $request)
    {
        Auth::guard('user')->logout();

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
