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
            'email'     => 'required| email',
            'password'  => 'required',
        ]);

        if (! User::where('email', $attributes['email']) -> exists()) {
            throw ValidationException::withMessages([
                'email' => 'Email not match',
            ]);
        }

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'password' => 'Password not match',
            ]);
        }

        request()->session()->regenerate();

        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
