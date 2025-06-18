{{-- Menggunakan tata letak utama dari layouts/app.blade.php --}}
@extends('layouts.app')

@section('content')
<body class="bg-[#140E2D]">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-white">My Solo Tasks</h1>
                {{-- Tombol ini sekarang mengarah ke route untuk membuat tugas baru --}}
                <a class="inline-block rounded-md border border-[#635985] bg-[#443C68] px-8 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-[#635985] focus:ring-3 focus:outline-none transition-colors"
                   href="{{ route('solo_tasks.create') }}">
                    Add Task
                </a>
            </div>

            <div class="overflow-x-auto shadow-md border border-gray-700 rounded-lg">
                <table class="text-sm text-left text-gray-200 w-full">
                    <thead class="bg-[#443C68] text-xs text-white uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Task Name</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Deadline</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#635985]">
                        {{-- 
                          Looping melalui data $tasks yang dikirim dari controller.
                          @forelse digunakan untuk menampilkan data jika ada,
                          atau menampilkan pesan jika kosong.
                        --}}
                        @forelse ($tasks as $task)
                            <tr class="border-b border-gray-700 hover:bg-opacity-75 hover:bg-[#443C68]">
                                <td class="px-6 py-4 font-medium text-white">{{ $task->name }}</td>
                                <td class="px-6 py-4">{{ $task->description }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') }}</td>
                                <td class="px-6 py-4">
                                    {{-- Mengubah warna status berdasarkan nilainya --}}
                                    @if ($task->is_completed)
                                        <span class="text-green-400 font-semibold">Completed</span>
                                    @else
                                        <span class="text-yellow-400 font-semibold">In Progress</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            {{-- Pesan ini akan muncul jika tidak ada tugas sama sekali --}}
                            <tr>
                                <td colspan="4" class="text-center py-8 text-gray-400">
                                    You have no tasks yet. Click "Add Task" to create one!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
@endsection
