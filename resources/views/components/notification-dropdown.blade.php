<div class="relative" x-data="{ notificationsOpen: false }">
    <button @click="notificationsOpen = !notificationsOpen" 
        @keydown.escape.window="notificationsOpen = false"
        @click.away="notificationsOpen = false"
        class="relative p-2 text-gray-400 hover:text-gray-600 dark:hover:text-white transition-colors focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        <span class="absolute top-0 right-0 block h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white dark:ring-[#1a2632] animate-pulse"></span>
    </button>

    <!-- Dropdown -->
    <div x-show="notificationsOpen" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        class="absolute right-0 mt-3 w-80 md:w-96 bg-white dark:bg-[#1a2632] rounded-xl shadow-xl border border-gray-100 dark:border-gray-800 ring-1 ring-black ring-opacity-5 z-50 overflow-hidden"
        style="display: none;">
        
        <div class="p-4 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between">
            <h3 class="text-sm font-bold text-gray-900 dark:text-white">Notifications</h3>
            <button class="text-xs text-primary hover:text-primary-hover font-medium transition-colors">Mark all as read</button>
        </div>

        <div class="max-h-[400px] overflow-y-auto custom-scrollbar">
            <!-- Item 1 -->
            <a href="#" class="block p-4 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors border-b border-gray-50 dark:border-gray-800/50">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-500 dark:bg-blue-900/30 dark:text-blue-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </span>
                    </div>
                    <div class="ml-3 w-0 flex-1">
                        <p class="text-xs font-semibold text-gray-900 dark:text-white">New Student Registration</p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">John Doe has registered for Class 10-A.</p>
                        <p class="mt-1 text-[10px] text-gray-400 dark:text-gray-500">2 minutes ago</p>
                    </div>
                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full mt-1.5"></span>
                </div>
            </a>

            <!-- Item 2 -->
            <a href="#" class="block p-4 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors border-b border-gray-50 dark:border-gray-800/50">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-yellow-100 text-yellow-500 dark:bg-yellow-900/30 dark:text-yellow-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </span>
                    </div>
                    <div class="ml-3 w-0 flex-1">
                        <p class="text-xs font-semibold text-gray-900 dark:text-white">System Alert</p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Database backup scheduled for tonight.</p>
                        <p class="mt-1 text-[10px] text-gray-400 dark:text-gray-500">1 hour ago</p>
                    </div>
                </div>
            </a>

            <!-- Item 3 -->
            <a href="#" class="block p-4 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-500 dark:bg-green-900/30 dark:text-green-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </div>
                    <div class="ml-3 w-0 flex-1">
                        <p class="text-xs font-semibold text-gray-900 dark:text-white">Payment Received</p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Fees payment confirmed for Invoice #4023.</p>
                        <p class="mt-1 text-[10px] text-gray-400 dark:text-gray-500">3 hours ago</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="p-3 border-t border-gray-100 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/30 text-center">
            <a href="#" class="text-xs font-medium text-primary hover:text-primary-hover transition-colors">View All Notifications</a>
        </div>
    </div>
</div>
