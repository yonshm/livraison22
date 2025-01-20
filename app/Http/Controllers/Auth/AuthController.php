<?php

namespace App\Http\Controllers\Auth;

use Log;
use Exception;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.registerSide');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required|string|max:30',
                'email' => 'required|string|email|max:50|unique:utilisateurs',
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user = $request->all();
            $user['password'] = Hash::make($request->password);
        
            Utilisateur::create($user);
            return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
        } catch (Exception $err) {
            return response()->json([
                'error' => 'Failed to create utilisateur',
                'message' => $err->getMessage(),
            ], 500);
        }
    }

    public function showLoginForm()
    {
        return view('auth.loginSide');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('admin/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        session()->forget('user');
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
