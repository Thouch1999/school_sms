@extends('layouts.master')

@section('content')
    <div class="mx-auto max-w-7xl flex flex-col gap-6">

        <!-- Breadcrumbs -->
        <div class="flex flex-wrap gap-2 px-0 lg:px-4">
            <a class="text-[#617589] text-sm font-medium hover:text-primary transition-colors" href="{{ route('dashboard') }}" x-text="$store.locale.translations[$store.locale.current].menu.dashboard ?? 'Home'">Home</a>
            <span class="text-[#617589] text-sm font-medium">/</span>
            <a class="text-[#617589] text-sm font-medium hover:text-primary transition-colors" href="{{ route('students') }}" x-text="$store.locale.translations[$store.locale.current].menu.students ?? 'Students'">Students</a>
            <span class="text-[#617589] text-sm font-medium">/</span>
            <span class="text-[#111418] dark:text-white text-sm font-medium" x-text="$store.locale.translations[$store.locale.current].student.view.view_profile">Student Profile</span>
        </div>

        <!-- Page Heading & Actions -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 px-0 lg:px-4">
            <div class="flex flex-col gap-1">
                <h1 class="text-[#111418] dark:text-white text-3xl font-black leading-tight tracking-[-0.033em]" x-text="$store.locale.translations[$store.locale.current].student.view.view_profile">Student Profile</h1>
                <p class="text-[#617589] text-sm font-normal">View and manage detailed information for student records</p>
            </div>
            <div class="flex gap-3">
                <button class="flex items-center justify-center rounded-lg h-10 px-4 bg-white border border-[#dbe0e6] text-[#111418] text-sm font-bold shadow-sm hover:bg-gray-50 transition-colors gap-2">
                    <span class="material-symbols-outlined text-[20px]">print</span>
                    <span class="hidden sm:inline" x-text="$store.locale.translations[$store.locale.current].student.view.print">Print</span>
                </button>
                <a href="{{ route('students.edit', $student->student_id) }}" class="flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold shadow-sm hover:bg-primary-hover transition-colors gap-2">
                    <span class="material-symbols-outlined text-[20px]">edit</span>
                    <span class="hidden sm:inline" x-text="$store.locale.translations[$store.locale.current].student.view.edit_profile">Edit Profile</span>
                </a>
            </div>
        </div>

        <!-- Profile Header Card -->
        <div class="bg-white dark:bg-[#1a2632] rounded-lg border border-[#dbe0e6] dark:border-gray-700 p-6 flex flex-col md:flex-row gap-6 items-start shadow-sm mx-0 lg:mx-4">
            <div class="bg-center bg-no-repeat bg-cover rounded-lg w-32 h-32 md:w-40 md:h-40 shrink-0 shadow-inner border border-gray-100 overflow-hidden" 
                 id="student-photo"
                 style='background-image: url("{{ $student->photo ? asset($student->photo) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAVXIT8daHpWsAYja71BbJyM0S2apgLWvY4hPxK1TXy9u3-Mz-gA4SqpAkC7Me2cDAX_rRM2M-LlvnNLfHER30F9LCI5TrVbwdct5WXqtd30qhI-qQXcNDE-YGKd5Pnjgq6pWrRK1HmU_doegSftqRftX2hPTpbIKM2nrvPTQ5rwDcoi8EPSICkQX4SgFWNAAWVij9UH6y0xHsASJZv2--vjzJXR2JXLTiq6rsXxvGsMVPr8OIJeH11R_9M3_K4cP9Y22zotk-_FC4p' }}");'>
            </div>
            <div class="flex flex-col flex-1 w-full gap-4">
                <div class="flex flex-col md:flex-row justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-[#111418] dark:text-white">{{ $student->full_name }}</h2>
                        <p class="text-[#617589] mt-1">Class 10-B • Science Stream</p>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                        @if($student->status == 'Active') bg-green-100 text-green-800 
                        @elseif($student->status == 'Inactive') bg-gray-100 text-gray-800
                        @elseif($student->status == 'Graduated') bg-blue-100 text-blue-800
                        @else bg-red-100 text-red-800 @endif w-fit h-fit">
                        {{ $student->status }} Status
                    </span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-2 border-t border-[#f0f2f4] dark:border-gray-700 pt-4">
                    <div class="flex flex-col">
                        <span class="text-xs font-semibold text-[#617589] uppercase tracking-wider" x-text="$store.locale.translations[$store.locale.current].student.view.admission_no">Admission No</span>
                        <span class="text-sm font-medium text-[#111418] dark:text-white mt-1">{{ $student->student_code }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs font-semibold text-[#617589] uppercase tracking-wider" x-text="$store.locale.translations[$store.locale.current].student.view.joining_date">Date of Joining</span>
                        <span class="text-sm font-medium text-[#111418] dark:text-white mt-1">{{ $student->created_at->format('d M, Y') }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs font-semibold text-[#617589] uppercase tracking-wider" x-text="$store.locale.translations[$store.locale.current].student.view.roll_number">Roll Number</span>
                        <span class="text-sm font-medium text-[#111418] dark:text-white mt-1">{{ $student->student_id }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mx-0 lg:mx-4">
            <div class="flex flex-col gap-2 rounded-lg p-5 bg-white dark:bg-[#1a2632] border border-[#dbe0e6] dark:border-gray-700 shadow-sm relative overflow-hidden group">
                <div class="absolute right-[-10px] top-[-10px] opacity-5 group-hover:opacity-10 transition-opacity">
                    <span class="material-symbols-outlined text-[100px] text-primary">calendar_month</span>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-[#617589] text-sm font-medium uppercase tracking-wider" x-text="$store.locale.translations[$store.locale.current].student.view.attendance">Attendance</p>
                    <span class="bg-green-50 text-green-700 text-xs px-2 py-0.5 rounded flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">trending_up</span> +2%</span>
                </div>
                <p class="text-[#111418] dark:text-white text-3xl font-bold tracking-tight">92%</p>
                <div class="w-full bg-[#f0f2f4] rounded-full h-1.5 mt-2">
                    <div class="bg-primary h-1.5 rounded-full" style="width: 92%"></div>
                </div>
            </div>
            <div class="flex flex-col gap-2 rounded-lg p-5 bg-white dark:bg-[#1a2632] border border-[#dbe0e6] dark:border-gray-700 shadow-sm relative overflow-hidden group">
                <div class="absolute right-[-10px] top-[-10px] opacity-5 group-hover:opacity-10 transition-opacity">
                    <span class="material-symbols-outlined text-[100px] text-primary">school</span>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-[#617589] text-sm font-medium uppercase tracking-wider" x-text="$store.locale.translations[$store.locale.current].student.view.gpa">GPA</p>
                    <span class="bg-green-50 text-green-700 text-xs px-2 py-0.5 rounded flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">trending_up</span> +0.1</span>
                </div>
                <p class="text-[#111418] dark:text-white text-3xl font-bold tracking-tight">3.8</p>
                <p class="text-xs text-[#617589] mt-2">Last exam: Mid-Term Finals</p>
            </div>
            <div class="flex flex-col gap-2 rounded-lg p-5 bg-white dark:bg-[#1a2632] border border-[#dbe0e6] dark:border-gray-700 shadow-sm relative overflow-hidden group">
                <div class="absolute right-[-10px] top-[-10px] opacity-5 group-hover:opacity-10 transition-opacity">
                    <span class="material-symbols-outlined text-[100px] text-primary">payments</span>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-[#617589] text-sm font-medium uppercase tracking-wider" x-text="$store.locale.translations[$store.locale.current].student.view.fees_due">Fees Due</p>
                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded" x-text="$store.locale.translations[$store.locale.current].student.view.up_to_date">Up to date</span>
                </div>
                <p class="text-[#111418] dark:text-white text-3xl font-bold tracking-tight">$0.00</p>
                <p class="text-xs text-[#617589] mt-2">Next payment due: 15 Oct</p>
            </div>
        </div>

        <!-- Details Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mx-0 lg:mx-4 pb-10">
            <!-- Left Column: Personal Info -->
            <div class="flex flex-col gap-6 lg:col-span-1">
                <!-- Personal Details Card -->
                <div class="bg-white dark:bg-[#1a2632] rounded-lg border border-[#dbe0e6] dark:border-gray-700 shadow-sm flex flex-col">
                    <div class="px-5 py-4 border-b border-[#f0f2f4] dark:border-gray-700 flex justify-between items-center bg-gray-50/50 dark:bg-gray-800/50 rounded-t-lg">
                        <h3 class="text-base font-bold text-[#111418] dark:text-white" x-text="$store.locale.translations[$store.locale.current].student.view.personal_information">Personal Information</h3>
                        <a href="{{ route('students.edit', $student->student_id) }}" class="text-primary hover:bg-primary/10 p-1 rounded transition-colors"><span class="material-symbols-outlined text-[20px]">edit_square</span></a>
                    </div>
                    <div class="p-5 flex flex-col gap-4">
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-[#617589]" x-text="$store.locale.translations[$store.locale.current].student.view.date_of_birth">Date of Birth</span>
                            <p class="text-sm font-medium dark:text-white">{{ $student->date_of_birth ? \Carbon\Carbon::parse($student->date_of_birth)->format('d M, Y') : 'N/A' }} ({{ $student->date_of_birth ? \Carbon\Carbon::parse($student->date_of_birth)->age : '?' }} <span x-text="$store.locale.translations[$store.locale.current].student.view.years">Years</span>)</p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-[#617589]" x-text="$store.locale.translations[$store.locale.current].student.view.gender">Gender</span>
                            <p class="text-sm font-medium dark:text-white" x-text="$store.locale.current === 'kh' ? ({{ json_encode($student->gender) }} === 'Male' ? '{{ trans('student/view.male', [], 'kh') }}' : '{{ trans('student/view.female', [], 'kh') }}') : {{ json_encode($student->gender) }}">{{ $student->gender }}</p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-[#617589]" x-text="$store.locale.translations[$store.locale.current].student.view.blood_group">Blood Group</span>
                            <p class="text-sm font-medium dark:text-white">O+</p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-[#617589]" x-text="$store.locale.translations[$store.locale.current].student.view.contact_number">Contact Number</span>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px] text-[#617589]">call</span>
                                <p class="text-sm font-medium dark:text-white">{{ $student->phone ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-[#617589]" x-text="$store.locale.translations[$store.locale.current].student.view.email_address">Email Address</span>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px] text-[#617589]">mail</span>
                                <p class="text-sm font-medium dark:text-white">{{ $student->email ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-[#617589]" x-text="$store.locale.translations[$store.locale.current].student.view.current_address">Current Address</span>
                            <div class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-[16px] text-[#617589] mt-0.5">location_on</span>
                                <p class="text-sm font-medium dark:text-white">{{ $student->address ?? 'No address provided.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Parent Details Card -->
                <div class="bg-white dark:bg-[#1a2632] rounded-lg border border-[#dbe0e6] dark:border-gray-700 shadow-sm flex flex-col">
                    <div class="px-5 py-4 border-b border-[#f0f2f4] dark:border-gray-700 flex justify-between items-center bg-gray-50/50 dark:bg-gray-800/50 rounded-t-lg">
                        <h3 class="text-base font-bold text-[#111418] dark:text-white" x-text="$store.locale.translations[$store.locale.current].student.view.parent_guardian">Parent / Guardian</h3>
                    </div>
                    <div class="p-5 flex flex-col gap-4">
                        <div class="flex items-start gap-3">
                            <div class="bg-gray-100 rounded-full p-2 text-gray-500">
                                <span class="material-symbols-outlined text-[20px]">person</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold dark:text-white">Michael Doe</span>
                                <span class="text-xs text-[#617589]">Father</span>
                                <span class="text-xs text-primary mt-1">+1 (555) 987-6543</span>
                            </div>
                        </div>
                        <hr class="border-[#f0f2f4] dark:border-gray-700"/>
                        <div class="flex items-start gap-3">
                            <div class="bg-gray-100 rounded-full p-2 text-gray-500">
                                <span class="material-symbols-outlined text-[20px]">person_3</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold dark:text-white">Sarah Doe</span>
                                <span class="text-xs text-[#617589]">Mother</span>
                                <span class="text-xs text-primary mt-1">+1 (555) 876-5432</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Column: Academic & other info -->
            <div class="flex flex-col gap-6 lg:col-span-2">
                <!-- Academic Overview Card -->
                <div class="bg-white dark:bg-[#1a2632] rounded-lg border border-[#dbe0e6] dark:border-gray-700 shadow-sm">
                    <div class="px-5 py-4 border-b border-[#f0f2f4] dark:border-gray-700 flex justify-between items-center bg-gray-50/50 dark:bg-gray-800/50 rounded-t-lg">
                        <h3 class="text-base font-bold text-[#111418] dark:text-white" x-text="$store.locale.translations[$store.locale.current].student.view.academic_perf">Academic Performance</h3>
                        <a class="text-xs font-bold text-primary hover:underline" href="#">View Full Report</a>
                    </div>
                    <div class="p-0 overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <thead class="bg-gray-50 dark:bg-gray-800 text-[#617589]">
                                <tr>
                                    <th class="px-5 py-3 font-medium" x-text="$store.locale.translations[$store.locale.current].student.view.subject">Subject</th>
                                    <th class="px-5 py-3 font-medium">Teacher</th>
                                    <th class="px-5 py-3 font-medium text-center" x-text="$store.locale.translations[$store.locale.current].student.view.score">Score</th>
                                    <th class="px-5 py-3 font-medium text-center" x-text="$store.locale.translations[$store.locale.current].student.view.grade">Grade</th>
                                    <th class="px-5 py-3 font-medium text-center" x-text="$store.locale.translations[$store.locale.current].student.view.remarks">Remarks</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#f0f2f4] dark:divide-gray-700">
                                <tr>
                                    <td class="px-5 py-3 font-medium dark:text-white">Mathematics</td>
                                    <td class="px-5 py-3 text-[#617589]">Mr. Anderson</td>
                                    <td class="px-5 py-3 text-center dark:text-white">95/100</td>
                                    <td class="px-5 py-3 text-center"><span class="bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs font-bold">A+</span></td>
                                    <td class="px-5 py-3 text-center text-[#617589]">Excellent</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3 font-medium dark:text-white">Physics</td>
                                    <td class="px-5 py-3 text-[#617589]">Mrs. Curie</td>
                                    <td class="px-5 py-3 text-center dark:text-white">88/100</td>
                                    <td class="px-5 py-3 text-center"><span class="bg-green-50 text-green-600 px-2 py-0.5 rounded text-xs font-bold">A</span></td>
                                    <td class="px-5 py-3 text-center text-[#617589]">Good</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3 font-medium dark:text-white">English Literature</td>
                                    <td class="px-5 py-3 text-[#617589]">Ms. Austen</td>
                                    <td class="px-5 py-3 text-center dark:text-white">92/100</td>
                                    <td class="px-5 py-3 text-center"><span class="bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs font-bold">A+</span></td>
                                    <td class="px-5 py-3 text-center text-[#617589]">Very creative</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3 font-medium dark:text-white">History</td>
                                    <td class="px-5 py-3 text-[#617589]">Mr. Howard</td>
                                    <td class="px-5 py-3 text-center dark:text-white">78/100</td>
                                    <td class="px-5 py-3 text-center"><span class="bg-yellow-50 text-yellow-600 px-2 py-0.5 rounded text-xs font-bold">B+</span></td>
                                    <td class="px-5 py-3 text-center text-[#617589]">Can improve</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Two Column Row inside Right Column -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Fee Status Card -->
                    <div class="bg-white dark:bg-[#1a2632] rounded-lg border border-[#dbe0e6] dark:border-gray-700 shadow-sm">
                        <div class="px-5 py-4 border-b border-[#f0f2f4] dark:border-gray-700 flex justify-between items-center bg-gray-50/50 dark:bg-gray-800/50 rounded-t-lg">
                            <h3 class="text-base font-bold text-[#111418] dark:text-white" x-text="$store.locale.translations[$store.locale.current].student.view.fee_status">Fee Status</h3>
                            <button class="text-primary text-xs font-bold bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded transition-colors">History</button>
                        </div>
                        <div class="p-5 flex flex-col gap-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-[#617589]">Total Fees (Yearly)</span>
                                <span class="text-sm font-bold dark:text-white">$12,000</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-[#617589]">Paid Amount</span>
                                <span class="text-sm font-bold text-green-600">$12,000</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-[#617589]">Pending</span>
                                <span class="text-sm font-bold text-[#111418] dark:text-white">$0.00</span>
                            </div>
                            <div class="mt-2 bg-green-50 border border-green-100 p-3 rounded-lg flex items-center gap-2">
                                <span class="material-symbols-outlined text-green-600 text-[20px]">check_circle</span>
                                <p class="text-xs text-green-800 font-medium">All fees are cleared for this academic year.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Timeline / Notes Widget -->
                    <div class="bg-white dark:bg-[#1a2632] rounded-lg border border-[#dbe0e6] dark:border-gray-700 shadow-sm">
                        <div class="px-5 py-4 border-b border-[#f0f2f4] dark:border-gray-700 flex justify-between items-center bg-gray-50/50 dark:bg-gray-800/50 rounded-t-lg">
                            <h3 class="text-base font-bold text-[#111418] dark:text-white" x-text="$store.locale.translations[$store.locale.current].student.view.recent_activity">Recent Activity</h3>
                            <button class="text-[#617589] hover:text-primary"><span class="material-symbols-outlined text-[20px]">add_circle</span></button>
                        </div>
                        <div class="p-5">
                            <ol class="relative border-l border-gray-200 dark:border-gray-700 ml-1.5">
                                <li class="mb-6 ml-4">
                                    <div class="absolute w-3 h-3 bg-primary rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900"></div>
                                    <time class="mb-1 text-xs font-normal text-gray-400 dark:text-gray-500">Today</time>
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Library Book Returned</h3>
                                    <p class="text-xs font-normal text-gray-500 dark:text-gray-400">Returned "Intro to Physics"</p>
                                </li>
                                <li class="mb-6 ml-4">
                                    <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900"></div>
                                    <time class="mb-1 text-xs font-normal text-gray-400 dark:text-gray-500">2 days ago</time>
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Absent (Medical)</h3>
                                    <p class="text-xs font-normal text-gray-500 dark:text-gray-400">Excused absence note received.</p>
                                </li>
                                <li class="ml-4">
                                    <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900"></div>
                                    <time class="mb-1 text-xs font-normal text-gray-400 dark:text-gray-500">1 week ago</time>
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Fee Payment</h3>
                                    <p class="text-xs font-normal text-gray-500 dark:text-gray-400">Q4 Tuition Fee paid via Portal.</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection