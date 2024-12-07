<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Inertia\Response
     */
    public function showRegistrationForm()
    {
        return Inertia::render('User/Auth/Register');
    }

    /**
     * Show the login form.
     *
     * @return \Inertia\Response
     */
    public function showLoginForm()
    {
        return Inertia::render('User/Auth/Login');
    }

    /**
     * Handle the user registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'min:8|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create($request->all());

        // Optional: Redirect or return response after successful registration
        //return redirect()->route('login');  // Assuming 'login' is a named route
    }

        /**
     * Handle the user registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginUser(Request $request)
    {
        $credentials =$request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return to_route('welcome');
        }
        return back()->with('message','Incorrect email or password');


        // Optional: Redirect or return response after successful registration
        //return redirect()->route('login');  // Assuming 'login' is a named route
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.auth.loginUser');;
    }
}


