<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Todolist') }}</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- Menggunakan Vite untuk memuat aset dari app.css --}}
    @vite('resources/css/app.css')
    
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap"
        rel="stylesheet"
    />
    <style>
        body {
            font-family: "Ubuntu", sans-serif;
        }
    </style>
</head>
<body class="bg-[#140E2D] text-white min-h-screen flex items-center justify-center p-4 sm:p-12">
    {{-- Kontainer Utama dengan Elemen Dekoratif --}}
    <div class="relative w-full max-w-md bg-[#3A335C] flex flex-col items-center py-12 sm:py-20 px-6 sm:px-12 rounded-lg shadow-2xl overflow-hidden">
        
        <!-- Lingkaran dekoratif kanan atas -->
        <div class="absolute top-0 right-0 -mr-16 -mt-16 pointer-events-none z-0">
            <div class="w-48 h-48 rounded-full bg-[#453D6F] opacity-50"></div>
        </div>

        <!-- Lingkaran dekoratif kiri bawah -->
        <div class="absolute bottom-0 left-0 -ml-16 -mb-16 pointer-events-none z-0">
            <div class="w-48 h-48 rounded-full bg-[#453D6F] opacity-50"></div>
        </div>

        {{-- Konten dinamis dari halaman lain akan dimasukkan di sini --}}
        <div id="app" class="relative z-10 w-full">
            @yield('content')
        </div>

         <!-- Tombol Kembali ke Login -->
            <div class="text-center mt-8">
                <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-300 hover:text-white transition-colors">
                    &larr; Kembali ke Login
                </a>
            </div>
    </div>
</body>
</html>
