<?php

namespace App\Http\Controllers;

// Import trait untuk otorisasi akses (misalnya, AuthorizeRequests::authorize())
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// Import trait untuk validasi request (misalnya, ValidatesRequests::validate())
use Illuminate\Foundation\Validation\ValidatesRequests;
// Import kelas Controller dasar dari Laravel. Diberi alias BaseController
// untuk menghindari konflik nama dengan kelas Controller kita sendiri di namespace ini.
use Illuminate\Routing\Controller as BaseController; 

// Deklarasi kelas Controller kita. Ini adalah kelas abstrak,
// yang berarti tidak bisa diinstansiasi langsung, tapi bisa di-extend.
// Ini meng-extend BaseController Laravel untuk mendapatkan fungsionalitas inti.
abstract class Controller extends BaseController 
{
    // Menggunakan trait yang diimpor. Ini membuat method-method seperti
    // $this->authorize() dan $this->validate() tersedia di semua controller
    // yang meng-extend kelas Controller ini.
    use AuthorizesRequests, ValidatesRequests; 
}
