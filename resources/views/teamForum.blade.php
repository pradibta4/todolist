<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Team Name</title>
</head>

<body class="h-full">
    <div class="flex h-screen bg-[var(--bg-color)]">

    <!-- sidebar -->
    <div class="hidden md:flex flex-col w-64 bg-gray-800">
        <div class="flex items-center justify-center h-16 bg-[#443C68]">
            <span class="text-white font-bold uppercase">Team Name</span>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
            <nav class="flex-1 px-2 py-4 bg-[#443C68]">
                <a href="/member" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-[#635985]">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"
                />
              </svg>
                    Team Members
                </a>
                <a
              href="#"
              class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-[#635985]"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605"
                />
              </svg>

              Team Assignment
            </a>

            <a
              href="#"
              class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-[#635985]"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"
                />
              </svg>

              Calling Room
            </a>

            <a
              href="#"
              class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-[#635985]"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M13 10V3L4 14h7v7l9-11h-7z"
                />
              </svg>
              Settings
            </a>
                
                
            </nav>
        </div>
    </div>

    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
    <div class="flex items-center justify-between h-30 bg-[#443C68] p-4">
        <div class="w-full flex justify-center">
            <div class="flex flex-col"> <div class="w-[1000px] bg-white rounded-full h-4 dark:bg-white"> <div class="bg-[#635985] h-4 rounded-full" style="width: 20%"></div>
                </div>
                <div class="flex items-center justify-between mt-2"> <p class="text-sm font-semibold text-white"> Team Progress: 20%
                    </p>
                    
                    <a href="#" class="text-sm font-semibold text-white hover:underline whitespace-nowrap">
                        See Details &gt;
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4">
        <h1 class="text-2xl font-bold text-white">Welcome to Team Name </h1>
        <p class="mt-2 text-white">Raising tomorrow's leaders.</p>
    </div>
</div>
    
</div>
</body>
</html>