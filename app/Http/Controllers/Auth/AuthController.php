<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('pages.auth.login');
    }

    public function login() {
        request()->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $credentials = request()->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/admin/sales');
        }

        return redirect('/login')->with('message', 'Wrong credentials');
    }

    public function logout() {
        Auth::logout();
        
        return redirect('/login');
    }
}
