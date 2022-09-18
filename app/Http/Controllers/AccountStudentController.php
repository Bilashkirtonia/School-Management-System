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
use App\Models\{fee_category,StudentAccountFee};
use Barryvdh\DomPDF\Facade\Pdf;


class AccountStudentController extends Controller
{
    public function index(){
        $data['students'] = StudentAccountFee::all();
        return view('admin.account.account_view',$data);
    }
    public function add(Request $request){
        $data['year'] = Year::all();
        $data['studentClass'] = studentClass::all();
        $data['feeTypes'] = feeType::all();
        return view('admin.account.account_add',$data);
    }

    public function get_student(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $fee_type_id = $request->fee_type_id;
        $date = $request->date;


    $data = AssingStudent::with(['discount'])->where('class_id',$class_id)->where('year_id',$year_id)->get();

    
    $html['thsource'] ='<th> Id no</th>';
    $html['thsource'] .='<th> Student name</th>';
    $html['thsource'] .='<th> Father name</th>';
    $html['thsource'] .='<th> Orginal fee</th>';
    $html['thsource'] .='<th> Discount amount</th>';
    $html['thsource'] .='<th> Ree(this student)</th>';
    $html['thsource'] .='<th> Select</th>';
    
    

    foreach($data as $key => $value){
        $student_fee = fee_category::where('fee_type_id',$fee_type_id)->where('class_id',$value->class_id)->first();
        $accountStudent = StudentAccountFee::where('student_id',$value->student_id)->where('class_id',$value->class_id)->where('year_id',$value->year_id)->where('fee_category_id',$value->fee_type_id)->where('date',$value->date)->first();
        
        if($accountStudent != NULL ){
            $checked = checked;
        }else{
            $checked ='';
        }

        $html[$key]['tdsource'] ='<td>'.$value->user->id_no.'<input type="hidden" name="fee_category_id" value="'.$fee_type_id.'" ></td>';
        $html[$key]['tdsource'] .='<td>'.$value->user->name.'<input type="hidden" name="year_id" value="'.$value->year_id.'" </td>';
        $html[$key]['tdsource'] .='<td>'.$value->user->fat_name.'<input type="hidden" name="class_id" value="'.$value->class_id.'" </td>';
        $html[$key]['tdsource'] .='<td>'.$student_fee->amount.'<input type="hidden" name="date" value="'.$date.'" </td>';
        $html[$key]['tdsource'] .='<td>'.$value->discount->discount.'%'.'" </td>';
        
       

        $fee = (float)$student_fee->amount;
        $discount = (float)$value->discount->discount;
        $discountFee = $discount/100*$fee;
        $finalFee = (float)$fee - (float)$discountFee;
     

        
        
        $html[$key]['tdsource'] .='<td> <input type="text" name="amount[]" value="'.$finalFee.'" class="form-control" readonly></td>';
        $html[$key]['tdsource'] .='<td> <input type="hidden" name="student_id[]" value="'.$value->student_id.'">'.'<input type="checkbox" name="checkmanage[]" value="'.$key.'"'.$checked.'></td>';

        
    }
   
    return response()->json(@$html);

    }

    public function store(Request $request){
        $date = date("Y m",strtotime($request->date));
        StudentAccountFee::where('date',$date)->where('class_id',$request->class_id)->where('year_id',$request->year_id)->where('fee_category_id',$request->fee_type_id)->delete();
        $check = $request->checkmanage;

        if($check != null){
            for($i=0;$i<count($check);$i++){
                $data = new StudentAccountFee;
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->date = $date;
                $data->fee_category_id = $request->fee_category_id;
                $data->student_id = $request->student_id[$check[$i]];
                $data->amount = $request->amount[$check[$i]];
                $data->save();

            }
        }
        if(!empty(@$data) || empty($check)){
            return redirect()->route('student.fee.view')->with('success','Data insert successfully');
        }else{
            return redirect()->back('')->with('error',' Sorry! Data not found!');   
        }


    }
}
