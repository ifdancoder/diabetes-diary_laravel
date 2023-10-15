<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function login() {
        return view('auth.login');
    }
    public function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember_me'));
        if(auth()->check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }
    public function register() {
        return view('auth.register');
    }
    public function registerPost(Request $request) {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password1' => 'required',
            'password2' => 'required|same:password1'
        ]);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password1);
        $user->save();
        auth()->login($user, $request->filled('remember_me'));
        return view('home');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login');
    }
}
