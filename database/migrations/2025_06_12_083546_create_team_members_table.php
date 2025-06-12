<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('role')->default('member'); // e.g., 'member', 'admin', 'ketua'
            $table->timestamps();

            $table->unique(['team_id', 'user_id']); // Pastikan satu user hanya satu kali di satu tim
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};