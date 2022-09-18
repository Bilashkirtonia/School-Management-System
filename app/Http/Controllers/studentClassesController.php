<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentClass;

class studentClassesController extends Controller
{
    public function index(){
        
        $data['Classes'] = studentClass::all();

        return view('admin.studentClass.index',$data); 
    }

    public function add(){
        return view('admin.studentClass.add'); 
    }

    public function store(Request $request){
        $this->validate($request,[
            'class'=>"required",
            
         ]);


        $data = new studentClass();
        $data->name = $request->class;
        $data->save();
        return redirect()->route('setup.student.class.view')->with('success',"Data insert successfully!");
        
    }
    
    public function edit($id){
        
         $user = studentClass::find($id);
         return view('admin.studentClass.add',compact('user'));
        
    }

    public function update(Request $request,$id){
        $data = studentClass::find($id);
        $this->validate($request,[
            'class'=>"required|unique:student_classes,name,".$data->id
            
         ]);

        
        $data->name = $request->class;
        $data->save();
        return redirect()->route('setup.student.class.view')->with('success',"Data update successfully!");
        
    }
    
    public function delete($id){
        $data = studentClass::find($id);
        $data->delete();
        return redirect()->route('setup.student.class.view')->with('success',"Data delete successfully!");
        
    }

}
