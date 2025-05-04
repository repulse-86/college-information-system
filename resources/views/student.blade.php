@extends('layouts.app')

@section('content')
    <div class="mx-auto p-6 space-y-6">
        <div class="bg-white shadow-md rounded-xl p-8 border border-gray-300">
            <h2 class="text-3xl font-semibold text-start text-gray-900 mb-6">Student Registration</h2>
            <form action="{{ route('students.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-lg font-medium text-gray-700">Student Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="block w-full h-12 px-6 rounded-lg border border-gray-300 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        @error('name')
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
                        <label for="course_id" class="block text-lg font-medium text-gray-700">Course</label>
                        <select name="course_id" id="course_id"
                            class="block w-full h-12 px-4 rounded-lg border border-gray-300 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                            <option value="">Select Course</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->courseID }}" @selected(old('course_id') == $course->courseID)>
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full h-12 bg-blue-600 text-white text-lg font-semibold rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Register Student
                    </button>
                </div>
            </form>
        </div>

        <x-dynamic-table :columns="['studentID','name', 'department', 'course']" :rows="$students" />
    </div>
@endsection
