<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return response()->json($student);
    }

    // 3. Get Student with Medical File
    public function show(Student $student)
    {
        $student->load('medicalFile');
        return response()->json($student);
    }
}
