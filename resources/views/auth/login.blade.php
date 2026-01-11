<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('auth.title') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-blue': '#2196F3',
                        'brand-green': '#4CAF50',
                    },
                    fontFamily: {
                        'sans': ['Kantumruy Pro', 'Inter', 'sans-serif']
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Kantumruy Pro', 'Inter', sans-serif;
        }
        .bg-geometric-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        html {
            line-height: 1.6;
        }
    </style>
</head>
<body class="bg-white font-sans antialiased h-screen overflow-hidden" x-data="{ showPassword: false, currentLang: '{{ app()->getLocale() }}' }">
    <div class="flex h-full w-full">
        <!-- Left Panel - Enhanced Branding -->
        <div class="hidden lg:flex lg:w-1/2 relative bg-gradient-to-br from-[#2196F3] via-[#2196F3] to-[#4CAF50] items-center justify-center p-12 overflow-hidden">
            <!-- Geometric Pattern Background -->
            <div class="absolute inset-0 bg-geometric-pattern"></div>
            
            <!-- Blur Effects -->
            <div class="absolute top-[-10%] right-[-10%] w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-5%] left-[-5%] w-96 h-96 bg-green-500/20 rounded-full blur-3xl"></div>
            
            <!-- Content -->
            <div class="relative z-10 max-w-lg text-center">
                <!-- Logo/Icon -->
                <div class="mb-10 inline-flex items-center justify-center w-24 h-24 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 shadow-2xl">
                    <div class="text-white">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                        </svg>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6 leading-tight tracking-wide">
                    {{ __('auth.system_name') }}
                </h1>

                <!-- Tagline -->
                <p class="text-xl text-white/90 font-light leading-relaxed">
                    {{ __('auth.tagline') }}
                </p>

                <!-- Carousel Indicators -->
                <div class="mt-12 flex justify-center gap-4">
                    <div class="h-1.5 w-12 bg-white/40 rounded-full"></div>
                    <div class="h-1.5 w-4 bg-white/40 rounded-full"></div>
                    <div class="h-1.5 w-4 bg-white/40 rounded-full"></div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="absolute bottom-8 left-12">
                <p class="text-white/60 text-sm font-medium">{{ __('auth.copyright') }}</p>
            </div>
        </div>

        <!-- Right Panel - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white overflow-y-auto relative">
            <!-- Language Switcher -->
            <div class="absolute top-8 right-8 flex items-center bg-gray-50 border border-gray-100 rounded-lg p-1 shadow-sm">
                <a href="{{ route('login', ['lang' => 'en']) }}" 
                   class="px-3 py-1.5 text-xs font-bold rounded-md transition-all duration-200 {{ app()->getLocale() === 'en' ? 'bg-white text-brand-blue shadow-sm border border-gray-100' : 'text-gray-400 hover:text-brand-blue' }}">
                    EN
                </a>
                <div class="w-[1px] h-4 bg-gray-200 mx-1"></div>
                <a href="{{ route('login', ['lang' => 'kh']) }}" 
                   class="px-3 py-1.5 text-xs font-bold rounded-md transition-all duration-200 {{ app()->getLocale() === 'kh' ? 'bg-white text-brand-blue shadow-sm border border-gray-100' : 'text-gray-400 hover:text-brand-blue' }}">
                    KH
                </a>
            </div>
            <div class="w-full max-w-md">
                <!-- Mobile Logo -->
                <div class="lg:hidden flex flex-col items-center mb-10">
                    <div class="text-brand-blue mb-2">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ __('auth.system_name') }}</h2>
                </div>

                <!-- Welcome Text -->
                <div class="mb-10 text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('auth.welcome_back') }}</h2>
                    <p class="text-gray-500 font-medium">{{ __('auth.subtitle') }}</p>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login.authenticate') }}" class="space-y-6">
                    @csrf

                    <!-- Username/Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            {{ __('auth.username_or_email') }}
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-brand-blue transition-colors">
                                <span class="material-symbols-outlined text-lg">person</span>
                            </div>
                            <input 
                                type="text" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                placeholder="{{ __('auth.email_placeholder') }}"
                                required
                                autofocus
                                class="block w-full pl-11 pr-4 py-3.5 bg-gray-50/50 border border-gray-200 rounded-xl text-gray-900 focus:ring-2 focus:ring-brand-blue/10 focus:border-brand-blue transition-all placeholder:text-gray-400 @error('email') border-red-500 @enderror"
                            >
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm font-semibold text-gray-700">
                                {{ __('auth.password') }}
                            </label>
                            <a href="#" class="text-sm font-semibold text-brand-blue hover:text-blue-700 transition-colors">
                                {{ __('auth.forgot_password') }}
                            </a>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-brand-blue transition-colors">
                                <span class="material-symbols-outlined text-lg">lock</span>
                            </div>
                            <input 
                                :type="showPassword ? 'text' : 'password'"
                                id="password" 
                                name="password" 
                                placeholder="{{ __('auth.password_placeholder') }}"
                                required
                                class="block w-full pl-11 pr-12 py-3.5 bg-gray-50/50 border border-gray-200 rounded-xl text-gray-900 focus:ring-2 focus:ring-brand-blue/10 focus:border-brand-blue transition-all placeholder:text-gray-400 @error('password') border-red-500 @enderror"
                            >
                            <button 
                                type="button"
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors"
                            >
                                <span class="material-symbols-outlined text-lg" x-show="!showPassword">visibility_off</span>
                                <span class="material-symbols-outlined text-lg" x-show="showPassword" style="display: none;">visibility</span>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input 
                                type="checkbox" 
                                id="remember" 
                                name="remember"
                                {{ old('remember') ? 'checked' : '' }}
                                class="w-5 h-5 rounded border-gray-300 text-brand-green focus:ring-brand-green/20 transition-all cursor-pointer"
                            >
                            <span class="text-sm font-medium text-gray-600">{{ __('auth.remember_me') }}</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full bg-brand-green text-white font-bold py-4 px-6 rounded-xl shadow-lg shadow-brand-green/20 hover:bg-green-600 hover:shadow-xl hover:shadow-brand-green/30 active:scale-[0.99] transition-all transform duration-150 flex items-center justify-center gap-2"
                    >
                        {{ __('auth.sign_in') }}
                        <span class="material-symbols-outlined text-xl">arrow_forward</span>
                    </button>
                </form>

                <!-- Request Access -->
                <div class="mt-10 pt-8 border-t border-gray-100">
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-2 text-sm">
                        <span class="text-gray-500">{{ __('auth.no_account') }}</span>
                        <a href="#" class="font-bold text-brand-green hover:underline">{{ __('auth.request_access') }}</a>
                    </div>
                </div>

                <!-- Footer Links -->
                <div class="mt-8 flex justify-center space-x-6">
                    <a href="#" class="text-xs text-gray-400 hover:text-gray-600 transition-colors">{{ __('auth.privacy_policy') }}</a>
                    <a href="#" class="text-xs text-gray-400 hover:text-gray-600 transition-colors">{{ __('auth.terms_of_service') }}</a>
                    <a href="#" class="text-xs text-gray-400 hover:text-gray-600 transition-colors">{{ __('auth.help_center') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
