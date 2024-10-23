<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|size:8',
        ]);
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make(trim($request->password));
        $user->remember_token = Str::random(10);
        $user->save();

       
        return redirect()->route('login')->with('status', 'Your account created successfully and Verify your email address');
    }

   

    public function auth_login(Request $request)
    {

        $remember = !empty($request->remember) ? 'true' : 'false';

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            
                $user = new User();
                $user_id = Auth::user()->id;
                $user = $user->getSingle($user_id);
                $user->remember_token = Str::random(40);
                $user->save();
              
                return redirect()->route('dashboard');
            
        } else {
            return redirect()->back()->with('error', 'Please enter current Email and Password');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout the user

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('index')->with('status', 'Logout Successfully');
    }
}
