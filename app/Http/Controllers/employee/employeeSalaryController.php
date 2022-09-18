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

class employeeSalaryController extends Controller
{
    public function index(){

        $data['AssingStudent'] = User::where('usertype','employee')->get();
        return view('admin.employeeSalary.student_view',$data);
    }
    public function add($id){
        $data['AssingStudent'] = User::where('id',$id)->first();
        return view('admin.employeeSalary.student_add',$data); 
    }

    public function store(Request $request,$id){
                    
            $user = User::find($id);
            $previse_salary = $user->salary;
            $increment_salary = $request->increment_salary;
            $present_salary = (float)$previse_salary + $increment_salary;
            $user->salary = $present_salary;
            $user->save();

            $user->dob = date('Y-m-d',strtotime($request->dateOfBirth));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
	
            $assingStudent = new EmployeeSalaryLog();
            $assingStudent->employee_id = $id;
            $assingStudent->previes_salary = $previse_salary;
            $assingStudent->present_salary = $present_salary;
            $assingStudent->increment_salary = $request->increment_salary;
            $assingStudent->effect_date = date('Y-m-d',strtotime($request->effected_date));
            $assingStudent->save();
            return redirect()->route('setup.employee.salary.view')->with('success',"Data insert successfully!");
        
        }

        public function details($id){
            $data['user'] = User::find($id);
            $data['details'] = EmployeeSalaryLog::where('employee_id',$data['user']->id)->get();

            return view('admin.employeeSalary.employee_details',$data); 
        }
    

}
