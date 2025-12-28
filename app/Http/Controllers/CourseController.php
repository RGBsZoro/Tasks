<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct(protected CourseService $courseService){}
    public function show(Course $course)
    {
        $this->courseService->show($course);
        return response()->json($course);

    }

    public function SyncWithStudents(Request $request, Course $course)
    {
        $this->courseService->SyncWithStudents($request->all() , $course);
        return response()->json(['message' => 'Students synced with course successfully.'], 200);
    }

    public function store(Request $request , Teacher $teacher)
    {
        $this->courseService->store($request->all() , $teacher);
        return response()->json(['message' => 'Courses created successfully.'], 201);
    } 
}
