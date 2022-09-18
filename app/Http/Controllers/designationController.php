<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
class designationController extends Controller
{
    
    public function index(){
        
        $data['Classes'] = Designation::all();

        return view('admin.designation.index',$data); 
    }

    public function add(){
        return view('admin.designation.add'); 
    }

    public function store(Request $request){
        $this->validate($request,[
            'designation'=>"required|unique:designations,name",
            
         ]);


        $data = new Designation();
        $data->name = $request->designation;
        $data->save();
        return redirect()->route('setup.student.designation.view')->with('success',"Data insert successfully!");
        
    }
    
    public function edit($id){
        
         $user = Designation::find($id);
         return view('admin.designation.add',compact('user'));
        
    }

    public function update(Request $request,$id){
        $data = Designation::find($id);
        $this->validate($request,[
            'designation'=>"required|unique:designations,name,".$data->id
            
         ]);

        
        $data->name = $request->designation;
        $data->save();
        return redirect()->route('setup.student.designation.view')->with('success',"Data update successfully!");
        
    }
    
    // public function delete($id){
    //     $data = Designation::find($id);
    //     $data->delete();
    //     return redirect()->route('setup.student.shift.view')->with('success',"Data delete successfully!");
        
    // }

}
