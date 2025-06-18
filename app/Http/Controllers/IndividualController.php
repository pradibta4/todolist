<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task; // DIPERBARUI: Menggunakan model Task

class IndividualController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Pastikan hanya user yang sudah login yang bisa mengakses
        $this->middleware('auth');
    }

    /**
     * Show the individual user's dashboard with their tasks.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        // DIPERBARUI: Mengambil semua task milik user yang sedang login
        $tasks = Task::where('user_id', $user->id)->latest()->get();

        // Mengirim data user dan data tasks ke view
        return view('individu.dashboard', [
            'user' => $user,
            'tasks' => $tasks // Variabel $tasks sekarang tersedia di view
        ]);
    }
}
