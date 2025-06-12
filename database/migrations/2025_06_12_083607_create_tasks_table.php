<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Pemilik tugas (solo) atau pembuat tugas (team)
            $table->foreignId('team_id')->nullable()->constrained()->onDelete('cascade'); // Jika tugas adalah bagian dari tim
            $table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->onDelete('set null'); // Siapa yang ditugaskan (dalam tim)
            $table->foreignId('project_id')->nullable()->constrained()->onDelete('cascade'); // Jika tugas adalah bagian dari proyek
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};