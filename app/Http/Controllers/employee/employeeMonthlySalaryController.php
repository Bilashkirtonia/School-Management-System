<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\EmployeeAttend;
use Barryvdh\DomPDF\Facade\Pdf;

class employeeMonthlySalaryController extends Controller
{
   public function index(){
     return view('admin.monthlySalary.reg_view');
   }

   public function add(Request $request){
    $date = $request->date;
    
    // $where = [];
    // if($date != ''){
    //     $where[] = ['date',$date];
    // }
    
    $data = EmployeeAttend::select('employee_id')->groupBy('employee_id')->with(['user1'])->where('date',$date)->get();

    
    $html['thsource'] ='<th> SL</th>';
    $html['thsource'] .='<th> In No</th>';
    $html['thsource'] .='<th> Student name</th>';
    $html['thsource'] .='<th> Roll no</th>';
    $html['thsource'] .='<th> Registration ree</th>';
    $html['thsource'] .='<th> Discount amount</th>';
    $html['thsource'] .='<th> Ree(this student)</th>';
    $html['thsource'] .='<th> Action</th>';
    
    

    foreach($data as $key => $value){
        $totallattend = EmployeeAttend::where('date',$date)->where('employee_id',$value->employee_id)->with(['user1'])->get();
        $totallAbsent = count(EmployeeAttend::where('attend_status','Absent'));
        $color ='success';
        
        $html[$key]['tdsource'] ='<td>'.($key+1).'</td>';
        $html[$key]['tdsource'] .='<td>'.$value->user1->id_no.'</td>';
        $html[$key]['tdsource'] .='<td>'.$value->user1->name.'</td>';
        
       

        $salary = (float)$value->user1->salary;
        $salaryParDay = (float)$salary/30;
        $totallSalaryMinus = $totallAbsent*$salaryParDay;
        $totalSalary = (float)$salary - (float)$totallSalaryMinus;


        
        $html[$key]['tdsource'] .='<td>'.$totalSalary.'Tk'.'</td>';
        $html[$key]['tdsource'] .='<td>';
        $html[$key]['tdsource'] .= '<a href="'.route('setup.employee.monthly.salary.payslip',$value->employee_id).'" class="btn btn-sm btn-'.$color.'"target="_blank">Payslip</a>';
        $html[$key]['tdsource'] .='</td>';
    }
   
    return response()->json(@$html);
    
}

}
