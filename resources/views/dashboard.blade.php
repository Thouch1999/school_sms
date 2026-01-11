@extends('layouts.master')

@section('content')
    <div class="mb-8 flex items-end justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" x-text="$store.locale.translations[$store.locale.current].dashboard.title">School Dashboard</h2>
            <p class="text-gray-500 mt-1" x-text="$store.locale.translations[$store.locale.current].dashboard.subtitle">Here's what's happening in your school today.</p>
        </div>
        <div class="flex gap-3">
             <button class="flex items-center px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                <span x-text="$store.locale.translations[$store.locale.current].dashboard.admit_student">Admit Student</span>
            </button>
             <button class="flex items-center px-4 py-2 bg-primary hover:bg-primary-hover text-white rounded-lg text-sm font-medium transition-colors shadow-sm shadow-green-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <span x-text="$store.locale.translations[$store.locale.current].dashboard.add_class">Add Class</span>
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="relative z-10">
                <p class="text-sm font-medium text-gray-500" x-text="$store.locale.translations[$store.locale.current].dashboard.total_students">Total Students</p>
                <div class="flex items-baseline mt-2">
                    <h3 class="text-3xl font-bold text-gray-800">1,240</h3>
                    <span class="ml-2 text-xs font-medium text-green-600 bg-green-100 px-1.5 py-0.5 rounded-full">+12%</span>
                </div>
                <p class="text-xs text-gray-400 mt-1" x-text="$store.locale.translations[$store.locale.current].dashboard.current_year">Current academic year</p>
            </div>
             <div class="absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-green-50 to-transparent opacity-50"></div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="relative z-10">
                <p class="text-sm font-medium text-gray-500" x-text="$store.locale.translations[$store.locale.current].dashboard.total_teachers">Total Teachers</p>
                <div class="flex items-baseline mt-2">
                    <h3 class="text-3xl font-bold text-gray-800">45</h3>
                     <span class="ml-2 text-xs font-medium text-blue-600 bg-blue-100 px-1.5 py-0.5 rounded-full">~2%</span>
                </div>
                <p class="text-xs text-gray-400 mt-1" x-text="$store.locale.translations[$store.locale.current].dashboard.active_faculty">Active faculty members</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="relative z-10">
                <p class="text-sm font-medium text-gray-500" x-text="$store.locale.translations[$store.locale.current].dashboard.active_classes">Active Classes</p>
                <div class="flex items-baseline mt-2">
                    <h3 class="text-3xl font-bold text-gray-800">28</h3>
                     <span class="ml-2 text-xs font-medium text-amber-600 bg-amber-100 px-1.5 py-0.5 rounded-full">~5%</span>
                </div>
                <p class="text-xs text-gray-400 mt-1" x-text="$store.locale.translations[$store.locale.current].dashboard.across_grades">Across all grades</p>
            </div>
        </div>

         <!-- Card 4 -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="relative z-10">
                <p class="text-sm font-medium text-gray-500" x-text="$store.locale.translations[$store.locale.current].dashboard.avg_attendance">Avg Attendance</p>
                <div class="flex items-baseline mt-2">
                    <h3 class="text-3xl font-bold text-gray-800">92%</h3>
                     <span class="ml-2 text-xs font-medium text-green-600 bg-green-100 px-1.5 py-0.5 rounded-full">~1.5%</span>
                </div>
                <p class="text-xs text-gray-400 mt-1" x-text="$store.locale.translations[$store.locale.current].dashboard.daily_average">Daily average this week</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Attendance Chart -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                     <h3 class="font-bold text-gray-800" x-text="$store.locale.translations[$store.locale.current].dashboard.attendance_trends">Attendance Trends</h3>
                     <p class="text-sm text-gray-500" x-text="$store.locale.translations[$store.locale.current].dashboard.attendance_subtitle">Student attendance over the last 30 days</p>
                </div>
                <div class="flex bg-gray-100 p-1 rounded-lg">
                    <button class="px-3 py-1 text-xs font-medium bg-white shadow-sm rounded-md text-gray-800" x-text="$store.locale.translations[$store.locale.current].dashboard['30_days']">30 Days</button>
                    <button class="px-3 py-1 text-xs font-medium text-gray-500 hover:text-gray-700" x-text="$store.locale.translations[$store.locale.current].dashboard['7_days']">7 Days</button>
                     <button class="px-3 py-1 text-xs font-medium text-gray-500 hover:text-gray-700" x-text="$store.locale.translations[$store.locale.current].dashboard['24_hours']">24 Hours</button>
                </div>
            </div>

            <!-- Chart Placeholder (Simulated CSS Chart) -->
            <div class="relative h-64 w-full bg-green-50/30 rounded-xl border border-dashed border-green-100 flex items-center justify-center overflow-hidden">
                <!-- Simple SVG Curve for visual -->
                 <svg class="absolute bottom-0 left-0 w-full h-48 text-primary opacity-20" preserveAspectRatio="none" viewBox="0 0 1000 300">
                     <path d="M0,300 L0,200 C150,200 150,100 300,100 C450,100 450,250 600,250 C750,250 750,50 900,50 C950,50 950,100 1000,100 L1000,300 Z" fill="currentColor" />
                 </svg>
                 <svg class="absolute bottom-0 left-0 w-full h-48 text-primary" fill="none" stroke="currentColor" stroke-width="3" preserveAspectRatio="none" viewBox="0 0 1000 300">
                     <path d="M0,200 C150,200 150,100 300,100 C450,100 450,250 600,250 C750,250 750,50 900,50 C950,50 950,100 1000,100" />
                 </svg>
                 <!-- Data Points -->
                 <div class="absolute top-[33%] left-[30%] w-3 h-3 bg-white border-2 border-primary rounded-full z-10"></div>
                 <div class="absolute top-[16%] left-[90%] w-3 h-3 bg-white border-2 border-primary rounded-full z-10"></div>

                 <!-- Grid Lines -->
                 <div class="absolute inset-0 grid grid-cols-4 pointer-events-none">
                     <div class="border-r border-gray-100 h-full"></div>
                     <div class="border-r border-gray-100 h-full"></div>
                     <div class="border-r border-gray-100 h-full"></div>
                 </div>
                 
                 <div class="absolute bottom-2 left-0 w-full flex justify-between px-10 text-xs text-gray-400">
                     <span x-text="$store.locale.translations[$store.locale.current].dashboard.week_1">Week 1</span>
                     <span x-text="$store.locale.translations[$store.locale.current].dashboard.week_2">Week 2</span>
                     <span x-text="$store.locale.translations[$store.locale.current].dashboard.week_3">Week 3</span>
                     <span x-text="$store.locale.translations[$store.locale.current].dashboard.week_4">Week 4</span>
                 </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-bold text-gray-800 mb-6" x-text="$store.locale.translations[$store.locale.current].dashboard.recent_activity">Recent Activity</h3>
            <div class="space-y-6">
                <!-- Item 1 -->
                <div class="flex gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-800"><span class="font-bold">John Doe</span> admitted to Class 9A.</p>
                        <p class="text-xs text-gray-400 mt-1">2 mins ago</p>
                    </div>
                </div>

                 <!-- Item 2 -->
                <div class="flex gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-800"><span class="font-bold">Mrs. Smith</span> updated <span class="text-blue-500">"Science Syllabus"</span>.</p>
                        <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                    </div>
                </div>

                 <!-- Item 3 -->
                <div class="flex gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-800"><span class="font-bold">Mike Ross</span> paid <span class="text-purple-500">"Term 2 Fees"</span>.</p>
                        <p class="text-xs text-gray-400 mt-1">3 hours ago</p>
                    </div>
                </div>

                 <!-- Item 4 -->
                <div class="flex gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-800">Exam schedule published.</p>
                        <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                    </div>
                </div>
            </div>
            
            <button class="w-full mt-6 py-2.5 text-sm font-medium text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors" x-text="$store.locale.translations[$store.locale.current].dashboard.view_all_activity">
                View All Activity
            </button>
        </div>
    </div>
    
    <!-- Bottom Quick Links -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between group cursor-pointer hover:border-gray-200 transition-colors">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-slate-200 transition-colors">
                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                     <h4 class="font-bold text-gray-800" x-text="$store.locale.translations[$store.locale.current].dashboard.manage_fees">Manage Fees</h4>
                     <p class="text-xs text-gray-500" x-text="$store.locale.translations[$store.locale.current].dashboard.track_payments">Track payments and dues</p>
                </div>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between group cursor-pointer hover:border-gray-200 transition-colors">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-slate-200 transition-colors">
                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                     <h4 class="font-bold text-gray-800" x-text="$store.locale.translations[$store.locale.current].dashboard.exam_timetable">Exam Timetable</h4>
                     <p class="text-xs text-gray-500" x-text="$store.locale.translations[$store.locale.current].dashboard.schedule_exams">Schedule and manage exams</p>
                </div>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </div>
    </div>
@endsection
