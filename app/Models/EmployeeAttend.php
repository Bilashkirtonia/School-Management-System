<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttend extends Model
{
    public function user1(){
        return $this->belongsTo(User::class,'employee_id','id');
    }
}
