<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nugas - Choose How to Manage Tasks</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

        body {
            position: relative;
            overflow: hidden;
        }
        .dot-large-top-left::before,
        .dot-medium-top-right::before,
        .dot-small-top-right::before,
        .dot-large-bottom-left::before {
            content: '';
            position: absolute;
            background-color: var(--color-accent-purple);
            border-radius: 50%;
            filter: blur(50px);
            opacity: 0.1;
            z-index: 0;
        }

        .dot-large-top-left::before {
            width: 300px;
            height: 300px;
            top: -150px;
            left: -150px;
        }
        .dot-medium-top-right::before {
            width: 150px;
            height: 150px;
            top: 20px;
            right: 20px;
        }
        .dot-small-top-right::before {
            width: 80px;
            height: 80px;
            top: 50px;
            right: 200px;
        }
        .dot-large-bottom-left::before {
            width: 400px;
            height: 400px;
            bottom: -200px;
            left: -200px;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center relative dot-large-top-left dot-medium-top-right dot-small-top-right dot-large-bottom-left bg-[var(--bg-color)]">

    <div class="absolute inset-0 bg-primary-dark-bg z-0"></div>

    <div class="relative z-10 p-8">
        <h1 class="text-xl md:text-3xl font-semibold text-center text-text-light mb-12 select-none text-white">
            Choose Task Type
        </h1>

        <div class="flex flex-col md:flex-row gap-8 justify-center items-center">

            <a href="/individu" class="bg-card-bg rounded-xl shadow-lg p-8 w-80 h-72 flex flex-col items-center justify-center text-center cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-xl hover:ring-2 hover:ring-accent-purple 
            bg-[#443C68] hover:bg-[#281F50]">
                <img src="{{ asset('img/User.png') }}" alt="Individual Icon" class="w-20 h-20 mb-4">
                <h2 class="text-2xl font-semibold text-text-light mb-2 text-white">Individual</h2>
                <p class="text-sm text-white">A personal task managed on your own.</p>
            </a>

            <a href="/team" class="bg-card-bg rounded-xl shadow-lg p-8 w-80 h-72 flex flex-col items-center justify-center text-center cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-xl hover:ring-2 hover:ring-accent-purple
            bg-[#443C68] hover:bg-[#281F50]">
                <img src="{{ asset('img/Users-team.png') }}" alt="Team Icon" class="w-20 h-20 mb-4">
                <h2 class="text-2xl font-semibold text-text-light mb-2 text-white">Team</h2>
                <p class="text-sm text-white">A collaborative task handled with your team.</p>
            </a>

        </div>
    </div>

</body>
</html>