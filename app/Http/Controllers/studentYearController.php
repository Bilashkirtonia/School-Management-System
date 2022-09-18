<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;

class studentYearController extends Controller
{
    public function index(){
        
        $data['Classes'] = Year::all();

        return view('admin.year.index',$data); 
    }

    public function add(){
        return view('admin.year.add'); 
    }

    public function store(Request $request){
        $this->validate($request,[
            'year'=>"required|unique:years,name",
            
         ]);


        $data = new Year();
        $data->name = $request->year;
        $data->save();
        return redirect()->route('setup.student.year.view')->with('success',"Data insert successfully!");
        
    }
    
    public function edit($id){
        
         $user = Year::find($id);
         return view('admin.year.add',compact('user'));
        
    }

    public function update(Request $request,$id){
        $data = Year::find($id);
        $this->validate($request,[
            'year'=>"required|unique:years,name,".$data->id
            
         ]);

        
        $data->name = $request->year;
        $data->save();
        return redirect()->route('setup.student.year.view')->with('success',"Data update successfully!");
        
    }
    
    public function delete($id){
        $data = Year::find($id);
        $data->delete();
        return redirect()->route('setup.student.year.view')->with('success',"Data delete successfully!");
        
    }

}
