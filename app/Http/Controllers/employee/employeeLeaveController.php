<?php

namespace App\Http\Controllers\employee;

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
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use App\Models\LeavePurpose;
use App\Models\EmployeeLeave;


class employeeLeaveController extends Controller
{
    public function index(){

        $data['AssingStudent'] = EmployeeLeave::all();
        return view('admin.employeeLeave.student_view',$data);
    }
    public function add(){
        $data['AssingStudent'] = User::where('usertype','employee')->get();
        $data['LeavePurpose'] = LeavePurpose::all();
        return view('admin.employeeLeave.student_add',$data); 
    }

    public function store(Request $request){
        if($request->leave_purpose_id == '0'){
            $leave = new LeavePurpose();
            $leave->name = $request->name;
            $leave->save();
            $leave_purpose_id = $leave->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
        $employeeLeave = new EmployeeLeave();
        $employeeLeave->employee_id = $request->employee_id;
        $employeeLeave->leave_purpose_id = $leave_purpose_id;
        $employeeLeave->start_date = $request->start_date;
        $employeeLeave->end_date = $request->end_date;
        
        $employeeLeave->save();

        return redirect()->route('setup.employee.leave.view')->with('success',"Data insert successfully!");
        
    }

    public function edit($id){
        $data['employee'] = EmployeeLeave::find($id);
        $data['AssingStudent'] = User::where('usertype','employee')->get();
        $data['LeavePurpose'] = LeavePurpose::all();
        return view('admin.employeeLeave.student_add',$data);
    }

    public function update(Request $request , $id){
        if($request->leave_purpose_id == '0'){
            $leave = new LeavePurpose();
            $leave->name = $request->name;
            $leave->save();
            $leave_purpose_id = $leave->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
        $employeeLeave = EmployeeLeave::find($id);
        $employeeLeave->employee_id = $request->employee_id;
        $employeeLeave->leave_purpose_id = $leave_purpose_id;
        $employeeLeave->start_date = $request->start_date;
        $employeeLeave->end_date = $request->end_date;
        
        $employeeLeave->save();

        return redirect()->route('setup.employee.leave.view')->with('success',"Data insert successfully!");
        
    }
}
