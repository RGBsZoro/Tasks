<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::with('user')->get();
        return response()->json($teachers);
    }
    
    public function getAllCourses(Teacher $teacher){
        $teacher->load('courses');
        return response()->json($teacher->courses);
    }

    public function attachTeacherWithStudent(Request $request , Teacher $teacher){
        $teacher->students()->attach($request->student_ids);
        return response()->json(['message' => 'Student attached to teacher successfully.'], 200);
    }
}
