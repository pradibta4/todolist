<?php

namespace App\Http\Controllers;

use App\Events\MessageSent; // Akan dibuat nanti
use App\Models\Team;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan chat room untuk tim tertentu
    public function show(Team $team)
    {
        // Pastikan user adalah anggota tim
        if (!Auth::user()->teams->contains($team) && $team->owner_id !== Auth::id()) {
            abort(403, 'Anda bukan anggota tim ini.');
        }

        $messages = $team->messages()->with('user', 'attachments')->orderBy('created_at', 'asc')->get();
        return view('teams.chat', compact('team', 'messages'));
    }

    // Mengirim pesan
    public function sendMessage(Request $request, Team $team)
    {
        // Pastikan user adalah anggota tim
        if (!Auth::user()->teams->contains($team) && $team->owner_id !== Auth::id()) {
            abort(403, 'Anda bukan anggota tim ini.');
        }

        $request->validate([
            'content' => 'nullable|string|max:2000',
            'files.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx,xlsx,txt|max:10240', // Max 10MB
        ]);

        if (empty($request->content) && empty($request->file('files'))) {
            return back()->with('error', 'Pesan atau file harus diisi.');
        }

        $message = $team->messages()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('public/chat_attachments'); // Simpan file
                $message->attachments()->create([
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        // Broadcast event pesan baru (untuk real-time chat)
        broadcast(new MessageSent($message->load('user', 'attachments')))->toOthers();

        return back()->with('success', 'Pesan terkirim!');
    }

    // Mendownload attachment
    public function downloadAttachment(Attachment $attachment)
    {
        // Pastikan user memiliki akses ke tim tempat pesan itu berada
        $team = $attachment->message->team;
        if (!Auth::user()->teams->contains($team) && $team->owner_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke file ini.');
        }

        if (Storage::exists($attachment->file_path)) {
            return Storage::download($attachment->file_path, $attachment->file_name);
        } else {
            abort(404, 'File tidak ditemukan.');
        }
    }
}