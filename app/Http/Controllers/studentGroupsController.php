<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class studentGroupsController extends Controller
{
    
    public function index(){
        
        $data['Classes'] = Group::all();

        return view('admin.group.index',$data); 
    }

    public function add(){
        return view('admin.group.add'); 
    }

    public function store(Request $request){
        $this->validate($request,[
            'group'=>"required|unique:groups,name",
            
         ]);


        $data = new Group();
        $data->name = $request->group;
        $data->save();
        return redirect()->route('setup.student.group.view')->with('success',"Data insert successfully!");
        
    }
    
    public function edit($id){
        
         $user = Group::find($id);
         return view('admin.group.add',compact('user'));
        
    }

    public function update(Request $request,$id){
        $data = Group::find($id);
        $this->validate($request,[
            'group'=>"required|unique:groups,name,".$data->id
            
         ]);

        
        $data->name = $request->group;
        $data->save();
        return redirect()->route('setup.student.group.view')->with('success',"Data update successfully!");
        
    }
    
    public function delete($id){
        $data = Group::find($id);
        $data->delete();
        return redirect()->route('setup.student.group.view')->with('success',"Data delete successfully!");
        
    }

}
