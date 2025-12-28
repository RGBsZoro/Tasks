<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(protected StudentService $studentService){}
    
    public function index(){
        $students = $this->studentService->index();
        return response()->json($students);
    }
    
}
