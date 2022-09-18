<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccountFee extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'student_id','id');
    }
    public function student_class(){
        return $this->belongsTo(studentClass::class,'class_id','id');
    }
    public function year(){
        return $this->belongsTo(Year::class,'year_id','id');
    }
    public function discount(){
        return $this->belongsTo(Discount_student::class,'id','assing_student_id');
    }
    public function fee_category(){
        return $this->belongsTo(fee_category::class,'fee_type_id','id');
    }
    public function fee(){
        return $this->belongsTo(feeType::class,'fee_category_id','id');
    }
}
