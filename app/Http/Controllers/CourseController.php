<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Instructor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $courses = Course::with(['department', 'instructor'])->get();

        $coursesMapped = $courses->map(function ($course) {
            return [
                'courseID' => $course->courseID,
                'title' => $course->title,
                'credit' => $course->credit,
                'department' => $course->department->name ?? 'N/A',
                'instructor' => $course->instructor->name ?? 'N/A',
            ];
        })->toArray();

        return view('course', [
            'courses' => $coursesMapped,
            'departments' => Department::all(),
            'instructors' => Instructor::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request): RedirectResponse
    {
        Course::create($request->validated());

        return redirect()->route('courses.index');
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
