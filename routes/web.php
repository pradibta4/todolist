<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController; // Pastikan controller ini ada, atau ganti dengan AuthController jika login ada di sana
use App\Http\Controllers\SoloTaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamTaskController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\IndividualController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTE PUBLIK (TIDAK PERLU LOGIN) ---

Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// Route untuk Registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

// Route untuk Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Password Reset Routes
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/dsbrdLogin', function () {
    return view('dsbrdLogin');
})->name('dsbrdLogin');

Route::get('/role', function () {
    return view('role');
})->name('role');


// --- RUTE YANG MEMERLUKAN AUTENTIKASI ---
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Pastikan view 'dashboard.blade.php' ada
    })->name('dashboard');
    
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
    
     // Melindungi halaman ini hanya untuk pengguna dengan peran 'individu'
    Route::middleware('role:individu')->group(function() {
        Route::get('/individu', [IndividualController::class, 'index'])->name('individu.dashboard');
    });

    // Teams (dan semua route di dalamnya)
    Route::prefix('teams')->name('teams.')->group(function () {
        // ... (semua route teams Anda sudah benar, tidak perlu diubah) ...
        Route::get('/', [TeamController::class, 'index'])->name('index');
        Route::get('/create', [TeamController::class, 'create'])->name('create');
        Route::post('/', [TeamController::class, 'store'])->name('store');
        Route::get('/{team}', [TeamController::class, 'show'])->name('show');
        Route::post('/{team}/invite', [TeamController::class, 'inviteMember'])->name('inviteMember');
        Route::delete('/{team}/members/{user}', [TeamController::class, 'removeMember'])->name('removeMember');
        Route::post('/{team}/leave', [TeamController::class, 'leaveTeam'])->name('leave');
        Route::delete('/{team}', [TeamController::class, 'destroy'])->name('destroy');

        // Projects
        Route::prefix('{team}/projects')->name('projects.')->group(function () {
            Route::get('/', [ProjectController::class, 'index'])->name('index');
            Route::get('/create', [ProjectController::class, 'create'])->name('create');
            Route::post('/', [ProjectController::class, 'store'])->name('store');
            Route::get('/{project}', [ProjectController::class, 'show'])->name('show');
            Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('destroy');

            // Tasks
            Route::prefix('{project}/tasks')->name('tasks.')->group(function () {
                Route::post('/', [TeamTaskController::class, 'store'])->name('store');
                // ... etc
            });
        });
    });

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::put('/', [ProfileController::class, 'update'])->name('update');
    });
});

Route::get('/teamTask', function () {
    return view('teamTask');
})->name('teamTask');

Route::get('/member', function () {
    return view('member');
})->name('member');
