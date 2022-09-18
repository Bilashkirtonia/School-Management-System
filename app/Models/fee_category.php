<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fee_category extends Model
{
    public function fee_type(){
        return $this->belongsTo(feeType::class,'fee_type_id','id');
    }

    public function student_class(){
        return $this->belongsTo(studentClass::class,'class_id','id');
    }
}
