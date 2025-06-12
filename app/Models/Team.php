<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'description',
    ];

    // Pemilik tim
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // Anggota tim
    public function members()
    {
        return $this->belongsToMany(User::class, 'team_members', 'team_id', 'user_id')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    // Tugas-tugas dalam tim
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Proyek-proyek dalam tim
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // Pesan-pesan dalam chat tim
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}