<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SoloTaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamTaskController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute Publik (Login, Register)
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rute yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Solo Tasks
    Route::prefix('solo-tasks')->name('solo_tasks.')->group(function () {
        Route::get('/', [SoloTaskController::class, 'index'])->name('index');
        Route::get('/create', [SoloTaskController::class, 'create'])->name('create');
        Route::post('/', [SoloTaskController::class, 'store'])->name('store');
        Route::get('/{task}', [SoloTaskController::class, 'show'])->name('show');
        Route::get('/{task}/edit', [SoloTaskController::class, 'edit'])->name('edit');
        Route::put('/{task}', [SoloTaskController::class, 'update'])->name('update');
        Route::post('/{task}/toggle-complete', [SoloTaskController::class, 'toggleComplete'])->name('toggleComplete');
        Route::delete('/{task}', [SoloTaskController::class, 'destroy'])->name('destroy');
    });

    // Teams
    Route::prefix('teams')->name('teams.')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('index');
        Route::get('/create', [TeamController::class, 'create'])->name('create');
        Route::post('/', [TeamController::class, 'store'])->name('store');
        Route::get('/{team}', [TeamController::class, 'show'])->name('show');
        Route::post('/{team}/invite', [TeamController::class, 'inviteMember'])->name('inviteMember');
        Route::delete('/{team}/members/{user}', [TeamController::class, 'removeMember'])->name('removeMember');
        Route::post('/{team}/leave', [TeamController::class, 'leaveTeam'])->name('leave'); // Rute untuk meninggalkan tim
        Route::delete('/{team}', [TeamController::class, 'destroy'])->name('destroy');

        // Projects dalam Team
        Route::prefix('{team}/projects')->name('projects.')->group(function () {
            Route::get('/', [ProjectController::class, 'index'])->name('index');
            Route::get('/create', [ProjectController::class, 'create'])->name('create');
            Route::post('/', [ProjectController::class, 'store'])->name('store');
            Route::get('/{project}', [ProjectController::class, 'show'])->name('show'); // Menampilkan detail proyek & tugas-tugasnya
            Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('destroy');

            // Tasks dalam Project (Team Task)
            Route::prefix('{project}/tasks')->name('tasks.')->group(function () {
                Route::get('/create', [TeamTaskController::class, 'create'])->name('create');
                Route::post('/', [TeamTaskController::class, 'store'])->name('store');
                Route::get('/{task}/edit', [TeamTaskController::class, 'edit'])->name('edit');
                Route::put('/{task}', [TeamTaskController::class, 'update'])->name('update');
                Route::post('/{task}/toggle-complete', [TeamTaskController::class, 'toggleComplete'])->name('toggleComplete');
                Route::delete('/{task}', [TeamTaskController::class, 'destroy'])->name('destroy');
            });
        });

        // Chat dalam Team
        Route::prefix('{team}/chat')->name('chat.')->group(function () {
            Route::get('/', [ChatController::class, 'show'])->name('show');
            Route::post('/', [ChatController::class, 'sendMessage'])->name('send');
            Route::get('/attachments/{attachment}/download', [ChatController::class, 'downloadAttachment'])->name('downloadAttachment');
        });
    });

    // User Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::put('/', [ProfileController::class, 'update'])->name('update');
        Route::post('/avatar', [ProfileController::class, 'updateAvatar'])->name('updateAvatar');
        Route::put('/password', [ProfileController::class, 'updatePassword'])->name('updatePassword');
        Route::put('/status', [ProfileController::class, 'updateStatus'])->name('updateStatus');
    });

    // Pengaturan Audio/Aksesibilitas - Ini biasanya di handle frontend atau disimpan sebagai preferensi user di database.
    // Tidak ada controller khusus untuk ini di backend secara default, kecuali jika Anda ingin menyimpan preferensi di DB.
    // Contoh: Route::put('/settings/accessibility', [ProfileController::class, 'updateAccessibility'])->name('updateAccessibility');
});

// Default Laravel UI auth routes (Jika Anda ingin menggunakan sebagian fitur ini secara otomatis)
// Jika Anda tidak ingin membangun reset password dll. secara manual, uncomment baris di bawah ini
// Namun, perhatikan bahwa ini mungkin akan membuat rute yang berbeda dari yang Anda buat secara manual.
// Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Jika Anda ingin menggunakan Auth::routes() dari Laravel UI untuk semua fitur auth secara otomatis:
// Pastikan Anda sudah menginstal laravel/ui: composer require laravel/ui && php artisan ui:auth
// Lalu, uncomment baris ini dan hapus rute login/register/logout manual di atas
// Auth::routes();