@extends('layouts.master')
@section('content')
    <div class="mx-auto max-w-7xl flex flex-col gap-6">
        <!-- Breadcrumbs -->
        <div class="flex flex-wrap gap-2 items-center text-sm">
            <a class="text-[#637588] hover:text-primary font-medium" href="#" x-text="$store.locale.translations[$store.locale.current].student.index.home">Home</a>
            <span class="text-[#637588] material-symbols-outlined text-sm">chevron_right</span>
            <span class="text-[#111418] dark:text-white font-medium" x-text="$store.locale.translations[$store.locale.current].menu.students">Students</span>
        </div>
        <!-- Page Heading & Actions -->
        <div class="flex flex-col sm:flex-row flex-wrap justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-[#111418] dark:text-white text-3xl font-bold tracking-tight" x-text="$store.locale.translations[$store.locale.current].student.index.title">Student List</h2>
                <p class="text-[#637588] mt-1 text-sm" x-text="$store.locale.translations[$store.locale.current].student.index.manage_subtitle">Manage student records, view details and class allocations.</p>
            </div>
            <a href="{{ route('students.create') }}"
                class="flex items-center justify-center gap-2 rounded-lg h-10 px-5 bg-primary text-white text-sm font-bold leading-normal hover:bg-blue-600 transition shadow-sm hover:shadow-md">
                <span class="material-symbols-outlined text-[20px]">add</span>
                <span x-text="$store.locale.translations[$store.locale.current].student.index.add_new">Add New Student</span>
            </a>
        </div>
        <!-- Filters and Search Area -->
        <div
            class="bg-white dark:bg-[#1a222c] p-4 rounded-xl border border-[#e5e7eb] dark:border-[#374151] shadow-sm flex flex-col md:flex-row gap-4 justify-between items-center">
            <!-- Search -->
            <div class="relative w-full md:w-96">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-[#637588]">
                    <span class="material-symbols-outlined">search</span>
                </div>
                <input
                    class="block w-full p-2.5 pl-10 text-sm text-[#111418] dark:text-white bg-[#f0f2f4] dark:bg-[#252f3a] border-none rounded-lg focus:ring-2 focus:ring-primary focus:bg-white transition-all placeholder:text-[#9ca3af]"
                    :placeholder="$store.locale.translations[$store.locale.current].student.index.search_placeholder" type="text" />
            </div>
            <!-- Dropdown Filters -->
            <div class="flex flex-wrap gap-3 w-full md:w-auto justify-end">
                <div class="relative">
                    <select
                        class="appearance-none bg-[#f0f2f4] dark:bg-[#252f3a] text-[#111418] dark:text-white h-10 pl-4 pr-10 rounded-lg text-sm font-medium border-none focus:ring-2 focus:ring-primary cursor-pointer">
                        <option x-text="$store.locale.translations[$store.locale.current].student.index.all_classes">All Classes</option>
                        <option>Class 10</option>
                        <option>Class 9</option>
                        <option>Class 8</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-[#637588]">
                        <span class="material-symbols-outlined text-sm">expand_more</span>
                    </div>
                </div>
                <div class="relative">
                    <select
                        class="appearance-none bg-[#f0f2f4] dark:bg-[#252f3a] text-[#111418] dark:text-white h-10 pl-4 pr-10 rounded-lg text-sm font-medium border-none focus:ring-2 focus:ring-primary cursor-pointer">
                        <option x-text="$store.locale.translations[$store.locale.current].student.index.all_sections">All Sections</option>
                        <option>Section A</option>
                        <option>Section B</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-[#637588]">
                        <span class="material-symbols-outlined text-sm">expand_more</span>
                    </div>
                </div>
                <button
                    class="flex items-center justify-center gap-2 h-10 px-4 bg-white dark:bg-[#1a222c] border border-[#e5e7eb] dark:border-[#374151] rounded-lg text-sm font-medium hover:bg-gray-50 dark:hover:bg-[#252f3a] text-[#637588] transition-colors">
                    <span class="material-symbols-outlined text-[20px]">filter_list</span>
                    <span x-text="$store.locale.translations[$store.locale.current].student.index.more_filters">More Filters</span>
                </button>
            </div>
        </div>
        <!-- Data Table Card -->
        <div
            class="bg-white dark:bg-[#1a222c] rounded-xl border border-[#e5e7eb] dark:border-[#374151] shadow-sm overflow-hidden flex flex-col">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-[#e5e7eb] dark:border-[#374151] bg-gray-50/50 dark:bg-[#202a36]">
                            <th class="px-3 py-2 text-xs font-semibold tracking-wide text-[#637588] uppercase w-12 text-center">
                                <input
                                    class="rounded border-gray-300 text-primary focus:ring-primary bg-white dark:bg-[#252f3a] dark:border-gray-600"
                                    type="checkbox" />
                            </th>
                            <th class="px-3 py-2 text-xs font-semibold tracking-wide text-[#637588] uppercase" x-text="$store.locale.translations[$store.locale.current].student.index.table_no">ID</th>
                            <th class="px-3 py-2 text-xs font-semibold tracking-wide text-[#637588] uppercase" x-text="$store.locale.translations[$store.locale.current].student.index.table_name">Student Name
                            </th>
                            <th class="px-3 py-2 text-xs font-semibold tracking-wide text-[#637588] uppercase" x-text="$store.locale.translations[$store.locale.current].student.index.table_class">Class</th>
                            <th class="px-3 py-2 text-xs font-semibold tracking-wide text-[#637588] uppercase" x-text="$store.locale.translations[$store.locale.current].student.index.table_nationality">nationality
                            </th>
                            <th class="px-3 py-2 text-xs font-semibold tracking-wide text-[#637588] uppercase" x-text="$store.locale.translations[$store.locale.current].student.index.table_phone">Phone</th>
                            <th class="px-3 py-2 text-xs font-semibold tracking-wide text-[#637588] uppercase" x-text="$store.locale.translations[$store.locale.current].student.index.status">Status</th>
                            <th class="px-3 py-2 text-xs font-semibold tracking-wide text-[#637588] uppercase text-right" x-text="$store.locale.translations[$store.locale.current].student.index.table_actions">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#e5e7eb] dark:divide-[#374151]">
                        @forelse ($students as $student)
                            <tr class="group hover:bg-blue-50/50 dark:hover:bg-[#1e2832] transition-colors">
                                <td class="px-3 py-2 text-center">
                                    <input
                                        class="rounded border-gray-300 text-primary focus:ring-primary bg-white dark:bg-[#252f3a] dark:border-gray-600"
                                        type="checkbox" value="{{ $student->student_id }}" />
                                </td>
                                <td class="px-3 py-2 text-sm font-medium text-[#111418] dark:text-white">
                                    {{ $student->student_code }}</td>
                                <td class="px-3 py-2">
                                    <div class="flex items-center gap-3">
                                        <div class="size-8 rounded-full bg-cover bg-center border border-gray-200 dark:border-gray-600"
                                            data-alt="{{ $student->full_name }}"
                                            style='background-image: url("{{ $student->photo ? asset($student->photo) : "https://ui-avatars.com/api/?name=" . urlencode($student->full_name) . "&background=random" }}");'>
                                        </div>
                                        <div class="flex flex-col">
                                            <span
                                                class="text-sm font-bold text-[#111418] dark:text-white group-hover:text-primary transition-colors">{{ $student->full_name }}</span>
                                            <span class="text-xs text-[#637588]">{{ $student->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-2 text-sm text-[#637588] dark:text-gray-300"><span
                                        class="bg-gray-100 dark:bg-[#252f3a] px-2 py-1 rounded text-xs font-semibold">N/A</span>
                                </td>
                                <td class="px-3 py-2 text-sm text-[#637588] dark:text-gray-300">{{ $student->nationality }}
                                </td>
                                <td class="px-3 py-2 text-sm text-[#637588] dark:text-gray-300">{{ $student->phone }}</td>
                                <td class="px-3 py-2">
                                    @php
                                        $statusClasses = match ($student->status) {
                                            'Active' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                                            'Inactive' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                                            'Graduated' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                            'Suspended' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400',
                                            default => 'bg-gray-100 text-gray-700 dark:bg-gray-900/30 dark:text-gray-400',
                                        };
                                        $statusDot = match ($student->status) {
                                            'Active' => 'bg-green-500',
                                            'Inactive' => 'bg-red-500',
                                            'Graduated' => 'bg-blue-500',
                                            'Suspended' => 'bg-yellow-500',
                                            default => 'bg-gray-500',
                                        };
                                    @endphp
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium {{ $statusClasses }}">
                                        <span class="size-1.5 rounded-full {{ $statusDot }}"></span>
                                        <span x-text="$store.locale.translations[$store.locale.current].student.index['status_{{ Str::lower($student->status) }}'] || '{{ $student->status }}'">{{ $student->status }}</span>
                                    </span>
                                </td>
                                <td class="px-3 py-2 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('students.view', $student->student_id) }}"
                                            class="size-8 flex items-center justify-center rounded-lg text-[#637588] hover:bg-gray-100 dark:hover:bg-[#252f3a] hover:text-primary transition-colors"
                                            title="View Details">
                                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                                    </a>
                                        <a href="{{ route('students.edit', $student->student_id) }}"
                                            class="size-8 flex items-center justify-center rounded-lg text-[#637588] hover:bg-gray-100 dark:hover:bg-[#252f3a] hover:text-blue-600 transition-colors"
                                            title="Edit">
                                            <span class="material-symbols-outlined text-[18px]">edit</span>
                                        </a>
                                        <form id="delete-student-{{ $student->student_id }}" action="{{ route('students.destroy', $student->student_id) }}" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button"
                                            @click="$dispatch('open-confirm-modal', { 
                                                type: 'delete',
                                                message: 'Are you sure you want to delete {{ $student->full_name }}?', 
                                                formId: 'delete-student-{{ $student->student_id }}' 
                                            })"
                                            class="size-8 flex items-center justify-center rounded-lg text-[#637588] hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-600 transition-colors"
                                            title="Delete">
                                            <span class="material-symbols-outlined text-[18px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-8">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="bg-gray-100 dark:bg-[#252f3a] p-4 rounded-full mb-3">
                                            <span class="material-symbols-outlined text-gray-400 text-3xl">inbox</span>
                                        </div>
                                        <p class="text-[#637588] dark:text-gray-400 text-sm font-medium" 
                                           x-text="$store.locale.translations[$store.locale.current].student.index.no_data">
                                            No data available
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div
                class="px-4 py-3 border-t border-[#e5e7eb] dark:border-[#374151] flex flex-col sm:flex-row justify-between items-center gap-4 bg-white dark:bg-[#1a222c]">
                <p class="text-sm text-[#637588]">
                    <span x-text="$store.locale.translations[$store.locale.current].student.index.showing">Showing</span> 
                    <span class="font-medium text-[#111418] dark:text-white">{{ $students->firstItem() }}</span> 
                    <span x-text="$store.locale.translations[$store.locale.current].student.index.to">to</span> 
                    <span class="font-medium text-[#111418] dark:text-white">{{ $students->lastItem() }}</span> 
                    <span x-text="$store.locale.translations[$store.locale.current].student.index.of">of</span> 
                    <span class="font-medium text-[#111418] dark:text-white">{{ $students->total() }}</span> 
                    <span x-text="$store.locale.translations[$store.locale.current].student.index.students">students</span>
                </p>
                {{ $students->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
