@extends('layouts.app')

@section('content')
    <div class="mx-auto p-6 space-y-6">
        <div class="bg-white shadow-md rounded-xl p-8 border border-gray-300">
            <h2 class="text-3xl font-semibold text-start text-gray-900 mb-6">Course Registration</h2>
            <form action="{{ route('courses.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-lg font-medium text-gray-700">Course Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="block w-full h-12 px-6 rounded-lg border border-gray-300 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        @error('title')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="credit" class="block text-lg font-medium text-gray-700">Credit</label>
                        <input type="number" name="credit" id="credit" value="{{ old('credit') }}"
                            class="block w-full h-12 px-6 rounded-lg border border-gray-300 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" min="1">
                        @error('credit')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="department_id" class="block text-lg font-medium text-gray-700">Department</label>
                        <select name="department_id" id="department_id"
                            class="block w-full h-12 px-4 rounded-lg border border-gray-300 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                            <option value="">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->departmentID }}" @selected(old('department_id') == $department->departmentID)>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="instructor_id" class="block text-lg font-medium text-gray-700">Instructor</label>
                        <select name="instructor_id" id="instructor_id"
                            class="block w-full h-12 px-4 rounded-lg border border-gray-300 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                            <option value="">Select Instructor</option>
                            @foreach ($instructors as $instructor)
                                <option value="{{ $instructor->instructorID }}" @selected(old('instructor_id') == $instructor->instructorID)>
                                    {{ $instructor->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('instructor_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full h-12 bg-blue-600 text-white text-lg font-semibold rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Register Course
                    </button>
                </div>
            </form>
        </div>

        <x-dynamic-table :columns="['courseID', 'title', 'credit', 'department', 'instructor']" :rows="$courses" />
    </div>
@endsection
