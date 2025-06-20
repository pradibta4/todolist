<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Nugas - Individual</title>
</head>

<body class="bg-[var(--bg-color)]">

    <div>
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global" x-data="{ isOpen: false }">
                <div class="flex lg:flex-1">
                    <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">Nugas</span>
                    <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="" />
                    </a>
                </div>

                <div class="ml-4 flex items-center md:ml-6">
                    <button type="button" class="relative rounded-full bg-[#443C68] p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                    <div>
                        <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Open user menu</span>
                        <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                        </button>
                    </div>
                    
                    <div x-show="isOpen"
                    x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-[#443C68] py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100 outline-hidden", Not Active: "" -->
                        <a href="#" class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                    </div>
                </div>
            </nav>
        </header>

        <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-8" x-data="{ showAddTaskForm: false }">

        <div class="py-8">
            <div class="flex justify-end mb-6">
                <button type="button"
                        class="ml-4 inline-block rounded-md px-12 py-3 text-sm font-medium text-white bg-[#443C68] hover:bg-[#281F50] focus:ring-3 focus:outline-hidden"
                        @click="showAddTaskForm = true"> Add Task
                </button>
            </div>

            <div x-show="showAddTaskForm"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-90"
                 class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                 @click.outside="showAddTaskForm = false"
                 @keydown.escape.window="showAddTaskForm = false"
                 x-cloak>

                <div class="bg-white rounded-lg p-8 max-w-2xl w-full mx-auto shadow-xl relative">
                    <button type="button"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-600"
                            @click="showAddTaskForm = false">
                        <span class="sr-only">Close form</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <form>
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base/7 font-semibold text-gray-900">Add New Task</h2>
                                <p class="mt-1 text-sm/6 text-gray-600">Enter the details for your new task.</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="task-name" class="block text-sm/6 font-medium text-gray-900">Task Name</label>
                                        <div class="mt-2">
                                            <input type="text" name="task-name" id="task-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="e.g., Finish Nugas homepage" />
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="task-description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                                        <div class="mt-2">
                                            <textarea name="task-description" id="task-description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                        </div>
                                        <p class="mt-3 text-sm/6 text-gray-600">Provide a detailed description of the task.</p>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="deadline" class="block text-sm/6 font-medium text-gray-900">Deadline</label>
                                        <div class="mt-2">
                                            <input type="date" name="deadline" id="deadline" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="status" class="block text-sm/6 font-medium text-gray-900">Status</label>
                                        <div class="mt-2">
                                            <select id="status" name="status" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                                <option value="to_do">To Do</option>
                                                <option value="on_progress">On Progress</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Assigned To Dropdown -->
                                    <div class="sm:col-span-3">
                                        <label class="block text-sm font-medium text-gray-900 mb-2">
                                            Assigned to <span class="text-red-500">*</span>
                                        </label>
                                        <div class="sm:col-span-3">
                                            <button type="button" 
                                                    class="relative w-full cursor-pointer rounded-md bg-white py-2.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-[#443C68] sm:text-sm transition-colors"
                                                    @click="showAssignedDropdown = !showAssignedDropdown"
                                                    @click.away="showAssignedDropdown = false">
                                                <span class="flex items-center">
                                                    <img :src="selectedAssignee.avatar" 
                                                         alt="" 
                                                         class="h-6 w-6 flex-shrink-0 rounded-full" />
                                                    <span class="ml-3 block truncate font-medium" x-text="selectedAssignee.name"></span>
                                                </span>
                                                <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                    <svg class="h-5 w-5 text-gray-400 transition-transform duration-200"
                                                         :class="{ 'rotate-180': showAssignedDropdown }"
                                                         viewBox="0 0 20 20" 
                                                         fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </button>

                                            <!-- Dropdown Menu -->
                                            <ul x-show="showAssignedDropdown"
                                                x-transition:enter="transition ease-out duration-100"
                                                x-transition:enter-start="transform opacity-0 scale-95"
                                                x-transition:enter-end="transform opacity-100 scale-100"
                                                x-transition:leave="transition ease-in duration-75"
                                                x-transition:leave-start="transform opacity-100 scale-100"
                                                x-transition:leave-end="transform opacity-0 scale-95"
                                                class="absolute z-20 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="button" class="text-sm/6 font-semibold text-gray-900" @click="showAddTaskForm = false">Cancel</button>
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save Task</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- table -->
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-100 uppercase tracking-wider dark:bg-[#443C68] dark:text-white">
                        <tr>
                            <th scope="col" class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold dark:border-gray-600">Task Name</th>
                            <th scope="col" class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold w-1/3 dark:border-gray-600">Description</th>
                            <th scope="col" class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold dark:border-gray-600">Deadline</th>
                            <th scope="col" class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold dark:border-gray-600">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-gray-900 dark:bg-[#635985] dark:text-white">
                        <template x-for="(task, index) in tasks" :key="index">
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-[#6B5B95] transition-colors">
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="whitespace-no-wrap" x-text="task.name"></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 text-sm max-w-[200px] break-words">
                                    <p x-text="task.description"></p>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                    <p x-text="formatDate(task.deadline)"></p>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                    <select x-model="task.status" 
                                            @change="updateTaskStatus(index, $event.target.value)"
                                            class="px-3 py-1 text-sm font-semibold rounded-full border-0 focus:ring-2 focus:ring-offset-2 focus:outline-none"
                                            :class="{
                                                'bg-green-200 text-green-900 focus:ring-green-500 dark:bg-green-700 dark:text-green-100': task.status === 'done',
                                                'bg-yellow-200 text-yellow-900 focus:ring-yellow-500 dark:bg-yellow-700 dark:text-yellow-100': task.status === 'on_progress'
                                                'bg-yellow-200 text-yellow-900 focus:ring-yellow-500 dark:bg-yellow-700 dark:text-yellow-100': task.status === 'to_do'
                                            }">
                                        <option value="to_do">To Do</option>
                                        <option value="on_progress">On Progress</option>
                                        <option value="done">Done</option>
                                    </select>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>