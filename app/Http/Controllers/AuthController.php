<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $loginRequest)
    {
        if(Auth::attempt($loginRequest->validated())){
            $loginRequest->session()->regenerate();

            return Redirect()->route('dashboard');
        }
    }
}
