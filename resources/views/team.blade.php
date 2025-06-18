<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Nugas - Team</title>
</head>

<body class="antialiased font-sans bg-[var(--bg-color)]">

   <div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="flex justify-end mb-6"> <a class="inline-block rounded-sm border border-transparent bg-[#443C68] hover:bg-[#281F50] px-12 py-3 text-sm font-medium text-white focus:ring-3 focus:outline-hidden"
                href="#">
                Create a Team
            </a>
        </div>

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead class="bg-[#443C68] text-white">
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                                Team Name
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                                Role
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                                Progress </th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#635985] text-white"> <tr>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="whitespace-no-wrap"> Kelompok PBO
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="whitespace-no-wrap">Admin</p> </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <span
                                    class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden class="absolute inset-0"></span>
                                    <span class="relative">100%</span>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="whitespace-no-wrap"> Kelompok RPL
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="whitespace-no-wrap">Member</p> </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <span
                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                    <span aria-hidden class="absolute inset-0"></span>
                                    <span class="relative">50%</span>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-5 py-5 text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="whitespace-no-wrap"> Proyek Fakultas
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">Member</p> </td>
                            <td class="px-5 py-5 text-sm">
                                <span
                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                    <span aria-hidden class="absolute inset-0"></span>
                                    <span class="relative">20%</span>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>