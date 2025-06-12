<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; // Opsional jika Anda ingin fitur verifikasi email
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username', // Tambahkan ini
        'email',
        'password',
        'avatar',   // Tambahkan ini
        'status',   // Tambahkan ini
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => \App\Enums\UserStatus::class, // Asumsi Anda membuat Enum UserStatus
    ];

    // Relasi untuk tugas solo
    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }

    // Relasi untuk tugas yang di-assign ke user ini dalam tim
    public function assignedTasks()
    {
        return $this->hasMany(Task::class, 'assigned_to_user_id');
    }

    // Relasi user ke tim (melalui TeamMember)
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_members', 'user_id', 'team_id')
                    ->withPivot('role') // Mengambil kolom role dari pivot table
                    ->withTimestamps();
    }

    // Relasi untuk tim yang user ini menjadi owner
    public function ownedTeams()
    {
        return $this->hasMany(Team::class, 'owner_id');
    }

    // Relasi untuk pesan yang dikirim user
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}