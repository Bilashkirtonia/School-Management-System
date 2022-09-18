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
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class studentRegistationController extends Controller
{
    public function index(){
        $data['studentClass'] = studentClass::all();
        $data['year'] = Year::orderBy('id','desc')->get();
        $data['year_id'] = Year::orderBy('id','desc')->first()->id;
        $data['class_id'] = Year::orderBy('id','asc')->first()->id;
        $data['AssingStudent'] = AssingStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
        
        return view('admin.studentReg.student_view',$data);
    }
    public function add(){
        $data['year'] = Year::orderBy('id','desc')->get();
        $data['shift'] = Shift::all();
        $data['groups'] = Group::all();
        $data['studentClass'] = studentClass::all();
        $data['feeType'] = feeType::all();
        return view('admin.studentReg.student_add',$data); 
    }

    public function store(Request $request){
        DB::transaction(function () use($request){
            $checkYear = Year::find($request->year)->name;
            $student = User::where('usertype','student')->orderBy('id','DESC')->first();
            if($student==null){
                $firstReg =0;
                $studentId = $firstReg+1;
                if($studentId<10){
                    $id_no = '000'.$studentId;
                }else if($studentId <100){
                    $id_no = '00'.$studentId;    
                }else if($studentId <1000){
                    $id_no = '0'.$studentId;    
                }   
            }else{
               $student = User::where('usertype','student')->orderBy('id','DESC')->first()->id;
               $studentId = $student+1;
                if($studentId<10){
                    $id_no = '000'.$studentId;
                }else if($studentId <100){
                    $id_no = '00'.$studentId;    
                }else if($studentId <1000){
                    $id_no = '0'.$studentId;    
                } 
            }
            $final_id_no = $checkYear.$id_no;
            $code =rand(0000,9999);
            $user = new User();
            $user->id_no = $final_id_no;
            $user->usertype = 'student';
            $user->code = $code;
            $user->password = bcrypt($code);
            $user->name = $request->student_name;
            $user->fat_name = $request->father_name;
            $user->mot_name = $request->mother_name;
            $user->mobile = $request->mobile_number;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dateOfBirth));
            if($request->file('image')){
                $file = $request->file('image');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('upload/student_image'), $fileName);
                $user->image = $fileName;
            }
            $user->save();
            $assingStudent = new AssingStudent();
            $assingStudent->student_id = $user->id;
            $assingStudent->class_id = $request->class;
            $assingStudent->year_id = $request->year;
            $assingStudent->group_id = $request->group;
            $assingStudent->shift_id = $request->shift;
            $assingStudent->save();
            $discountStudent = new Discount_student();
            $discountStudent->assing_student_id = $assingStudent->id;
            $discountStudent->discount = $request->discount;
            $discountStudent->fee_category_id = '1';
            $discountStudent->save();
        });
        return redirect()->route('setup.student.registation.view')->with('success',"Data insert successfully!");
        
    }
    public function search(Request $request){
        $data['studentClass'] = studentClass::all();
        $data['year'] = Year::orderBy('id','desc')->get();
        $data['year_id'] = $request->year;
        $data['class_id'] = $request->class;
        $data['AssingStudent'] = AssingStudent::where('year_id',$request->year)->where('class_id',$request->class)->get();
        
        return view('admin.studentReg.student_view',$data);
    }

    
    public function edit($student_id){
        $data['AssingStudent'] = AssingStudent::with(['user','discount'])->where('student_id',$student_id)->first();
        // dd($data['AssingStudent']->toArray());
        $data['year'] = Year::orderBy('id','desc')->get();
        $data['shift'] = Shift::all();
        $data['groups'] = Group::all();
        $data['studentClass'] = studentClass::all();
        $data['feeType'] = feeType::all();
        return view('admin.studentReg.student_add',$data); 
    }

    public function update(Request $request,$student_id){
        DB::transaction(function () use($request,$student_id){

            $user = User::where('id',$student_id)->first();
            $user->name = $request->student_name;
            $user->fat_name = $request->father_name;
            $user->mot_name = $request->mother_name;
            $user->mobile = $request->mobile_number;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dateOfBirth));
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/student_image/').$user->image);
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('upload/student_image'), $fileName);
                $user->image = $fileName;
            }
            $user->save();
            $assingStudent = AssingStudent::where('id',$request->id)->where('student_id',$student_id)->first();
            $assingStudent->class_id = $request->class;
            $assingStudent->year_id = $request->year;
            $assingStudent->group_id = $request->group;
            $assingStudent->shift_id = $request->shift;
            $assingStudent->save();
            $discountStudent = Discount_student::where('assing_student_id',$request->id)->first();
            $discountStudent->discount = $request->discount;
            $discountStudent->save();
        });
        return redirect()->route('setup.student.registation.view')->with('success',"Data insert successfully!");
        
    }
    public function promotion($student_id){
        $data['AssingStudent'] = AssingStudent::with(['user','discount'])->where('student_id',$student_id)->first();
        // dd($data['AssingStudent']->toArray());
        $data['year'] = Year::orderBy('id','desc')->get();
        $data['shift'] = Shift::all();
        $data['groups'] = Group::all();
        $data['studentClass'] = studentClass::all();
        $data['feeType'] = feeType::all();
        return view('admin.studentReg.promotion',$data); 

    }

    public function  storePromotion(Request $request,$student_id){
        DB::transaction(function () use($request,$student_id){
           
            $user = User::where('id',$student_id)->first();
            $user->name = $request->student_name;
            $user->fat_name = $request->father_name;
            $user->mot_name = $request->mother_name;
            $user->mobile = $request->mobile_number;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dateOfBirth));
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/student_image/').$user->image);
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('upload/student_image'), $fileName);
                $user->image = $fileName;
            }
            $user->save();
            $assingStudent = new AssingStudent();
            $assingStudent->student_id = $student_id;
            $assingStudent->class_id = $request->class;
            $assingStudent->year_id = $request->year;
            $assingStudent->group_id = $request->group;
            $assingStudent->shift_id = $request->shift;
            $assingStudent->save();
            $discountStudent = new Discount_student();
            $discountStudent->assing_student_id = $assingStudent->id;
            $discountStudent->discount = $request->discount;
            $discountStudent->fee_category_id = '1';
            $discountStudent->save();
        });
        return redirect()->route('setup.student.registation.view')->with('success',"Student promotion successfully!");
        
    }

    public function pdf($student_id){

     $data['AssingStudent'] = AssingStudent::with(['user','discount'])->where('student_id',$student_id)->first();  
     $pdf = Pdf::loadView('admin.studentReg.pdf_view',$data);
     return $pdf->stream();
     
    }
}
