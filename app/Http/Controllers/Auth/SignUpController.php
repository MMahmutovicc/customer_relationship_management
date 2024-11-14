<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
    {
        $validated = $request -> validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        auth()->attempt($request->only('email', 'password'));
        return redirect() -> route('home');
    }
}
