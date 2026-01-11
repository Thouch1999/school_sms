<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Angkor&family=Battambang:wght@100;300;400;700;900&family=Hanuman:wght@100..900&family=Koulen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&family=Noto+Sans:wght@300;400;500;600;700;800;900&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('darkMode') === 'true' || 
            (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <style>
        body {
            font-family: 'Battambang', sans-serif;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        .dark ::-webkit-scrollbar-thumb {
            background: #334155;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-[#102216] font-sans antialiased transition-colors duration-300" 
      x-data="{ 
        sidebarOpen: false, 
        sidebarCollapsed: false,
        darkMode: localStorage.getItem('darkMode') === 'true',
        toggleDarkMode() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('darkMode', this.darkMode);
            if (this.darkMode) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
      }">
    <div class="min-h-screen flex relative bg-gray-50 dark:bg-[#102216] transition-colors duration-300">
        <!-- Sidebar -->
        @include('layouts.leftsidebar')

        <!-- Main Content -->
        <main class="flex-1 min-w-0 flex flex-col transition-all duration-300" 
              :class="sidebarCollapsed ? 'lg:ml-20' : 'lg:ml-64'">
            <!-- Header -->
            @include('layouts.header')

            <!-- Page Content -->
            <div class="p-4 lg:p-8 flex-1 relative overflow-y-auto h-[calc(100vh-8rem)]">
                @yield('content')
                
                <!-- Modals (Content-scoped) -->
                @include('components.alert-modal')
                @include('components.confirm-modal')
            </div>

            <!-- Footer -->
            @include('layouts.footer')
        </main>

        <!-- Mobile Overlay -->
        <div x-show="sidebarOpen" x-transition.opacity 
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-black/50 z-40 lg:hidden"></div>
    </div>

    @php
        $translations = [
            'en' => [
                'menu' => trans('menu', [], 'en'),
                'student' => [
                    'index' => trans('student/index', [], 'en'),
                    'create'=>trans('student/create',[],'en'),
                    'view'=>trans('student/view',[],'en'),
                    'edit'=>trans('student/edit',[],'en'),
                ],
                'calendar' => trans('calendar', [], 'en'),
                'modal' => trans('modal', [], 'en'),
                'dashboard' => trans('dashboard', [], 'en'),
            ],
            'kh' => [
                'menu' => trans('menu', [], 'kh'),
                'student' => [
                    'index' => trans('student/index', [], 'kh'),
                    'create'=>trans('student/create',[], 'kh'),
                    'view'=>trans('student/view',[], 'kh'),
                    'edit'=>trans('student/edit',[], 'kh'),
                ],
                'calendar' => trans('calendar', [], 'kh'),
                'modal' => trans('modal', [], 'kh'),
                'dashboard' => trans('dashboard', [], 'kh'),
            ],
        ];
    @endphp

    @include('components.calendar-modal')

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('locale', {
                current: localStorage.getItem('app_locale') || 'en',
                translations: @json($translations),
                
                toggle(lang) {
                    this.current = lang;
                    localStorage.setItem('app_locale', lang);
                }
            });
        });
    </script>
</body>
</html>
