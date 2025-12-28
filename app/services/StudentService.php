<?php

namespace App\services;

use App\Models\Student;

class StudentService
{
    public function index(){
        $students = Student::with('user')->get();
        return $students;
    }
}
