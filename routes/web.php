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

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/dsbrdLogin', function () {
    return view('dsbrdLogin');
})->name('dsbrdLogin');

Route::get('/role', function () {
    return view('role');
})->name('role');

Route::get('/individu', function () {
    return view('individu');
})->name('individu');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/teamForum', function () {
    return view('teamForum');
})->name('teamForum');

Route::get('/teamTask', function () {
    return view('teamTask');
})->name('teamTask');

Route::get('/member', function () {
    return view('member');
})->name('member');