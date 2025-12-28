<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        $course->load('students.user');
        return response()->json($course);

    }

    public function SyncWithStudents(Request $request, Course $course)
    {
        $course->students()->sync($request->student_ids);
        return response()->json(['message' => 'Students synced with course successfully.'], 200);
    }

    public function store(Request $request , Teacher $teacher)
    {
        $teacher->courses()->createMany($request->all());
        return response()->json(['message' => 'Courses created successfully.'], 201);
    } 
}
