<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | Controller ini bertanggung jawab untuk menangani permintaan reset
    | password melalui email dan menyertakan trait sederhana untuk
    | menyertakan perilaku ini. Anda bebas untuk menjelajahi trait ini.
    |
    */

    use SendsPasswordResetEmails;
}
