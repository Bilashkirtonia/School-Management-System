<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;

class studentShiftController extends Controller
{
    
    public function index(){
        
        $data['Classes'] = Shift::all();

        return view('admin.shift.index',$data); 
    }

    public function add(){
        return view('admin.shift.add'); 
    }

    public function store(Request $request){
        $this->validate($request,[
            'shift'=>"required|unique:shifts,name",
            
         ]);


        $data = new Shift();
        $data->name = $request->shift;
        $data->save();
        return redirect()->route('setup.student.shift.view')->with('success',"Data insert successfully!");
        
    }
    
    public function edit($id){
        
         $user = Shift::find($id);
         return view('admin.shift.add',compact('user'));
        
    }

    public function update(Request $request,$id){
        $data = Shift::find($id);
        $this->validate($request,[
            'shift'=>"required|unique:shifts,name,".$data->id
            
         ]);

        
        $data->name = $request->shift;
        $data->save();
        return redirect()->route('setup.student.shift.view')->with('success',"Data update successfully!");
        
    }
    
    public function delete($id){
        $data = Shift::find($id);
        $data->delete();
        return redirect()->route('setup.student.shift.view')->with('success',"Data delete successfully!");
        
    }

}
