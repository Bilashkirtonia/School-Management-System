<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Year;
use App\Models\Shift;
use App\Models\Group;
use App\Models\studentClass;
use App\Models\Discount_student;
use App\Models\User;
use App\Models\AssingStudent;
use App\Models\feeType;
use App\Models\Exam;
use App\Models\AssignSubject;


class DefaultController extends Controller
{
    public function get_student(Request $request){
        $class_id = $request->class_id;
        $year_id = $request->year_id;
        $allDate = AssingStudent::with(['user'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
        return response()->json($allDate);
    }

    public function get_subject(Request $request){
        
        $class_id = $request->class;
        $allDate = AssignSubject::with(['subject_name'])->where('class_id',$class_id)->get();
        return response()->json($allDate);
    }
}
