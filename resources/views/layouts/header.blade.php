<header
    class="h-16 bg-white dark:bg-[#1a2632] border-b border-gray-100 dark:border-gray-800 flex items-center justify-between px-4 lg:px-8 sticky top-0 z-30 transition-colors duration-300">
    <!-- Mobile Toggle -->
    <button @click="sidebarOpen = true" class="lg:hidden p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- Desktop Toggle -->
    <button @click="sidebarCollapsed = !sidebarCollapsed"
        class="hidden lg:block p-2 text-gray-400 hover:text-gray-600 dark:hover:text-white focus:outline-none transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            :class="sidebarCollapsed ? 'rotate-180' : ''">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
        </svg>
    </button>

    <!-- Search -->
    <div class="w-full max-w-sm ml-4 lg:ml-0 hidden md:block">
        <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </span>
            <input type="text" placeholder="Search for students, teachers, classes..."
                class="w-full bg-gray-50 dark:bg-gray-800/50 text-sm p-2.5 pl-10 rounded-lg border-none focus:ring-0 focus:bg-gray-100 dark:focus:bg-gray-800 placeholder-gray-400 dark:text-gray-200 transition-colors">
        </div>
    </div>

    <!-- Right Actions -->
    <div class="flex items-center space-x-4 lg:space-x-6">
        <!-- Dark Mode Toggle -->
        <button @click="toggleDarkMode()"
            style="width: 64px; height: 32px; display: inline-flex;  align-items: center; border-radius: 9999px; flex-shrink: 0; font-family: 'Lexend', sans-serif;"
            class="relative transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
            :class="darkMode ? 'bg-slate-700' : 'bg-gray-200'"
            :aria-label="darkMode ? 'Switch to light mode' : 'Switch to dark mode'">
            
            <!-- Using inline styles for guaranteed smooth sliding with spring ease -->
            <span class="inline-block h-6 w-6 rounded-full bg-white shadow-md flex items-center justify-center transition-transform duration-500"
                style="transition-timing-function: cubic-bezier(0.34, 1.56, 0.64, 1);"
                :style="darkMode ? 'transform: translateX(36px)' : 'transform: translateX(4px)'">
                
                <!-- Sun Icon -->
                <svg x-show="!darkMode" class="h-4 w-4 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>

                <!-- Moon Icon -->
                <svg x-show="darkMode" class="h-4 w-4 text-slate-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </span>
        </button>


        <!-- Language Switcher -->
        @include('components.language-dropdown')

        <!-- Notifications -->
        @include('components.notification-dropdown')
        <div class="flex items-center pl-4 lg:pl-6 border-l border-gray-100 dark:border-gray-800">
            <div class="text-right mr-3 hidden lg:block">
                <p class="text-sm font-bold text-gray-800 dark:text-white leading-none">Principal</p>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Administrator</p>
            </div>
            <div
                class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden border-2 border-white dark:border-gray-800 shadow-sm">
                <img src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff" alt="Admin"
                    class="h-full w-full object-cover">
            </div>
        </div>
    </div>
</header>

