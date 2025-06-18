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