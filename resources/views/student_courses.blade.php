@extends('layouts.app')

@section('content')
    <div class="mx-auto p-6 space-y-6">
        <form action="{{ route('students.assign.course.store', $student->studentID) }}" method="POST" class="flex flex-col gap-6 bg-white p-6 rounded-lg shadow-md border border-gray-300">
            @csrf

            <h3 class="text-xl font-semibold text-gray-800 mb-4">Assign a Course to {{ $student->name }}</h3>

            <div class="space-y-4">
                <div class="flex items-center space-x-4">
                    <label for="course_id" class="text-lg font-medium text-gray-700 w-1/4">Select Course</label>
                    <div class="w-3/4">
                        <select name="course_id" required class="w-full h-12 px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->courseID }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="h-12 px-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Assign Course
                    </button>
                </div>
            </div>
        </form>


        <table class="min-w-full text-left text-sm text-gray-500 bg-white rounded-xl shadow-md">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-lg font-medium text-gray-700">Course ID</th>
                    <th class="px-6 py-3 text-lg font-medium text-gray-700">Course Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach($studentCourses as $course)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $course->courseID }}</td>
                        <td class="px-6 py-4">{{ $course->title }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
