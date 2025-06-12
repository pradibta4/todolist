<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Enums\UserStatus; // Gunakan Enum yang sudah kita buat

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan halaman profil
    public function show()
    {
        return view('profile.show', ['user' => Auth::user()]);
    }

    // Memperbarui informasi profil (nama, username)
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update($request->only('name', 'username', 'email'));

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    // Mengatur avatar akun
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
        ]);

        $user = Auth::user();

        // Hapus avatar lama jika ada
        if ($user->avatar) {
            Storage::delete($user->avatar);
        }

        $path = $request->file('avatar')->store('public/avatars'); // Simpan di storage/app/public/avatars
        $user->avatar = $path;
        $user->save();

        return back()->with('success', 'Avatar berhasil diperbarui.');
    }

    // Mengganti password akun
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }

    // Mengatur status akun (online, invisible, busy, off)
    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => ['required', Rule::in(array_column(UserStatus::cases(), 'value'))],
        ]);

        $user = Auth::user();
        $user->status = $request->status;
        $user->save();

        // Anda bisa broadcast event di sini untuk real-time status update
        // broadcast(new UserStatusUpdated($user))->toOthers();

        return back()->with('success', 'Status berhasil diperbarui.');
    }
}