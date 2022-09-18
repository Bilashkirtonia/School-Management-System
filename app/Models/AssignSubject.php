<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    public function subject_name(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function student_class(){
        return $this->belongsTo(studentClass::class,'class_id','id');
    }
}
