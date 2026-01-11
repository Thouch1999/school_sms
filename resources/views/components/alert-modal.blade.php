@if (session('success'))
    <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="absolute inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm shadow-2xl"
        style="display: none;">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl w-full max-w-sm p-6 transform transition-all scale-100"
            @click.away="show = false">
            <div class="flex flex-col items-center text-center">
                <div class="size-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-green-600 dark:text-green-400 text-3xl">check_circle</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Success!</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">{{ session('success') }}</p>
                <button @click="show = false"
                    class="w-full py-2.5 px-4 bg-primary hover:bg-primary-hover text-white font-medium rounded-lg transition-colors duration-200"
                    x-text="$store.locale.translations[$store.locale.current].modal.alert_ok">
                    OK
                </button>
            </div>
        </div>
    </div>
@endif
