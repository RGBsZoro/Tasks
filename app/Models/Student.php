<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['birth_date' , 'user_id'];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'student_teacher');
    }
    
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
