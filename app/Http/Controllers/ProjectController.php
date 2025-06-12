<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan daftar proyek dalam tim
    public function index(Team $team)
    {
        // Pastikan user adalah anggota tim
        if (!Auth::user()->teams->contains($team) && $team->owner_id !== Auth::id()) {
            abort(403, 'Anda bukan anggota tim ini.');
        }

        $projects = $team->projects()->with('tasks')->get();
        return view('projects.index', compact('team', 'projects'));
    }

    // Menampilkan form buat proyek baru
    public function create(Team $team)
    {
        // Hanya owner atau admin tim yang bisa membuat proyek
        if ($team->owner_id !== Auth::id() && !Auth::user()->teams()->wherePivot('role', 'admin')->get()->contains($team)) {
            abort(403, 'Anda tidak memiliki hak untuk membuat proyek di tim ini.');
        }
        return view('projects.create', compact('team'));
    }

    // Menyimpan proyek baru
    public function store(Request $request, Team $team)
    {
        if ($team->owner_id !== Auth::id() && !Auth::user()->teams()->wherePivot('role', 'admin')->get()->contains($team)) {
            abort(403, 'Anda tidak memiliki hak untuk membuat proyek di tim ini.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $team->projects()->create([
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('teams.show', $team)->with('success', 'Proyek berhasil ditambahkan!');
    }

    // Menampilkan detail proyek
    public function show(Team $team, Project $project)
    {
        if (!Auth::user()->teams->contains($team) && $team->owner_id !== Auth::id()) {
            abort(403, 'Anda bukan anggota tim ini.');
        }
        if ($project->team_id !== $team->id) { // Pastikan proyek milik tim ini
            abort(404);
        }

        $project->load('tasks.assignedTo'); // Load tugas dan user yang ditugaskan
        $members = $team->members()->get(); // Untuk dropdown assign task

        return view('projects.show', compact('team', 'project', 'members'));
    }

    // Menghapus proyek
    public function destroy(Team $team, Project $project)
    {
        if ($team->owner_id !== Auth::id() && !Auth::user()->teams()->wherePivot('role', 'admin')->get()->contains($team)) {
            abort(403, 'Anda tidak memiliki hak untuk menghapus proyek ini.');
        }
        if ($project->team_id !== $team->id) {
            abort(404);
        }

        $project->delete();
        return redirect()->route('teams.show', $team)->with('success', 'Proyek berhasil dihapus.');
    }
}