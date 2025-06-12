<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'team_id',
        'assigned_to_user_id',
        'project_id',
        'title',
        'description',
        'deadline',
        'is_completed',
        'completed_at',
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'is_completed' => 'boolean',
        'completed_at' => 'datetime',
    ];

    // Pemilik tugas (solo) atau pembuat tugas (team)
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Jika tugas adalah bagian dari tim
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Siapa yang ditugaskan (dalam tim)
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    // Jika tugas adalah bagian dari proyek
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}