<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
// use App\Models\Shift;
// use App\Models\Group;
use App\Models\studentClass;
// use App\Models\Discount_student;
// use App\Models\User;
use App\Models\AssingStudent;
// use App\Models\feeType;

class studentRollCOntroller extends Controller
{
    public function roll(){
        
        $data['year'] = Year::orderBy('id','desc')->get();
        $data['studentClass'] = studentClass::all();
        return view('admin.rollGenerate.roll_generate',$data);
    }

    public function getstudent(Request $request){
       $AssingStudent = AssingStudent::with(['user'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
       return response()->json($AssingStudent);
    }

    public function store(Request $request){
        $year_id =$request->year;
        $class_id =$request->class;
        if($request->student_id != NULL){
            for($id = 0;$id<count($request->student_id);$id++){
                AssingStudent::where('year_id',$year_id)->where('class_id',$class_id)
                ->where('student_id',$request->student_id[$id])
                ->update(['roll' => $request->roll[$id]]);
            }
            
        }else{
            return redirect()->back()->with('error','Oh Sorry! , There was no student');
        }
        return redirect()->route('setup.student.roll.generate.view')->with('success','Well done the roll is update');
     }
}
