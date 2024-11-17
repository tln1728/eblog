<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('client.auth.register');
    }

    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'name'      => 'required| max:100',
            'email'     => 'required| email| unique:users,email',
            'password'  => 'required| min:6| confirmed',
        ]);

        $user = User::create($userAttributes);

        Auth::login($user);

        return redirect('/');
    }
}
