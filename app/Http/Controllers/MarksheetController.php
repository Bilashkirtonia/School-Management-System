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
use App\Models\fee_category;
use App\Models\{Exam,StudentMarks,Grade};
use Barryvdh\DomPDF\Facade\Pdf;

class MarksheetController extends Controller
{
    public function index(){
        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = studentClass::all();
        $data['exams'] = Exam::all();
        return view('admin.marksheet.marksheet',$data);
    }

    public function add(Request $request){
        $year = $request->year;
        $class = $request->class;
        $exam = $request->exam;
        $id_no = $request->id_no;
        $count_fail = StudentMarks::where('year_id',$year)->where('class_id',$class)->where('id_no',$id_no)->where('exam_type_id',$exam)->where('marks','<','33')->get()->count();
        $single_student = StudentMarks::where('year_id',$year)->where('class_id',$class)->where('id_no',$id_no)->where('exam_type_id',$exam)->first();
        
        if($single_student == true){
            $allMarks = StudentMarks::where('year_id',$year)->where('class_id',$class)->where('id_no',$id_no)->where('exam_type_id',$exam)->get();
            $allGrade = Grade::all();
            return view('admin.marksheet.marksheet_view',compact('count_fail','single_student','allMarks','allGrade'));
        }
    

        //return view('admin.marksheet.marksheet_view',compact('count_fail','single_student','allMarks','allGrade'));
    }

    // $pdf = Pdf::loadView('admin.examfee.pdf',$data);
        // return $pdf->stream();
}
