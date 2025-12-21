<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalFile extends Model
{
    protected $fillable = [
        'student_id',
        'blood_type',
        'emergency_phone'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
