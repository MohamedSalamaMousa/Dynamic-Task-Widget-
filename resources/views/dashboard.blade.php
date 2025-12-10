<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- My Tasks Widget - Minimal Clean -->
            <div
                class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-800">
                <!-- Header Section -->
                <div class="bg-white/60 dark:bg-gray-900/60 p-6 border-b border-gray-100 dark:border-gray-800">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div
                                class="bg-gray-50 dark:bg-gray-800 p-3 rounded-xl border border-gray-100 dark:border-gray-800">
                                <svg class="w-6 h-6 text-gray-700 dark:text-gray-200" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">My Tasks</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400" id="taskCounter">Loading...</p>
                            </div>
                        </div>
                        <button onclick="fetchTasks()"
                            class="inline-flex items-center gap-2 px-3 py-2 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-sm rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Refresh
                        </button>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Add Task Form - Minimal -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Add New
                            Task</label>
                        <div class="flex gap-3 relative">
                            <div class="flex-1 relative">
                                <input type="text" id="taskTitle" placeholder="What needs to be done?"
                                    class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-gray-300 dark:focus:border-gray-600 focus:ring-0 transition placeholder:text-gray-400">
                                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <button onclick="addTask()"
                                class="flex-shrink-0 px-6 py-3 bg-black dark:bg-gray-800 text-white font-medium rounded-lg hover:bg-gray-800 dark:hover:bg-gray-700 shadow-sm transition transform hover:-translate-y-0.5 z-10">
                                <span class="flex items-center gap-2">Add</span>
                            </button>
                        </div>
                        <div id="error-message"
                            class="text-red-600 dark:text-red-400 text-sm mt-2 hidden flex items-center gap-2 bg-red-50 dark:bg-red-900/10 px-4 py-2 rounded-md">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span></span>
                        </div>
                    </div>

                    <!-- Task List & Filters -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">
                                Task List</h4>
                            <div class="flex gap-2">
                                <button onclick="filterTasks('all', event)"
                                    class="filter-btn active px-3 py-1 text-xs font-medium rounded-md transition bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-200 border border-gray-100 dark:border-gray-700">All</button>
                                <button onclick="filterTasks('active', event)"
                                    class="filter-btn px-3 py-1 text-xs font-medium rounded-md transition bg-transparent text-gray-600 dark:text-gray-300 border border-transparent hover:bg-gray-50 dark:hover:bg-gray-800">Active</button>
                                <button onclick="filterTasks('completed', event)"
                                    class="filter-btn px-3 py-1 text-xs font-medium rounded-md transition bg-transparent text-gray-600 dark:text-gray-300 border border-transparent hover:bg-gray-50 dark:hover:bg-gray-800">Completed</button>
                            </div>
                        </div>

                        <div id="taskList" class="space-y-3">
                            <div class="flex items-center justify-center py-12">
                                <div
                                    class="animate-spin rounded-full h-10 w-10 border-b-2 border-gray-800 dark:border-gray-200">
                                </div>
                            </div>
                        </div>

                        <!-- Empty State -->
                        <div id="emptyState" class="hidden text-center py-12">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 bg-gray-50 dark:bg-gray-800 rounded-full mb-4 border border-gray-100 dark:border-gray-700">
                                <svg class="w-8 h-8 text-gray-400 dark:text-gray-300" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">No tasks yet</h3>
                            <p class="text-gray-500 dark:text-gray-400">Add your first task to get started!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <style>
            .filter-btn {
                @apply bg-transparent text-gray-600 dark:text-gray-300;
            }

            .filter-btn.active {
                @apply bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 border border-gray-200 dark:border-gray-700;
            }

            .filter-btn:hover:not(.active) {
                @apply bg-gray-50 dark:bg-gray-800;
            }

            .task-item {
                animation: slideIn 180ms ease-out;
            }

            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateY(-6px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .task-checkbox:checked+.task-text {
                animation: strikethrough 220ms ease-out;
            }

            @keyframes strikethrough {
                from {
                    text-decoration-color: transparent;
                }

                to {
                    text-decoration-color: currentColor;
                }
            }

            input:focus,
            button:focus {
                outline: none;
                box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.06);
            }
        </style>

        <script>
            const csrfToken = '{{ csrf_token() }}';
            let allTasks = [];
            let currentFilter = 'all';

            document.addEventListener('DOMContentLoaded', fetchTasks);

            async function fetchTasks() {
                try {
                    const response = await fetch('/tasks', {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    });
                    if (!response.ok) throw new Error('Failed to fetch tasks');

                    allTasks = await response.json();
                    filterTasks(currentFilter);
                    updateCounter();
                } catch (error) {
                    console.error(error);
                    document.getElementById('taskList').innerHTML =
                        '<div class="text-center py-8 text-red-600 dark:text-red-400"><p>Failed to load tasks. Please refresh the page.</p></div>';
                }
            }

            function displayTasks(tasks) {
                const taskList = document.getElementById('taskList');
                const emptyState = document.getElementById('emptyState');

                if (tasks.length === 0) {
                    taskList.innerHTML = '';
                    emptyState.classList.remove('hidden');
                    return;
                }

                emptyState.classList.add('hidden');

                taskList.innerHTML = tasks.map(task => `
                <div class="task-item group flex items-center gap-4 p-4 bg-white dark:bg-gray-900 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-sm transition-all duration-150 ${task.is_completed ? 'opacity-60' : ''}" id="task-${task.id}">
                    <div class="flex items-center gap-4 flex-1">
                        <label class="relative flex items-center cursor-pointer">
                            <input type="checkbox" ${task.is_completed ? 'checked' : ''} onchange="toggleTask(${task.id})" class="task-checkbox appearance-none w-5 h-5 border-2 border-gray-300 dark:border-gray-600 rounded-sm checked:bg-gray-900 dark:checked:bg-white checked:border-transparent focus:outline-none transition-all cursor-pointer">
                            <svg class="absolute left-0.5 top-0.5 w-3.5 h-3.5 text-white pointer-events-none ${task.is_completed ? 'opacity-100' : 'opacity-0'}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </label>
                        <span class="task-text flex-1 text-gray-900 dark:text-gray-100 font-medium ${task.is_completed ? 'line-through text-gray-500 dark:text-gray-600' : ''}">${escapeHtml(task.title)}</span>
                    </div>
                    <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-xs text-gray-400 dark:text-gray-500">${getTimeAgo(task.created_at)}</span>
                        <button onclick="deleteTask(${task.id})" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/10 rounded-md transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
                `).join('');
            }

            async function addTask() {
                const input = document.getElementById('taskTitle');
                const title = input.value.trim();
                const errorDiv = document.getElementById('error-message');
                const errorSpan = errorDiv.querySelector('span');

                if (!title) {
                    errorSpan.textContent = 'Task title is required';
                    errorDiv.classList.remove('hidden');
                    input.focus();
                    return;
                }
                errorDiv.classList.add('hidden');

                try {
                    const response = await fetch('/tasks', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            title
                        })
                    });
                    if (!response.ok) {
                        const errorData = await response.json();
                        throw new Error(errorData.message || 'Failed to add task');
                    }

                    const task = await response.json();
                    input.value = '';


                    allTasks.unshift(task); // تضيف المهمة الجديدة في أول القائمة
                    filterTasks(currentFilter);
                    updateCounter();
                } catch (error) {
                    console.error(error);
                    errorSpan.textContent = error.message || 'An error occurred while adding the task';
                    errorDiv.classList.remove('hidden');
                }
            }

            async function toggleTask(taskId) {
                try {
                    const response = await fetch(`/tasks/${taskId}`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    });
                    if (!response.ok) throw new Error('Failed to update task');

                    const task = await response.json();
                    const index = allTasks.findIndex(t => t.id === task.id);
                    if (index !== -1) allTasks[index] = task;

                    filterTasks(currentFilter);
                    updateCounter();
                } catch (error) {
                    console.error(error);
                }
            }

            async function deleteTask(taskId) {
                try {
                    const response = await fetch(`/tasks/${taskId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                    if (!response.ok) throw new Error('Failed to delete task');

                    allTasks = allTasks.filter(t => t.id !== taskId);
                    filterTasks(currentFilter);
                    updateCounter();
                } catch (error) {
                    console.error(error);
                }
            }

            function updateCounter() {
                const total = allTasks.length;
                const completed = allTasks.filter(t => t.is_completed).length;
                const active = total - completed;
                document.getElementById('taskCounter').textContent =
                    `${active} active · ${completed} completed · ${total} total`;
            }

            function filterTasks(filter, event) {
                currentFilter = filter;
                if (event) document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
                if (event) event.currentTarget.classList.add('active');

                let filtered = allTasks;
                if (filter === 'active') filtered = allTasks.filter(t => !t.is_completed);
                else if (filter === 'completed') filtered = allTasks.filter(t => t.is_completed);

                displayTasks(filtered);
            }

            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            function getTimeAgo(dateString) {
                const date = new Date(dateString);
                const now = new Date();
                const seconds = Math.floor((now - date) / 1000);
                if (seconds < 60) return 'just now';
                if (seconds < 3600) return `${Math.floor(seconds/60)}m ago`;
                if (seconds < 86400) return `${Math.floor(seconds/3600)}h ago`;
                return `${Math.floor(seconds/86400)}d ago`;
            }
            document.getElementById('taskTitle').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') addTask();
            });
        </script>
    @endpush
</x-app-layout>
