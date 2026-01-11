<footer
    :class="sidebarCollapsed ? 'lg:ml-20' : 'lg:ml-64'"
    class="fixed bottom-0 right-0 left-0 z-30 px-4 lg:px-8 py-4 border-t border-gray-100 dark:border-gray-800 bg-white dark:bg-[#1a2632] transition-all duration-300 mt-8">
    <div
        class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-500 dark:text-gray-400 font-medium">
        <div class="flex items-center gap-2">
            <span>© {{ date('Y') }} School Admin</span>
            <span class="text-gray-300 dark:text-gray-700">|</span>
            <span class="flex items-center gap-1">
                Created by <span class="text-primary font-bold">chanthoch</span>,<span
                    class="text-primary font-bold">Taimeng</span>
            </span>,<span class="text-primary font-bold">Nary</span>,<span class="text-primary font-bold">Rithisak</span>
        </div>

        <div x-data="{
            time: '',
            date: '',
            updateClock() {
                const now = new Date();
                this.time = now.toLocaleTimeString('en-US', { hour12: false });
                this.date = now.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
            }
        }" x-init="updateClock();
        setInterval(() => updateClock(), 1000)"
            class="relative flex-shrink-0">
            
            <div @click.stop="$dispatch('open-calendar', { trigger: $el })" 
                 class="flex items-center gap-4 bg-gray-50 dark:bg-gray-800/50 px-4 py-1.5 rounded-full border border-gray-100 dark:border-gray-700 shadow-sm transition-all hover:bg-white dark:hover:bg-gray-800 cursor-pointer hover:shadow-md hover:border-primary/20 group">

                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm text-primary group-hover:scale-110 transition-transform">calendar_today</span>
                    <span x-text="date" class="font-bold text-gray-700 dark:text-gray-200"></span>
                </div>

                <span class="text-gray-300 dark:text-gray-700">|</span>

                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm text-primary">schedule</span>
                    <span x-text="time"
                        class="font-mono font-bold text-gray-800  dark:text-gray-200 tracking-wider"></span>
                </div>
            </div>
            
        </div>
    </div>
</footer>
