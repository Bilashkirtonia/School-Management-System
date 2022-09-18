<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class studentExamController extends Controller

    {
    
        public function index(){
            
            $data['Classes'] = Exam::all();
    
            return view('admin.exam.index',$data); 
        }
    
        public function add(){
            return view('admin.exam.add'); 
        }
    
        public function store(Request $request){
            $this->validate($request,[
                'exam'=>"required|unique:exams,name",
                
             ]);
    
    
            $data = new Exam();
            $data->name = $request->exam;
            $data->save();
            return redirect()->route('setup.student.exam.view')->with('success',"Data insert successfully!");
            
        }
        
        public function edit($id){
            
             $user = Exam::find($id);
             return view('admin.exam.add',compact('user'));
            
        }
    
        public function update(Request $request,$id){
            $data = Exam::find($id);
            $this->validate($request,[
                'exam'=>"required|unique:exams,name,".$data->id
                
             ]);
    
            
            $data->name = $request->exam;
            $data->save();
            return redirect()->route('setup.student.exam.view')->with('success',"Data update successfully!");
            
        }
        
        // public function delete($id){
        //     $data = Shift::find($id);
        //     $data->delete();
        //     return redirect()->route('setup.student.shift.view')->with('success',"Data delete successfully!");
            
        // }
    
    }

