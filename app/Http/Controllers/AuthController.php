<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();
        if (!$user) { // to find user if user not found
            return redirect()->back()->withErrors(['username' => 'Username anda tidak terdaftar'])->withInput();
        }
        if ($user->status != 10) {
            return redirect()->back()->withErrors(['username' => 'User tidak dapat mengakses ']);
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success_access', 'Anda berhasil masuk sistem');
        } else { // if password is incorrect
            return redirect()->back()->withErrors(['password' => 'Password anda salah'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }


}
