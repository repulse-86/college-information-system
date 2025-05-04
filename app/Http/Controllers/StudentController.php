<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::with('department')->get();

        return view('student', [
            'courses' => Course::all(),
            'departments' => Department::all(),
            'students' => $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        Student::create($request->validated());

        return redirect()->route('students.index');
    }

    public function assignWithCourse(string $studentID): View
    {
        $student = Student::findOrFail($studentID);
        $studentCourses = $student->courses;
        $courses = Course::all();

        return view('student_courses', compact('courses', 'student', 'studentCourses'));
    }

    public function assignWithCourseStore(Request $request, string $studentID): RedirectResponse
    {
        $student = Student::findOrFail($studentID);

        $request->validate([
            'course_id' => 'required|exists:courses,courseID',
        ]);

        $student->courses()->attach($request->course_id);

        return redirect()->route('students.assign.course', $student->studentID);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
