<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Nugas</title>
</head>

<body class="bg-[var(--bg-color)]">
    <div>
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">Nugas</span>
                    <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="" />
                    </a>
                </div>

                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="/login" class="text-sm/6 font-semibold text-white">Log in <span aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>
        </header>

        <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        
        <div class="mx-auto max-w-4xl py-32 sm:py-48 lg:py-56">
        <div class="hidden sm:mb-8 sm:flex sm:justify-center"></div>
            <div class="text-center">
                <h1 class="text-5xl font-semibold tracking-tight text-balance text-white sm:text-7xl">Nugas: Track Tasks. Collaborate. Make Progress.</h1>
                <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8">Welcome to Nugas, where every 
                    task becomes a step forward. Manage your personal to-dos with ease, or collaborate seamlessly with your team to drive collective progress. 
                    Get organized, stay focused, and achieve more, together or alone.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="/login" class="rounded-md bg-[#443C68] px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-[#281F50] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                </div>
            </div>
        </div>
        
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-288.75" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
       
    </div>
    <!-- Ini adalah form untuk logout -->
<form method="POST" action="{{ route('logout') }}">
    @csrf <!-- Token keamanan, wajib ada -->

    <button type="submit" style="background-color: red; color: white; padding: 8px 16px; border-radius: 5px; cursor: pointer;">
        Logout
    </button>
</form>
</div>

</body>
</html>