<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'required|email|unique:users',
            'phone_number' => 'min:8|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create($validated);

        // Optional: Redirect or return response after successful registration
        return redirect()->route('user.auth.showLoginForm');  // Assuming 'login' is a named route
    }

    public function loginUser(Request $request)
    {
        $credentials =$request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::guard('user')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home.index');
        }
        return back()->with('message','Incorrect email or password');
    
        // Optional: Redirect or return response after successful registration
        //return redirect()->route('login');  // Assuming 'login' is a named route
    }

    public function logoutUser(Request $request){
        Auth::guard('user')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home.index');
    }
}


