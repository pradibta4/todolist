<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Enums\UserStatus; // Pastikan ini di-import
use Illuminate\Validation\ValidationException; // Penting: Import ini
use Illuminate\Database\QueryException; // Penting: Import ini
use Illuminate\Support\Facades\Log; // Penting: Import ini untuk logging

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            // 1. Validasi Data
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Password::defaults()],
            ]);

            // 2. Buat User Baru di Database
            $user = User::create([
                'name' => $validatedData['name'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'status' => UserStatus::Offline, // Menggunakan Enum
            ]);

            // 3. Login Otomatis
            Auth::login($user);

            // 4. Redirect ke Dashboard
            return redirect('/dashboard')->with('success', 'Akun Anda berhasil dibuat!');

        } catch (ValidationException $e) {
            // Tangani error validasi (ini akan otomatis mengembalikan ke form dengan error)
            Log::warning('Registration validation failed: ' . json_encode($e->errors()));
            return back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            // Tangani error terkait database (misalnya, masalah koneksi, kolom tidak ada, dll.)
            Log::error('Database error during registration: ' . $e->getMessage(), [
                'code' => $e->getCode(),
                'sql' => $e->getSql(),
                'bindings' => $e->getBindings(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->with('error', 'Terjadi kesalahan database saat mendaftar. Mohon coba lagi nanti.')->withInput();
        } catch (\Exception $e) {
            // Tangani error umum lainnya
            Log::error('An unexpected error occurred during registration: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->with('error', 'Terjadi kesalahan tak terduga saat mendaftar. Mohon coba lagi.')->withInput();
        }
    }
}
