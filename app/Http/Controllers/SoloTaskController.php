<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloTaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Pastikan user sudah login
    }

    // Menampilkan daftar tugas solo
    public function index()
    {
        $tasks = Auth::user()->tasks()->orderBy('deadline')->get();
        $completedTasks = $tasks->where('is_completed', true);
        $pendingTasks = $tasks->where('is_completed', false);

        return view('solo_tasks.index', compact('completedTasks', 'pendingTasks'));
    }

    // Menampilkan form untuk membuat tugas baru
    public function create()
    {
        return view('solo_tasks.create');
    }

    // Menyimpan tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        Auth::user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'is_completed' => false,
        ]);

        return redirect()->route('solo_tasks.index')->with('success', 'Tugas solo berhasil ditambahkan!');
    }

    // Menampilkan detail tugas
    public function show(Task $task)
    {
        // Pastikan tugas ini milik user yang sedang login
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('solo_tasks.show', compact('task'));
    }

    // Menampilkan form untuk mengedit tugas
    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('solo_tasks.edit', compact('task'));
    }

    // Memperbarui tugas
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('solo_tasks.index')->with('success', 'Tugas solo berhasil diperbarui!');
    }

    // Menandai tugas sebagai selesai/belum selesai
    public function toggleComplete(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $task->is_completed = !$task->is_completed;
        $task->completed_at = $task->is_completed ? now() : null;
        $task->save();

        return redirect()->route('solo_tasks.index')->with('success', 'Status tugas diperbarui!');
    }

    // Menghapus tugas
    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $task->delete();
        return redirect()->route('solo_tasks.index')->with('success', 'Tugas solo berhasil dihapus.');
    }
}