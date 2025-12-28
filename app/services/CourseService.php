<?php

namespace App\services;

use App\Models\Course;
use App\Models\Teacher;

class CourseService
{
    public function show(Course $course)
    {
        $course->load('students.user');
    }

    public function SyncWithStudents(array $data, Course $course)
    {
        $course->students()->sync($data['student_ids']);
    }

    public function store(array $data , Teacher $teacher)
    {
        $teacher->courses()->createMany($data);
    } 
}
