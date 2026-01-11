<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full ' + (sidebarCollapsed ? 'lg:w-20' : 'lg:w-64')"
    class="bg-slate-900 text-white flex flex-col fixed inset-y-0 left-0 z-50 transition-all duration-300 w-64 lg:translate-x-0">
    <!-- Brand -->
    <div class="h-16 flex items-center justify-between px-6 border-b border-slate-800 overflow-hidden">
        <div class="flex items-center min-w-max">
            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
            </div>
            <div x-show="!sidebarCollapsed" class="transition-opacity duration-300">
                <h1 class="text-sm font-bold">School Admin</h1>
                <p class="text-xs text-slate-400">SMS MANAGER</p>
            </div>
        </div>
        <!-- Mobile Close Button -->
        <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 py-6 space-y-1 overflow-y-auto overflow-x-hidden">
        @php
            $navItems = [
                [
                    'route' => 'dashboard',
                    'translation_key' => 'dashboard',
                    'icon' =>
                        'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z',
                ],

                [
                    'route' => 'students',
                    'translation_key' => 'students',
                    'icon' =>
                        'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                ],

                [
                    'route' => null,
                    'translation_key' => 'teachers',
                    'icon' =>
                        'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                ],

                [
                    'route' => null,
                    'translation_key' => 'classes',
                    'icon' =>
                        'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                ],

                [
                    'route' => null,
                    'translation_key' => 'subjects',
                    'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2',
                ],

                [
                    'route' => null,
                    'translation_key' => 'exams',
                    'icon' =>
                        'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
                ],

                [
                    'route' => null,
                    'translation_key' => 'fees',
                    'icon' =>
                        'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                ],
                [
                    'route' => null,
                    'translation_key' => 'reports',
                    'icon' =>
                        'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                ],
            ];
        @endphp

        @foreach ($navItems as $item)
            <a href="{{ $item['route'] ? route($item['route']) : '#' }}" style="border-left-width: 10px;"
                class="flex items-center px-6 py-3 text-sm font-medium border-l-[10px] border-solid transition-colors whitespace-nowrap {{ $item['route'] && (request()->routeIs($item['route']) || request()->routeIs($item['route'] . '.*')) ? 'border-primary bg-slate-800 text-white' : 'border-transparent text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <svg class="w-5 h-5 flex-shrink-0 transition-all duration-300"
                    :class="sidebarCollapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}">
                    </path>
                </svg>
                <span x-show="!sidebarCollapsed" class="ml-3 font-medium transition-opacity duration-300" x-text="$store.locale.translations[$store.locale.current].menu['{{ $item['translation_key'] }}']"></span>
            </a>
        @endforeach
    </nav>

    <!-- Bottom Section -->
    <div class="p-4 border-t border-slate-800 overflow-hidden">
        {{-- <div x-show="!sidebarCollapsed" class="bg-slate-800 rounded-lg p-3 mb-4 transition-opacity duration-300">
            <div class="flex justify-between items-center mb-1">
                <span class="text-xs text-slate-300 font-medium">Database</span>
                <span class="text-xs text-primary font-bold">75%</span>
            </div>
            <div class="w-full bg-slate-700 rounded-full h-1.5">
                <div class="bg-primary h-1.5 rounded-full" style="width: 75%"></div>
            </div>
            <p class="text-[10px] text-slate-500 mt-1">Records Storage</p>
        </div> --}}
        
        <!-- Logout Form (Hidden) -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
        <button type="button"
            @click="$dispatch('open-confirm-modal', { type: 'logout', formId: 'logout-form' })"
            class="flex items-center w-full text-sm font-medium text-red-400 hover:text-red-300 transition-colors whitespace-nowrap"
            :class="sidebarCollapsed ? 'justify-center' : ''">
            <svg class="w-5 h-5 flex-shrink-0" :class="sidebarCollapsed ? 'mr-0' : 'mr-3'" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                </path>
            </svg>
            <span x-show="!sidebarCollapsed"
                x-text="$store.locale.translations[$store.locale.current].menu['logout']">Logout</span>
        </button>
    </div>
</aside>
