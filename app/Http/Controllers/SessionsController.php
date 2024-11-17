<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email'     => 'required| email| max:255',
            'password'  => 'required',
        ]);

        if (Auth::attempt($attributes)) {
            request()->session()->regenerate();
            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]) -> onlyInput('email');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
