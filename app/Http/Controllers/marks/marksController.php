<?php

namespace App\Http\Controllers\marks;

use App\Http\Controllers\Controller;
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
use App\Models\StudentMarks;
class marksController extends Controller
{
    public function index(){
        $data['year'] = Year::orderBy('id','desc')->get();
        $data['studentClass'] = studentClass::all();
        $data['exam'] = Exam::all();
        return view('admin.marksGenerate.roll_generate',$data);
    }

    public function add(Request $request){
        $stdCount = count($request->student_id);
        if($stdCount){
            for($i=0;$i<$stdCount;$i++){
                $data = new StudentMarks();
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->year_id = $request->year;
                $data->class_id = $request->class;
                $data->assing_subject_id = $request->assing_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->marks = $request->marks[$i];
                $data->save();
            }
            return redirect()->back()->with('success','Marks insert successfully');
        }
    }

    public function edit(){
        $data['year'] = Year::orderBy('id','desc')->get();
        $data['studentClass'] = studentClass::all();
        $data['exam'] = Exam::all();
        return view('admin.marksGenerate.editMarks',$data);
    }
    public function editShow(Request $request){
        $class_id = $request->class_id;
        $year_id = $request->year_id;
        $exam_type_id = $request->exam_type_id;
        $assing_subject_id = $request->assing_subject_id;
        $allDate = StudentMarks::with(['user'])->where('exam_type_id',$exam_type_id)->where('assing_subject_id',$assing_subject_id)->where('year_id',$year_id)->where('class_id',$class_id)->get();
        return response()->json($allDate);
    }

    public function update(Request $request){
        $class_id = $request->class_id;
        $year_id = $request->year_id;
        $exam_type_id = $request->exam_type_id;
        $assing_subject_id = $request->assing_subject_id;
        
        StudentMarks::with(['user'])->where('exam_type_id',$exam_type_id)->where('assing_subject_id',$assing_subject_id)->where('year_id',$year_id)->where('class_id',$class_id)->delete();
        $stdCount = count($request->student_id);
        if($stdCount){
            for($i=0;$i<$stdCount;$i++){
                $data = new StudentMarks();
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->year_id = $request->year;
                $data->class_id = $request->class;
                $data->assing_subject_id = $request->assing_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->marks = $request->marks[$i];
                $data->save();
            }
            return redirect()->back()->with('success','Marks insert successfully');
        }
    }

}
