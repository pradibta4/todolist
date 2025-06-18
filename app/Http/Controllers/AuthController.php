<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form registrasi.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Menyimpan user baru ke database, lalu login.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register.form')
                        ->withErrors($validator)
                        ->withInput();
        }

        try {
            // INI YANG DIPERBAIKI: Mengisi kolom 'name' dan 'username'
            $user = User::create([
                'name' => $request->name,      // <-- Mengisi kolom 'name'
                'username' => $request->name,  // <-- Mengisi kolom 'username'
                'email' => $request->email,
                'password' => $request->password,
                'password' => Hash::make($request->password),
            ]);

            // Hapus atau beri komentar pada baris dd() ini setelah berhasil
           // dd($user);

        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
        
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil dan Anda sudah login!');
    }
}
