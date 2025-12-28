<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\services\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct(protected TeacherService $teacherService){}
    public function index(){
        $teachers = $this->teacherService->index();
        return response()->json($teachers);
    }
    
    public function getAllCourses(Teacher $teacher){
        $this->teacherService->getAllCourses($teacher);
        return response()->json($teacher->courses);
    }

    public function attachTeacherWithStudent(Request $request , Teacher $teacher){
        $this->teacherService->attachTeacherWithStudent($request->all() , $teacher);
        return response()->json(['message' => 'Student attached to teacher successfully.'], 200);
    }
}
