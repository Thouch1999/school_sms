<div class="relative" x-data="{ languageOpen: false }">
    <button @click="languageOpen = !languageOpen" 
        @keydown.escape.window="languageOpen = false"
        @click.away="languageOpen = false"
        class="relative p-2 text-gray-400 hover:text-gray-600 dark:hover:text-white transition-colors focus:outline-none flex items-center gap-2">
        <div class="h-5 w-5 rounded-full overflow-hidden border border-gray-200 dark:border-gray-700">
            <template x-if="$store.locale.current === 'en'">
                <img src="https://flagcdn.com/w40/gb.png" alt="English" class="h-full w-full object-cover">
            </template>
            <template x-if="$store.locale.current === 'kh'">
                <img src="https://flagcdn.com/w40/kh.png" alt="Khmer" class="h-full w-full object-cover">
            </template>
        </div>
    </button>

    <!-- Dropdown -->
    <div x-show="languageOpen" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        class="absolute right-0 mt-3 w-48 bg-white dark:bg-[#1a2632] rounded-xl shadow-xl border border-gray-100 dark:border-gray-800 ring-1 ring-black ring-opacity-5 z-50 overflow-hidden"
        style="display: none;">
        
        <div class="py-1">
            <button @click="$store.locale.toggle('en'); languageOpen = false" 
                class="w-full text-left px-4 py-3 text-sm flex items-center gap-3 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors"
                :class="$store.locale.current === 'en' ? 'text-primary bg-blue-50/50 dark:bg-blue-900/20' : 'text-gray-700 dark:text-gray-300'">
                <div class="h-5 w-5 rounded-full overflow-hidden border border-gray-200 dark:border-gray-700 flex-shrink-0">
                    <img src="https://flagcdn.com/w40/gb.png" alt="English" class="h-full w-full object-cover">
                </div>
                <span class="font-medium">English</span>
                <span x-show="$store.locale.current === 'en'" class="ml-auto text-primary">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </span>
            </button>

            <button @click="$store.locale.toggle('kh'); languageOpen = false" 
                class="w-full text-left px-4 py-3 text-sm flex items-center gap-3 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors"
                :class="$store.locale.current === 'kh' ? 'text-primary bg-blue-50/50 dark:bg-blue-900/20' : 'text-gray-700 dark:text-gray-300'">
                <div class="h-5 w-5 rounded-full overflow-hidden border border-gray-200 dark:border-gray-700 flex-shrink-0">
                    <img src="https://flagcdn.com/w40/kh.png" alt="Khmer" class="h-full w-full object-cover">
                </div>
                <span class="font-medium">Khmer</span>
                <span x-show="$store.locale.current === 'kh'" class="ml-auto text-primary">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
</div>
