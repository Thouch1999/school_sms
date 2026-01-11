@extends('layouts.master')
@section('content')
    <div class="flex-1 overflow-y-auto w-full">
        <!-- Breadcrumbs -->
        <div class="flex flex-wrap gap-2 items-center text-sm mb-6">
            <a class="text-[#637588] hover:text-primary font-medium" href="{{ route('dashboard') }}" x-text="$store.locale.translations[$store.locale.current].menu.dashboard ?? 'Home'">Home</a>
            <span class="text-[#637588] material-symbols-outlined text-sm">chevron_right</span>
            <a class="text-[#637588] hover:text-primary font-medium" href="{{ route('students') }}" x-text="$store.locale.translations[$store.locale.current].menu.students ?? 'Students'">Students</a>
            <span class="text-[#637588] material-symbols-outlined text-sm">chevron_right</span>
            <span class="text-[#111418] dark:text-white font-medium" x-text="$store.locale.translations[$store.locale.current].student.create.breadcrumbs_create">Create</span>
        </div>
        <div class="mx-auto max-w-7xl flex flex-col gap-6">
            <div class="flex flex-col gap-2">
                <h1 class="text-[#111813] dark:text-white text-3xl font-black tracking-tight font-display" x-text="$store.locale.translations[$store.locale.current].student.create.create_student_profile">Create
                    Student Profile</h1>
                <p class="text-[#61896f] dark:text-gray-400 text-base" x-text="$store.locale.translations[$store.locale.current].student.create.form_subtitle">Enter the student's details below to manage their
                    academic record.</p>
            </div>
            <div
                class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-sm border border-[#f0f4f2] dark:border-gray-800 p-6 md:p-8">
                <form action="{{ route('students.store') }}" class="space-y-10" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div
                        class="flex flex-col md:flex-row gap-6 items-start md:items-center p-4 rounded-lg bg-background-light dark:bg-background-dark/50 border border-dashed border-gray-300 dark:border-gray-700">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-24 md:size-32 shadow-inner bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-400"
                            id="photo-preview" data-alt="Silhouette of a student placeholder"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDILgpg3LeedcvbXzn9-uhULsAG4rVJU0bplkylVUPiVNBe5q54ARXbFyoQ4931Gn40HEROd43duvxSDjgEN02RqYgNTha5SgtmK1FPHcei3aHm938P5aqTQrA6iCqwgGnT8FRCqMEQkVX42xXMrf6HdTWUqJAiAZ6CT4DpGOfYy2mHCjOoA9CF8Lv-ucYuC_byYiNrQDcGIV6IoDQdeBFH3kdJuxPI3N7DFOjhzmXgho0oJA9l9LnUYIpX2k16qJurASaOQdnvWtPi");'>
                        </div>
                        <div class="flex flex-col gap-3 flex-1">
                            <h3 class="text-[#111813] dark:text-white text-lg font-bold" x-text="$store.locale.translations[$store.locale.current].student.create.profile_photo">Profile Photo</h3>
                            <p class="text-[#61896f] dark:text-gray-400 text-sm" x-text="$store.locale.translations[$store.locale.current].student.create.upload_photo_desc">Upload a clear photo for the student
                                profile. Max size 2MB. JPG or PNG only.</p>
                            <div class="flex gap-3">
                                <label
                                    class="cursor-pointer inline-flex items-center justify-center px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary">
                                    <span class="material-symbols-outlined text-[18px] mr-2">upload</span>
                                    <span x-text="$store.locale.translations[$store.locale.current].student.create.upload_button">Upload Photo</span>
                                    <input type="file" name="photo" class="hidden" accept="image/*"
                                        onchange="document.getElementById('photo-preview').style.backgroundImage = 'url(' + window.URL.createObjectURL(this.files[0]) + ')'">
                                </label>
                            </div>
                            @error('photo')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="flex items-center gap-2 border-b border-gray-100 dark:border-gray-700 pb-2">
                            <span class="material-symbols-outlined text-primary">person</span>
                            <h2 class="text-xl font-bold text-[#111813] dark:text-white" x-text="$store.locale.translations[$store.locale.current].student.create.personal_info">Personal Information</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-sm font-semibold text-[#111813] dark:text-gray-300"
                                    for="student_code"><span x-text="$store.locale.translations[$store.locale.current].student.create.student_code">Student Code</span> <span class="text-red-500">*</span></label>
                                <input
                                    class="block w-full border rounded-lg border-gray-200 bg-gray-100 dark:bg-gray-800 text-[#111813] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#10B981] focus:border-[#10B981] placeholder-gray-400 text-sm py-2.5 cursor-not-allowed"
                                    id="student_code" name="student_code" :placeholder="$store.locale.translations[$store.locale.current].student.create.placeholder_student_code" required=""
                                    type="text" value="{{ old('student_code', $generatedCode ?? '') }}" readonly />
                                @error('student_code')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-sm font-semibold text-[#111813] dark:text-gray-300" for="status">
                                    <span x-text="$store.locale.translations[$store.locale.current].student.create.status">Status</span>
                                    <span class="text-red-500">*</span></label>
                                <select
                                    class="block w-full border rounded-lg border-gray-200 bg-background-light dark:bg-background-dark/30 dark:border-gray-700 text-[#111813] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#10B981] focus:border-[#10B981] placeholder-gray-400 text-sm py-2.5"
                                    id="status" name="status" required="">
                                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }} x-text="$store.locale.translations[$store.locale.current].student.create.status_active">Active</option>
                                    <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }} x-text="$store.locale.translations[$store.locale.current].student.create.status_inactive">Inactive</option>
                                    <option value="Graduated" {{ old('status') == 'Graduated' ? 'selected' : '' }} x-text="$store.locale.translations[$store.locale.current].student.create.status_graduated">Graduated</option>
                                    <option value="Suspended" {{ old('status') == 'Suspended' ? 'selected' : '' }} x-text="$store.locale.translations[$store.locale.current].student.create.status_suspended">Suspended</option>
                                </select>
                                @error('status')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-sm font-semibold text-[#111813] dark:text-gray-300"
                                    for="nationality" x-text="$store.locale.translations[$store.locale.current].student.create.nationality">Nationality</label>
                                <input
                                    class="block w-full border rounded-lg border-gray-200 bg-background-light dark:bg-background-dark/30 dark:border-gray-700 text-[#111813] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#10B981] focus:border-[#10B981] placeholder-gray-400 text-sm py-2.5"
                                    id="nationality" name="nationality" :placeholder="$store.locale.translations[$store.locale.current].student.create.placeholder_nationality" type="text"
                                    value="{{ old('nationality') }}" />
                                @error('nationality')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-1.5 md:col-span-2">
                                <label class="text-sm font-semibold text-[#111813] dark:text-gray-300" for="full_name">
                                    <span x-text="$store.locale.translations[$store.locale.current].student.create.full_name">Full Name</span> <span class="text-red-500">*</span></label>
                                <input
                                    class="block w-full border rounded-lg border-gray-200 bg-background-light dark:bg-background-dark/30 dark:border-gray-700 text-[#111813] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#10B981] focus:border-[#10B981] placeholder-gray-400 text-sm py-2.5"
                                    id="full_name" name="full_name" :placeholder="$store.locale.translations[$store.locale.current].student.create.placeholder_fullname" required=""
                                    type="text" value="{{ old('full_name') }}" />
                                @error('full_name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-sm font-semibold text-[#111813] dark:text-gray-300" for="gender">
                                    <span x-text="$store.locale.translations[$store.locale.current].student.create.gender">Gender</span>
                                    <span class="text-red-500">*</span></label>
                                <select
                                    class="block w-full border rounded-lg border-gray-200 bg-background-light dark:bg-background-dark/30 dark:border-gray-700 text-[#111813] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#10B981] focus:border-[#10B981] placeholder-gray-400 text-sm py-2.5"
                                    id="gender" name="gender" required="">
                                    <option value="" x-text="$store.locale.translations[$store.locale.current].student.create.select_gender">Select Gender</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }} x-text="$store.locale.translations[$store.locale.current].student.create.gender_male">Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }} x-text="$store.locale.translations[$store.locale.current].student.create.gender_female">Female</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }} x-text="$store.locale.translations[$store.locale.current].student.create.gender_other">Other</option>
                                </select>
                                @error('gender')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-sm font-semibold text-[#111813] dark:text-gray-300"
                                    for="date_of_birth"><span x-text="$store.locale.translations[$store.locale.current].student.create.date_of_birth">Date of Birth</span> <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input
                                        class="block w-full border rounded-lg border-gray-200 bg-background-light dark:bg-background-dark/30 dark:border-gray-700 text-[#111813] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#10B981] focus:border-[#10B981] placeholder-gray-400 text-sm py-2.5"
                                        id="date_of_birth" name="date_of_birth" required="" type="date"
                                        value="{{ old('date_of_birth') }}" />
                                </div>
                                @error('date_of_birth')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="flex items-center gap-2 border-b border-gray-100 dark:border-gray-700 pb-2">
                            <span class="material-symbols-outlined text-primary">contacts</span>
                            <h2 class="text-xl font-bold text-[#111813] dark:text-white" x-text="$store.locale.translations[$store.locale.current].student.create.contact_info">Contact Information</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-sm font-semibold text-[#111813] dark:text-gray-300"
                                    for="email" x-text="$store.locale.translations[$store.locale.current].student.create.email_address">Email Address</label>
                                <input
                                    class="block w-full border rounded-lg border-gray-200 bg-background-light dark:bg-background-dark/30 dark:border-gray-700 text-[#111813] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#10B981] focus:border-[#10B981] placeholder-gray-400 text-sm py-2.5"
                                    id="email" name="email" :placeholder="$store.locale.translations[$store.locale.current].student.create.placeholder_email" type="email"
                                    value="{{ old('email') }}" />
                                @error('email')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-sm font-semibold text-[#111813] dark:text-gray-300"
                                    for="phone" x-text="$store.locale.translations[$store.locale.current].student.create.phone_number">Phone Number</label>
                                <input
                                    class="block w-full border rounded-lg border-gray-200 bg-background-light dark:bg-background-dark/30 dark:border-gray-700 text-[#111813] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#10B981] focus:border-[#10B981] placeholder-gray-400 text-sm py-2.5"
                                    id="phone" name="phone" :placeholder="$store.locale.translations[$store.locale.current].student.create.placeholder_phone" type="tel"
                                    value="{{ old('phone') }}" />
                                @error('phone')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-1.5 md:col-span-2">
                                <label class="text-sm font-semibold text-[#111813] dark:text-gray-300" for="address" x-text="$store.locale.translations[$store.locale.current].student.create.home_address">Home
                                    Address</label>
                                <textarea
                                    class="block w-full border rounded-lg border-gray-200 bg-background-light dark:bg-background-dark/30 dark:border-gray-700 text-[#111813] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#10B981] focus:border-[#10B981] placeholder-gray-400 text-sm py-2.5"
                                    id="address" name="address" :placeholder="$store.locale.translations[$store.locale.current].student.create.placeholder_address" rows="3">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    <div
                        class="sticky bottom-0 -mx-6 -mb-6 md:-mx-8 md:-mb-8 p-4 md:p-6 bg-surface-light dark:bg-surface-dark border-t border-gray-100 dark:border-gray-800 flex flex-col-reverse sm:flex-row justify-end gap-3 z-0 rounded-b-xl">
                        <button
                            class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-bold rounded-lg text-gray-700 dark:text-gray-200 bg-white dark:bg-transparent hover:bg-gray-50 dark:hover:bg-white/5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                            type="button">
                            <span x-text="$store.locale.translations[$store.locale.current].student.create.cancel">Cancel</span>
                        </button>
                        <button
                            class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-transparent text-sm font-bold rounded-lg shadow-sm text-white bg-primary hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors"
                            type="submit">
                            <span class="material-symbols-outlined text-[20px] mr-2">save</span>
                            <span x-text="$store.locale.translations[$store.locale.current].student.create.save_student">Save Student</span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="h-8"></div>
        </div>
    </div>
@endsection
