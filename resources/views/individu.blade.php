<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Nugas - Individual</title>
</head>
<body class="bg-[var(--bg-color)]">
    <div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="flex justify-end mb-6"> <a class="inline-block rounded-sm border border-transparent bg-[#443C68] hover:bg-[#281F50] px-12 py-3 text-sm font-medium text-white focus:ring-3 focus:outline-hidden"
                href="#">
                Add Task
            </a>
        </div>

        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead class="bg-gray-100 uppercase tracking-wider
                          dark:bg-[#443C68] dark:text-white">
                <tr>
                    <th scope="col" class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold">
                        Task Name
                    </th>
                    <th scope="col" class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold">
                        Description
                    </th>
                    <th scope="col" class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold">
                        Deadline
                    </th>
                    <th scope="col" class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white text-gray-900 dark:bg-[#635985] dark:text-white">
                <tr class="border-b border-gray-200">
                    <td class="px-5 py-5 text-sm"> <div class="flex items-center">
                            <div class="ml-3"> <p class="whitespace-no-wrap">
                                    Rekayasa Perangkat Lunak
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 text-sm"> <p>Membuat proyek aplikasi</p>
                    </td>
                    <td class="px-5 py-5 text-sm"> <p>17-6-2025</p>
                    </td>
                    <td class="px-5 py-5 text-sm"> <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full dark:bg-green-700"></span>
                            <span class="relative text-green-900 dark:text-green-400">Done</span>
                        </span>
                    </td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="px-5 py-5 text-sm">
                        <div class="flex items-center">
                             <div class="ml-3">
                                <p class="whitespace-no-wrap">Pengolahan Citra</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 text-sm">
                        <p>UAS</p>
                    </td>
                    <td class="px-5 py-5 text-sm">
                        <p>16-6-2025</p>
                    </td>
                    <td class="px-5 py-5 text-sm">
                        <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full dark:bg-red-700"></span>
                            <span class="relative text-red-900 dark:text-red-400">On Progress</span>
                        </span>
                    </td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="px-5 py-5 text-sm">
                        <div class="flex items-center">
                             <div class="ml-3">
                                <p class="whitespace-no-wrap">PBO</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 text-sm">
                        <p>Ngoding</p>
                    </td>
                    <td class="px-5 py-5 text-sm">
                        <p>9-6-2025</p>
                    </td>
                    <td class="px-5 py-5 text-sm">
                        <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full dark:bg-green-700"></span>
                            <span class="relative text-green-900 dark:text-green-400">Done</span>
                        </span>
                    </td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="px-5 py-5 text-sm">
                        <div class="flex items-center">
                             <div class="ml-3">
                                <p class="whitespace-no-wrap">AI</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 text-sm">
                        <p>Membuat artikel dan sertakan nama saya di depan</p>
                    </td>
                    <td class="px-5 py-5 text-sm">
                        <p>17-6-2025</p>
                    </td>
                    <td class="px-5 py-5 text-sm">
                        <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full dark:bg-red-700"></span>
                            <span class="relative text-red-900 dark:text-red-400">On Progress</span>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>

</body>
</html>