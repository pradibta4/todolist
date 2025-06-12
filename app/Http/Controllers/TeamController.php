<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan daftar tim user
    public function index()
    {
        $ownedTeams = Auth::user()->ownedTeams;
        $memberTeams = Auth::user()->teams()->where('owner_id', '!=', Auth::id())->get(); // Tim di mana user adalah member tapi bukan owner
        return view('teams.index', compact('ownedTeams', 'memberTeams'));
    }

    // Menampilkan form buat tim baru
    public function create()
    {
        return view('teams.create');
    }

    // Menyimpan tim baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:teams'],
            'description' => ['nullable', 'string'],
        ]);

        $team = Auth::user()->ownedTeams()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Otomatis menambahkan owner sebagai member
        $team->members()->attach(Auth::id(), ['role' => 'ketua']);

        return redirect()->route('teams.index')->with('success', 'Tim berhasil dibuat!');
    }

    // Menampilkan detail tim
    public function show(Team $team)
    {
        // Pastikan user adalah member atau owner tim
        if (!Auth::user()->teams->contains($team) && $team->owner_id !== Auth::id()) {
            abort(403, 'Anda bukan anggota tim ini.');
        }

        return view('teams.show', compact('team'));
    }

    // Menginvite anggota ke tim
    public function inviteMember(Request $request, Team $team)
    {
        // Hanya owner atau admin tim yang bisa invite
        if ($team->owner_id !== Auth::id() && Auth::user()->teams()->wherePivot('role', 'admin')->get()->doesntContain($team)) {
            abort(403, 'Anda tidak memiliki hak untuk mengundang anggota.');
        }

        $request->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
        ]);

        $invitedUser = User::where('email', $request->email)->first();

        if (!$invitedUser) {
            return back()->with('error', 'User dengan email tersebut tidak ditemukan.');
        }

        if ($team->members->contains($invitedUser)) {
            return back()->with('error', 'User ini sudah menjadi anggota tim.');
        }

        $team->members()->attach($invitedUser->id, ['role' => 'member']);

        return back()->with('success', 'Anggota tim berhasil diundang!');
    }

    // Menghapus anggota dari tim
    public function removeMember(Team $team, User $user)
    {
        // Hanya owner atau admin tim yang bisa remove, dan tidak bisa remove owner
        if ($team->owner_id !== Auth::id() && Auth::user()->teams()->wherePivot('role', 'admin')->get()->doesntContain($team)) {
            abort(403, 'Anda tidak memiliki hak untuk menghapus anggota.');
        }
        if ($user->id === $team->owner_id) {
            return back()->with('error', 'Owner tim tidak bisa dihapus.');
        }

        $team->members()->detach($user->id);
        return back()->with('success', 'Anggota tim berhasil dihapus.');
    }

    // Meninggalkan tim
    public function leaveTeam(Team $team)
    {
        if ($team->owner_id === Auth::id()) {
            return back()->with('error', 'Anda adalah owner tim. Hapus tim ini jika ingin meninggalkannya.');
        }

        Auth::user()->teams()->detach($team->id);
        return redirect()->route('teams.index')->with('success', 'Anda berhasil meninggalkan tim.');
    }

    // Menghapus tim (hanya owner)
    public function destroy(Team $team)
    {
        if ($team->owner_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki hak untuk menghapus tim ini.');
        }

        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Tim berhasil dihapus.');
    }
}