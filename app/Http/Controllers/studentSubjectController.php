<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
class studentSubjectController extends Controller
{
    
    public function index(){
        
        $data['Classes'] = Subject::all();

        return view('admin.subject.index',$data); 
    }

    public function add(){
        return view('admin.subject.add'); 
    }

    public function store(Request $request){
        $this->validate($request,[
            'subject'=>"required|unique:subjects,name",
            
         ]);


        $data = new Subject();
        $data->name = $request->subject;
        $data->save();
        return redirect()->route('setup.student.subject.view')->with('success',"Data insert successfully!");
        
    }
    
    public function edit($id){
        
         $user = Subject::find($id);
         return view('admin.subject.add',compact('user'));
        
    }

    public function update(Request $request,$id){
        $data = Subject::find($id);
        $this->validate($request,[
            'subject'=>"required|unique:subjects,name,".$data->id
            
         ]);

        
        $data->name = $request->subject;
        $data->save();
        return redirect()->route('setup.student.subject.view')->with('success',"Data update successfully!");
        
    }
    
    // public function delete($id){
    //     $data = Shift::find($id);
    //     $data->delete();
    //     return redirect()->route('setup.student.shift.view')->with('success',"Data delete successfully!");
        
    // }

}
