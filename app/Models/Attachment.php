<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_id',
        'file_path',
        'file_name',
        'file_type',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    // Atribut aksesori untuk mendapatkan URL file
    public function getFileUrlAttribute()
    {
        return Storage::url($this->file_path);
    }
}