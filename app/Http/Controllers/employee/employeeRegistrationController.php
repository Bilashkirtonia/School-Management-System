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


class employeeRegistrationController extends Controller
{
    public function index(){

        $data['AssingStudent'] = User::where('usertype','employee')->get();
        return view('admin.employeeReg.student_view',$data);
    }
    public function add(){
        $data['Designation'] = Designation::all();
        return view('admin.employeeReg.student_add',$data); 
    }

    public function store(Request $request){
        DB::transaction(function () use($request){
            $checkYear = date('Y',strtotime($request->join_date));

            $employee = User::where('usertype','employee')->orderBy('id','DESC')->first();
            if($employee==null){
                $firstReg =0;
                $employeeId = $firstReg+1;
                if($employeeId<10){
                    $id_no = '000'.$employeeId;
                }else if($employeeId <100){
                    $id_no = '00'.$employeeId;    
                }else if($employeeId <1000){
                    $id_no = '0'.$employeeId;    
                }   
            }else{
               $employee = User::where('usertype','employee')->orderBy('id','DESC')->first()->id;
               $employeeId= $employee+1;
                if($employeeId<10){
                    $id_no = '000'.$employeeId;
                }else if($employeeId <100){
                    $id_no = '00'.$employeeId;    
                }else if($employeeId <1000){
                    $id_no = '0'.$employeeId;    
                } 
            }
            $final_id_no = $checkYear.$id_no;
            $code =rand(0000,9999);
            $user = new User();
            $user->id_no = $final_id_no;
            $user->usertype = 'employee';
            $user->code = $code;
            $user->password = bcrypt($code);
            $user->name = $request->name;
            $user->fat_name = $request->father_name;
            $user->mot_name = $request->mother_name;
            $user->mobile = $request->mobile_number;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation;
            $user->dob = date('Y-m-d',strtotime($request->dateOfBirth));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));

            if($request->file('image')){
                $file = $request->file('image');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('upload/employee_image'), $fileName);
                $user->image = $fileName;
            }
            $user->save();
            		
            $assingStudent = new EmployeeSalaryLog();
            $assingStudent->employee_id = $user->id;
            $assingStudent->previes_salary = $request->salary;
            $assingStudent->present_salary = $request->salary;
            $assingStudent->increment_salary = '0';
            $assingStudent->effect_date = date('Y-m-d',strtotime($request->join_date));
            $assingStudent->save();

        });
        return redirect()->route('setup.employee.registation.view')->with('success',"Data insert successfully!");
        
    }

    public function edit($id){
        $data['editEmployee'] = User::where('usertype','employee')->where('id',$id)->first();
        $data['Designation'] = Designation::all();
        return view('admin.employeeReg.student_add',$data); 
    }

    
    

    public function update(Request $request,$id){
        
        DB::transaction(function () use($request,$id){

            $user = User::where('id',$id)->first();
            $user->name = $request->name;
            $user->fat_name = $request->father_name;
            $user->mot_name = $request->mother_name;
            $user->mobile = $request->mobile_number;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->designation_id = $request->designation;
            $user->dob = date('Y-m-d',strtotime($request->dateOfBirth));

            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/employee_image/').$user->image);
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('upload/employee_image'), $fileName);
                $user->image = $fileName;
            }
            $user->save();
            
        });
        return redirect()->route('setup.employee.registation.view')->with('success',"Data insert successfully!");
        
    }
    public function pdf($id){

     $data['AssingStudent'] = User::where('id',$id)->first();
     $pdf = Pdf::loadView('admin.employeeReg.pdf_view',$data);
     return $pdf->stream();
     
    }
    
}
