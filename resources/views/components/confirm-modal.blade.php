<div x-data="{ 
    show: false, 
    title: '', 
    message: '', 
    confirmText: '',
    cancelText: '',
    formToSubmit: null,
    type: 'default',
    open(event) {
        this.type = event.detail.type || 'default';
        
        // Get translations from Alpine store
        const t = Alpine.store('locale').translations[Alpine.store('locale').current].modal;
        
        // Set defaults based on type
        if (this.type === 'logout') {
            this.title = event.detail.title || t.logout_title;
            this.message = event.detail.message || t.logout_message;
            this.confirmText = event.detail.confirmText || t.logout_confirm;
            this.cancelText = event.detail.cancelText || t.logout_cancel;
        } else if (this.type === 'delete') {
            this.title = event.detail.title || t.delete_title;
            this.message = event.detail.message || t.delete_message;
            this.confirmText = event.detail.confirmText || t.delete_confirm;
            this.cancelText = event.detail.cancelText || t.delete_cancel;
        } else {
            this.title = event.detail.title || t.confirm_title;
            this.message = event.detail.message || t.confirm_message;
            this.confirmText = event.detail.confirmText || t.confirm_button;
            this.cancelText = event.detail.cancelText || t.cancel_button;
        }
        
        this.formToSubmit = event.detail.formId;
        this.show = true;
    },
    submit() {
        if (this.formToSubmit) {
            document.getElementById(this.formToSubmit).submit();
        }
        this.show = false;
    }
}" 
@open-confirm-modal.window="open($event)"
x-show="show" 
x-cloak
class="absolute inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
style="display: none;">
    
    <div x-show="show" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all"
         @click.away="show = false">
        
        <div class="p-6">
            <div class="flex items-center justify-center size-14 rounded-full mb-5 mx-auto"
                 :class="type === 'logout' ? 'bg-blue-100 dark:bg-blue-900/30' : 'bg-red-100 dark:bg-red-900/30'">
                <span class="material-symbols-outlined text-3xl"
                      :class="type === 'logout' ? 'text-blue-600 dark:text-blue-400' : 'text-red-600 dark:text-red-400'"
                      x-text="type === 'logout' ? 'logout' : 'warning'"></span>
            </div>
            
            <div class="text-center">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2" x-text="title"></h3>
                <p class="text-gray-600 dark:text-gray-400" x-text="message"></p>
            </div>
        </div>
        
        <div class="bg-gray-50 dark:bg-gray-800/50 px-6 py-4 flex flex-col-reverse sm:flex-row justify-end gap-3 border-t border-gray-100 dark:border-gray-700">
            <button @click="show = false" 
                    class="px-5 py-2.5 text-sm font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-xl transition-colors"
                    x-text="cancelText">
            </button>
            <button @click="submit()" 
                    class="px-5 py-2.5 text-sm font-semibold text-white rounded-xl shadow-lg transition-all hover:-translate-y-0.5"
                    :class="type === 'logout' ? 'bg-blue-600 hover:bg-blue-700 shadow-blue-500/20' : 'bg-red-600 hover:bg-red-700 shadow-red-500/20'"
                    x-text="confirmText">
            </button>
        </div>
    </div>
</div>
