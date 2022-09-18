<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,'student_id','id');
    }
    public function exam(){
        return $this->belongsTo(Exam::class,'exam_type_id','id');
    }
    public function student_class(){
        return $this->belongsTo(studentClass::class,'class_id','id');
    }
    public function year(){
        return $this->belongsTo(Year::class,'year_id','id');
    }
    public function assing_subject(){
        return $this->belongsTo(AssignSubject::class,'assing_subject_id','id');
    }
}
