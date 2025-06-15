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
        <div class="flex justify-end mb-6"> <a class="inline-block rounded-sm border border-[#635985] bg-[#443C68] px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-[#635985] focus:ring-3 focus:outline-hidden"
                href="#">
                Add Task
            </a>
        </div>

        <div class=" overflow-x-auto shadow-sm border border-gray-200 dark:border-gray-700">
        <table class=" text-sm text-left text-gray-700 dark:text-gray-100 w-[100%]">
          <thead class="bg-violet-100 dark:bg-[#443C68] text-gray-900 dark:text-white">
            <tr>
              <th scope="col" class="px-6 py-4">Task Name</th>
              <th scope="col" class="px-6 py-4">Description</th>
              <th scope="col" class="px-6 py-4">Deadline</th>
              <th scope="col" class="px-6 py-4">Status</th>
            </tr>
          </thead>
          <tbody class="bg-white dark:bg-[#635985]">
            <tr class="border-b border-gray-200 dark:border-gray-700">
              <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Rekayasa Perangkat Lunak</td>
              <td class="px-6 py-4">Membuat proyek aplikasi</td>
              <td class="px-6 py-4">17-6-2025</td>
              <td class="px-6 py-4 text-green-600 dark:text-green-400">Active</td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
              <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Pengolahan Citra</td>
              <td class="px-6 py-4">UAS</td>
              <td class="px-6 py-4">16-6-2025</td>
              <td class="px-6 py-4 text-red-600 dark:text-red-400">Inactive</td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
              <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">PBO</td>
              <td class="px-6 py-4">Ngoding</td>
              <td class="px-6 py-4">9-6-2025</td>
              <td class="px-6 py-4 text-green-600 dark:text-green-400">Active</td>
            </tr>
             <tr class="border-b border-gray-200 dark:border-gray-700">
              <td class="px-6 py-4 font-medium text-gray-900 dark:text-white"></td>
              <td class="px-6 py-4"></td>
              <td class="px-6 py-4"></td>
              <td class="px-6 py-4 text-red-600 dark:text-red-400">Inactive</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>

</body>
</html>