<?php

namespace App\services;

use App\Models\Teacher;

class TeacherService
{
    public function index(){
        $teachers = Teacher::with('user')->get();
        return $teachers;
    }
    
    public function getAllCourses(Teacher $teacher){
        $teacher->load('courses');
    }

    public function attachTeacherWithStudent(array $data , Teacher $teacher){
        $teacher->students()->attach($data['student_ids']);
    }
}
