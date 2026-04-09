<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function registerLihat() // 
    {
        return view('auth.register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
        'username' => ['required', 'string', 'max:100'],
        'email'    => ['required', 'email', 'unique:users,email'],
        'kelas' => ['required', 'string', 'max:20'],
        'password' => ['required', 'min:8', 'regex:/[0-9]/', 'confirmed'],

    ], [
        'password.min'   => 'Password minimal 8 karakter.',
    
    ]);
        $data = new User();
        $data->username = $request->username;
        $data->email = $request->email;
        $data->kelas = $request->kelas;
        $data->password = bcrypt($request->password);
        $data->usertype = 'user'; 
        $data->save();

        return redirect()->route('login.lihat');
    }

    public function loginLihat()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $data = User::where('email', $request->email)->first();

        if ($data && Hash::check($request->password, $data->password)) {
            Auth::login($data);
            $request->session()->regenerate();

            //  cek role
            if ($data->usertype === 'admin') { // admin = guru
                return redirect()->route('guru.dashboard')->with('success', 'Login Berhasil');
            }
            return redirect()->route('siswa.dashboard')->with('success', 'Login Berhasil');
        }

        return redirect()->route('login.lihat')->with('failed', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }
}
