<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TeamTaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan form untuk membuat tugas tim baru dalam proyek
    public function create(Team $team, Project $project)
    {
        // Pastikan user adalah anggota tim
        if (!Auth::user()->teams->contains($team) && $team->owner_id !== Auth::id()) {
            abort(403, 'Anda bukan anggota tim ini.');
        }
        if ($project->team_id !== $team->id) {
            abort(404);
        }

        $members = $team->members()->get(); // Untuk dropdown assign task
        return view('team_tasks.create', compact('team', 'project', 'members'));
    }

    // Menyimpan tugas tim baru
    public function store(Request $request, Team $team, Project $project)
    {
        if (!Auth::user()->teams->contains($team) && $team->owner_id !== Auth::id()) {
            abort(403, 'Anda bukan anggota tim ini.');
        }
        if ($project->team_id !== $team->id) {
            abort(404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'assigned_to_user_id' => ['nullable', 'exists:users,id', Rule::in($team->members->pluck('id'))], // Pastikan user ada di tim
        ]);

        $project->tasks()->create([
            'user_id' => Auth::id(), // Pembuat tugas
            'team_id' => $team->id,
            'assigned_to_user_id' => $request->assigned_to_user_id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'is_completed' => false,
        ]);

        return redirect()->route('projects.show', [$team, $project])->with('success', 'Tugas tim berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit tugas tim
    public function edit(Team $team, Project $project, Task $task)
    {
        if (!Auth::user()->teams->contains($team) && $team->owner_id !== Auth::id()) {
            abort(403, 'Anda bukan anggota tim ini.');
        }
        if ($project->id !== $task->project_id || $team->id !== $task->team_id) {
            abort(404);
        }

        $members = $team->members()->get();
        return view('team_tasks.edit', compact('team', 'project', 'task', 'members'));
    }

    // Memperbarui tugas tim
    public function update(Request $request, Team $team, Project $project, Task $task)
    {
        if (!Auth::user()->teams->contains($team) && $team->owner_id !== Auth::id()) {
            abort(403, 'Anda bukan anggota tim ini.');
        }
        if ($project->id !== $task->project_id || $team->id !== $task->team_id) {
            abort(404);
        }

        // Hanya ketua atau yang ditugaskan bisa mengedit status, yang lain hanya detail
        $canUpdateStatus = ($team->owner_id === Auth::id() || (Auth::user()->teams()->wherePivot('role', 'admin')->get()->contains($team)));
        $canUpdateStatus = $canUpdateStatus || ($task->assigned_to_user_id === Auth::id()); // Yang ditugaskan juga bisa update status

        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'assigned_to_user_id' => ['nullable', 'exists:users,id', Rule::in($team->members->pluck('id'))],
        ];

        // Izinkan is_completed dan completed_at hanya jika user memiliki hak
        if ($canUpdateStatus) {
            $rules['is_completed'] = 'boolean';
        }

        $request->validate($rules);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->assigned_to_user_id = $request->assigned_to_user_id;

        if ($canUpdateStatus && $request->has('is_completed')) {
            $task->is_completed = $request->boolean('is_completed');
            $task->completed_at = $task->is_completed ? now() : null;
        }

        $task->save();

        return redirect()->route('projects.show', [$team, $project])->with('success', 'Tugas tim berhasil diperbarui!');
    }

    // Menghapus tugas tim
    public function destroy(Team $team, Project $project, Task $task)
    {
        // Hanya ketua atau admin tim yang bisa menghapus
        if ($team->owner_id !== Auth::id() && !Auth::user()->teams()->wherePivot('role', 'admin')->get()->contains($team)) {
            abort(403, 'Anda tidak memiliki hak untuk menghapus tugas ini.');
        }
        if ($project->id !== $task->project_id || $team->id !== $task->team_id) {
            abort(404);
        }

        $task->delete();
        return redirect()->route('projects.show', [$team, $project])->with('success', 'Tugas tim berhasil dihapus.');
    }

    // Menandai tugas tim sebagai selesai/belum selesai (endpoint terpisah untuk kemudahan)
    public function toggleComplete(Team $team, Project $project, Task $task)
    {
        // Hanya yang ditugaskan, ketua, atau admin yang bisa mengubah status
        if (!Auth::user()->teams->contains($team) && $team->owner_id !== Auth::id()) {
            abort(403, 'Anda bukan anggota tim ini.');
        }
        if ($project->id !== $task->project_id || $team->id !== $task->team_id) {
            abort(404);
        }
        if ($task->assigned_to_user_id !== Auth::id() && $team->owner_id !== Auth::id() && !Auth::user()->teams()->wherePivot('role', 'admin')->get()->contains($team)) {
             abort(403, 'Anda tidak memiliki hak untuk mengubah status tugas ini.');
        }

        $task->is_completed = !$task->is_completed;
        $task->completed_at = $task->is_completed ? now() : null;
        $task->save();

        return back()->with('success', 'Status tugas tim diperbarui!');
    }
}