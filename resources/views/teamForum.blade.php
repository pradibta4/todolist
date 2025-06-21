<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Team Name</title>
</head>

<body class="h-screen bg-[var(--bg-color)] overflow-hidden">

    <!-- Header Navbar -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-[#443C68] border-b border-gray-700">
        <nav class="flex items-center justify-between px-6 py-4" aria-label="Global" x-data="{ isOpen: false }">
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <span class="sr-only">Nugas</span>
                    <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="" />
                </a>
            </div>

            <div class="flex items-center space-x-4">
                <!-- Notification Button -->
                <button type="button" class="relative rounded-full bg-[#635985] p-2 text-gray-300 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#443C68] focus:outline-none transition-colors">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                </button>

                <!-- Profile Dropdown -->
                <div class="relative">
                    <button type="button" @click="isOpen = !isOpen" class="flex items-center rounded-full bg-[#635985] text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#443C68] focus:outline-none transition-colors" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                    </button>
                    
                    <div x-show="isOpen"
                         x-cloak
                         @click.away="isOpen = false"
                         x-transition:enter="transition ease-out duration-100 transform"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75 transform"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-[#443C68] py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                        <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-[#635985] transition-colors" role="menuitem">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-[#635985] transition-colors" role="menuitem">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-[#635985] transition-colors" role="menuitem">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    

    <!-- Main Layout Container -->
    <div class="flex h-screen pt-16">
        
        <!-- Sidebar -->
        <div class="w-64 bg-[#443C68] border-r border-gray-700 flex-shrink-0 overflow-y-auto">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-center h-16 bg-[#635985] border-b border-gray-700">
                <span class="text-white font-bold uppercase tracking-wide">Team Name</span>
            </div>
            
            <!-- Sidebar Navigation -->
            <nav class="flex-1 px-2 py-4 space-y-2">
                <a href="/member" class="flex items-center px-4 py-3 text-gray-100 hover:bg-[#635985] rounded-lg transition-colors group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-300 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    Team Members
                </a>
                
                <a href="/teamTask" class="flex items-center px-4 py-3 text-gray-100 hover:bg-[#635985] rounded-lg transition-colors group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-300 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                    </svg>
                    Team Assignment
                </a>

                <a href="#" class="flex items-center px-4 py-3 text-gray-100 hover:bg-[#635985] rounded-lg transition-colors group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-300 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                    Calling Room
                </a>

                <!-- Team Overview Section -->
                <div class="px-2 py-4">
                    <h2 class="text-lg font-semibold text-white mb-3">Team Overview</h2>
                    <div class="space-y-3">
                        <div class="bg-[#635985] rounded-lg p-3">
                            <h3 class="text-white font-medium text-sm mb-1">Active Tasks</h3>
                            <p class="text-xl font-bold text-white">0</p>
                        </div>
                        <div class="bg-[#635985] rounded-lg p-3">
                            <h3 class="text-white font-medium text-sm mb-1">Completed Tasks</h3>
                            <p class="text-xl font-bold text-white">0</p>
                        </div>
                        <div class="bg-[#635985] rounded-lg p-3">
                            <h3 class="text-white font-medium text-sm mb-1">Team Members</h3>
                            <p class="text-xl font-bold text-white">3</p>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <!-- Progress Bar Section -->
            <div class="bg-[#443C68] border-b border-gray-700 px-6 py-6">
                <div class="max-w-4xl mx-auto">
                    <div class="bg-white rounded-full h-4 overflow-hidden shadow-inner">
                        <div class="bg-[#635985] h-full rounded-full transition-all duration-500 ease-out" style="width: 20%"></div>
                    </div>
                    <div class="flex items-center justify-between mt-3">
                        <p class="text-sm font-semibold text-white">
                            Team Progress: 20%
                        </p>
                        <a href="/teamTask" class="text-sm font-semibold text-white hover:text-gray-300 hover:underline transition-colors">
                            See Details →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 overflow-y-auto bg-[var(--bg-color)] p-6">
                <div class="max-w-4xl mx-auto">
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-white mb-2">Welcome to Team Name</h1>
                        <p class="text-gray-300 text-lg">Raising tomorrow's leaders.</p>
                    </div>                    
                </div>
            </div>

            <!-- Chat Messages Area -->
                <div class="flex-1 overflow-y-auto bg-[var(--bg-color)] p-6">
                    <div class="space-y-4">
                        <!-- Sample Messages -->
                        <div class="flex items-start space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="flex-1">
                                <div class="flex items-center space-x-2">
                                    <span class="text-white font-medium text-sm">John Doe</span>
                                    <span class="text-gray-400 text-xs">2:30 PM</span>
                                </div>
                                <div class="mt-1 bg-[#443C68] rounded-lg px-4 py-2 text-gray-100 text-sm">
                                    Hey team! How's the progress on the assignment?
                                </div>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="flex-1">
                                <div class="flex items-center space-x-2">
                                    <span class="text-white font-medium text-sm">Sarah Smith</span>
                                    <span class="text-gray-400 text-xs">2:32 PM</span>
                                </div>
                                <div class="mt-1 bg-[#443C68] rounded-lg px-4 py-2 text-gray-100 text-sm">
                                    I've completed my part.
                                </div>
                                <div class="mt-2 bg-[#635985] rounded-lg px-4 py-3 flex items-center space-x-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-white text-sm font-medium">Project_Report.pdf</p>
                                        <p class="text-gray-300 text-xs">2.4 MB</p>
                                    </div>
                                    <button class="text-white hover:text-gray-300 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- My Message -->
                        <div class="flex items-start space-x-3 justify-end">
                            <div class="flex-1 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <span class="text-gray-400 text-xs">2:35 PM</span>
                                    <span class="text-white font-medium text-sm">You</span>
                                </div>
                                <div class="mt-1 bg-[#635985] rounded-lg px-4 py-2 text-white text-sm inline-block">
                                    Great work! I'll review it now.
                                </div>
                            </div>
                            <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                    </div>
                </div>

                <!-- Chat Input Area -->
                <div class="bg-[#443C68] border-t border-gray-700 px-6 py-4">
                    <div class="flex items-end space-x-4">
                        <!-- File Upload Button -->
                        <button class="flex-shrink-0 bg-[#635985] hover:bg-[#7C6A9A] text-white p-3 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#443C68]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                            </svg>
                        </button>

                        <!-- Message Input -->
                        <div class="flex-1 relative">
                            <textarea 
                                rows="1" 
                                placeholder="Type your message..." 
                                class="w-full bg-[#635985] text-white placeholder-gray-300 rounded-lg px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#443C68] resize-none"
                                style="min-height: 44px; max-height: 120px;"
                            ></textarea>
                            
                            <!-- Emoji Button -->
                            <button class="absolute bottom-2 right-2 text-gray-300 hover:text-white transition-colors p-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Send Button -->
                        <button class="flex-shrink-0 bg-[#635985] hover:bg-[#7C6A9A] text-white p-3 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#443C68]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    </div>
                </div>

        </div>
    </div>

</body>
</html>