<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | Controller ini bertanggung jawab untuk menangani permintaan reset
    | password dan menggunakan trait sederhana untuk menyertakan perilaku ini.
    | Anda bebas untuk menjelajahi trait ini dan mengganti metode apa pun
    | yang ingin Anda sesuaikan.
    |
    */

    use ResetsPasswords;

    /**
     * Ke mana harus mengarahkan pengguna setelah password mereka direset.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
}
