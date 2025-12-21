<?php

namespace App\Http\Controllers;

use App\Models\MedicalFile;
use App\Models\Student;
use Illuminate\Http\Request;

class MedicalFileController extends Controller
{
    public function store(Request $request)
    {
        $student = Student::findOrFail($request->student_id);

        if ($student->medicalFile){
            return response()->json([
                'message' => 'This student already has a medical file'
            ], 400);
        }

        $medicalFile = MedicalFile::create($request->all());
        return response()->json($medicalFile);
    }

    public function getByStudent(Student $student)
    {
        $medicalFile = $student->medicalFile;
        return response()->json($medicalFile);
    }

    public function update(Request $request, MedicalFile $medicalFile)
    {
        $medicalFile->update(
            $request->only(['blood_type', 'emergency_phone'])
        );

        return response()->json($medicalFile);
    }
}

