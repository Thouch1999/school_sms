<div x-data="calendar()" x-init="init()" 
     @open-calendar.window="open($event.detail.trigger)"
     @keydown.escape.window="isOpen = false"
     @resize.window="calculatePosition()">

    <template x-teleport="body">
        <div x-show="isOpen" 
             :style="positionStyle"
             class="fixed z-[9999] w-80 max-w-sm transform overflow-hidden rounded-[32px] bg-white dark:bg-[#1a2632] text-left shadow-2xl border border-gray-100 dark:border-gray-800"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 scale-95"
             @click.outside="close()">
            
            <div class="p-6">
                <!-- Header -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-900 dark:text-white"></span>
                        <span x-text="year" class="ml-1 text-lg font-bold text-gray-900 dark:text-white"></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button @click="prevMonth()" type="button" 
                                class="p-1 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-colors focus:outline-none">
                            <span class="material-symbols-outlined font-bold text-gray-900 dark:text-white">chevron_left</span>
                        </button>
                        <button @click="nextMonth()" type="button" 
                                class="p-1 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-colors focus:outline-none">
                            <span class="material-symbols-outlined font-bold text-gray-900 dark:text-white">chevron_right</span>
                        </button>
                        <button @click="close()" type="button" 
                                class="p-1 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-colors focus:outline-none">
                            <span class="material-symbols-outlined font-bold text-gray-900 dark:text-white">close</span>
                        </button>
                    </div>
                </div>

                <!-- Days of Week -->
                <div class="mb-4" style="display: grid; grid-template-columns: repeat(7, 1fr);">
                    <template x-for="(day, index) in DAYS" :key="index">
                        <div class="text-center">
                            <span x-text="day" class="text-sm font-medium text-black dark:text-gray-200"></span>
                        </div>
                    </template>
                </div>

                <!-- Calendar Grid -->
                <div class="gap-y-4 gap-x-1" style="display: grid; grid-template-columns: repeat(7, 1fr);">
                    <!-- Previous Month Days -->
                    <template x-for="day in blankdays" :key="'prev'+day">
                        <div class="text-center">
                            <span x-text="day" class="text-sm text-gray-300 dark:text-gray-600"></span>
                        </div>
                    </template>
                    
                    <!-- Current Month Days -->
                    <template x-for="date in no_of_days" :key="'curr'+date">
                        <div @click="selectDate(date)"
                             class="aspect-square flex items-center justify-center rounded-full text-sm cursor-pointer transition-all mx-auto w-9 h-9"
                             :class="{
                                'bg-primary text-white font-bold': isToday(date) && isCurrentMonth(),
                                'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-900 dark:text-gray-100': !isToday(date) || !isCurrentMonth(),
                                'ring-1 ring-primary': isSelected(date) && !isToday(date)
                             }">
                            <span x-text="date"></span>
                        </div>
                    </template>

                    <!-- Next Month Days -->
                    <template x-for="day in nextMonthDays" :key="'next'+day">
                            <div class="text-center">
                            <span x-text="day" class="text-sm text-gray-300 dark:text-gray-600"></span>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </template>
    
    <script>
        document.addEventListener('alpine:init', () => {
             // Only register if not already registered
        });

        function calendar() {
            return {
                isOpen: false,
                trigger: null,
                positionStyle: '',
                MONTH_NAMES: [],
                DAYS: [],
                month: '',
                year: '',
                no_of_days: [],
                blankdays: [], 
                nextMonthDays: [],
                selectedDate: null,

                init() {
                    let today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    
                    this.updateTranslations();
                    this.getNoOfDays();

                    this.$watch('isOpen', value => {
                        if(value) {
                            this.goToToday();
                            this.$nextTick(() => this.calculatePosition());
                        }
                    });

                    // Watch for locale changes
                    this.$watch('$store.locale.current', () => {
                        this.updateTranslations();
                    });
                },

                updateTranslations() {
                    const t = Alpine.store('locale').translations[Alpine.store('locale').current].calendar;
                    this.MONTH_NAMES = [
                        t.january, t.february, t.march, t.april, t.may, t.june,
                        t.july, t.august, t.september, t.october, t.november, t.december
                    ];
                    this.DAYS = [
                        t.sun, t.mon, t.tue, t.wed, t.thu, t.fri, t.sat
                    ];
                },

                open(triggerEl) {
                    this.trigger = triggerEl;
                    this.isOpen = true;
                },

                close() {
                    this.isOpen = false;
                },

                calculatePosition() {
                    if (!this.trigger) return;
                    const rect = this.trigger.getBoundingClientRect();
                    // Position: Bottom of modal aligns to Top of trigger (-16px margin)
                    // Right of modal aligns to Right of trigger
                    // We use fixed positioning based on viewport
                    this.positionStyle = `top: ${rect.top - 16}px; left: ${rect.right}px; transform: translate(-100%, -100%);`;
                },

                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);
                    return today.toDateString() === d.toDateString();
                },
                
                isCurrentMonth() {
                    const today = new Date();
                    return this.month === today.getMonth() && this.year === today.getFullYear();
                },

                isSelected(date) {
                    if(!this.selectedDate) return false;
                    const d = new Date(this.year, this.month, date);
                    return this.selectedDate.toDateString() === d.toDateString();
                },

                selectDate(date) {
                    this.selectedDate = new Date(this.year, this.month, date);
                },

                getNoOfDays() {
                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                    let dayOfWeek = new Date(this.year, this.month).getDay();
                    let blankdaysArray = [];
                    let prevMonthLastDate = new Date(this.year, this.month, 0).getDate();
                    for ( let i = dayOfWeek; i > 0; i--) {
                        blankdaysArray.push(prevMonthLastDate - i + 1);
                    }

                    let daysArray = [];
                    for ( var i=1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }
                    
                    let totalDaysShown = blankdaysArray.length + daysArray.length;
                    let remainingDays = 7 - (totalDaysShown % 7);
                    let nextMonthDaysArray = [];
                    if (remainingDays < 7) {
                        for(let i=1; i <= remainingDays; i++){
                            nextMonthDaysArray.push(i);
                        }
                    }

                    this.blankdays = blankdaysArray;
                    this.no_of_days = daysArray;
                    this.nextMonthDays = nextMonthDaysArray;
                },
                
                prevMonth() {
                    if (this.month === 0) {
                        this.month = 11;
                        this.year--;
                    } else {
                        this.month--;
                    }
                    this.getNoOfDays();
                },
                
                nextMonth() {
                    if (this.month === 11) {
                        this.month = 0;
                        this.year++;
                    } else {
                        this.month++;
                    }
                    this.getNoOfDays();
                },
                
                goToToday() {
                    let today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.selectedDate = today;
                    this.getNoOfDays();
                }
            }
        }
    </script>
</div>
