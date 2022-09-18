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
use App\Models\Exam;
use Barryvdh\DomPDF\Facade\Pdf;

class studentExamFeeController extends Controller
{
    public function exam(){
        $data['year'] = Year::orderBy('id','desc')->get();
        $data['studentClass'] = studentClass::all();
        $data['exams'] = Exam::all();
        return view('admin.examfee.reg_view',$data);
    }

    public function examstudent(Request $request){
        $year_id = $request->year;
        $class_id=$request->class;
        $exam = $request->exam;
        $where = [];
        if($year_id != ''){
            $where[] = ['year_id',$year_id];
        }
        if($class_id != ''){
            $where[] = ['class_id', $class_id];
        }
        $AssingStudent = AssingStudent::with(['discount'])->where($where)->get();

        
        $html['thsource'] ='<th> SL</th>';
        $html['thsource'] .='<th> In No</th>';
        $html['thsource'] .='<th> Student name</th>';
        $html['thsource'] .='<th> Roll no</th>';
        $html['thsource'] .='<th> Exam fee</th>';
        $html['thsource'] .='<th> Discount amount</th>';
        $html['thsource'] .='<th> Fee(this student)</th>';
        $html['thsource'] .='<th> Exam name</th>';
        $html['thsource'] .='<th> Action</th>';
        
        

        foreach($AssingStudent as $key => $value){
            $resgistrationFee = fee_category::where('fee_type_id','3')->where('class_id',$value->class_id)->first();
            $color ='success';
            
            $html[$key]['tdsource'] ='<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .='<td>'.$value->user->id_no.'</td>';
            $html[$key]['tdsource'] .='<td>'.$value->user->name.'</td>';
            $html[$key]['tdsource'] .='<td>'.$value->roll.'</td>';
            $html[$key]['tdsource'] .='<td>'.$resgistrationFee->amount.'Tk'.'</td>';
            $html[$key]['tdsource'] .='<td>'.$value->discount->discount.'%'.'</td>';

            $orginalfee = $resgistrationFee->amount;
            $discount = $value->discount->discount;
            $discountAbleFee = $discount/100*$orginalfee;
            $finalFee = (float)$orginalfee - (float)$discountAbleFee;
            
            $html[$key]['tdsource'] .='<td>'.$finalFee.'Tk'.'</td>';
            $html[$key]['tdsource'] .='<td>'.$exam.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .= '<a href="'.route('setup.student.reg.examFee.payslip').'?class_id='.$value->class_id.'&student_id='.$value->student_id.'&exam='.$exam.'" class="btn btn-sm btn-'.$color.'" title="payslip" target="_blank">Payslip</a>';
            $html[$key]['tdsource'] .='</td>';
        }
       
        return response()->json(@$html);
        
    }

    public function payslip(Request $request){
        $student_id = $request->student_id;
        $class_id=$request->class_id;
        $data['exam'] =  $request->exam;
        $data['AssingStudent'] = AssingStudent::with(['user','discount'])->where('class_id',$class_id)->where('student_id',$student_id)->first(); 
        $data['fee_category'] = fee_category::where('fee_type_id','3')->where('class_id',$class_id)->first(); 
        $pdf = Pdf::loadView('admin.examfee.pdf',$data);
        return $pdf->stream();
    }
}
