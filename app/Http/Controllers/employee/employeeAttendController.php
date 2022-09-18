<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Discount_student;
use App\Models\User;
use App\Models\AssingStudent;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use App\Models\LeavePurpose;
use App\Models\EmployeeLeave;
use App\Models\EmployeeAttend;

class employeeAttendController extends Controller
{
    public function index(){

        
        $data['EmployeeAttend'] = EmployeeAttend::select('date')->groupBy('date')->orderBy('id','desc')->get();
        return view('admin.employeeAttend.student_view',$data);
    }
    public function add(){
        $data['users'] = User::where('usertype','employee')->get();
        return view('admin.employeeAttend.student_add',$data); 
    }

    public function store(Request $request){
        $countEmployee = count($request->employee_id);       
        for($i=0;$i<$countEmployee;$i++){
            $attend_status ='attend_sataus'.$i;
            $attend = new EmployeeAttend();
            $attend->employee_id=$request->employee_id[$i];
            $attend->date = $request->date;
            $attend->attend_status =$request->$attend_status;
            $attend->save();
        }
        return redirect()->route('setup.employee.attend.view')->with('success',"Data insert successfully!");
        
    }
    public function edit($date){
        $data['EmployeeAttendEdit'] = EmployeeAttend::where('date',$date)->get();
        $data['EditData'] = User::where('usertype','employee')->get();
        return view('admin.employeeAttend.student_add',$data); 
    }
    public function update(Request $request){

        EmployeeAttend::where('date',$request->date)->delete();
        
        $countEmployee = count($request->employee_id);       
        for($i=0;$i<$countEmployee;$i++){
            $attend_status ='attend_sataus'.$i;
            $attend = new EmployeeAttend();
            $attend->employee_id=$request->employee_id[$i];
            $attend->date = $request->date;
            $attend->attend_status =$request->$attend_status;
            $attend->save();
        }
        return redirect()->route('setup.employee.attend.view')->with('success',"Data insert successfully!");
        

         
    }
    public function details($date){
        $data['employee'] = EmployeeAttend::where('date',$date)->get();
        $data['EditData'] = User::where('usertype','employee')->get();
        return view('admin.employeeAttend.employee_details',$data); 
    }
}
