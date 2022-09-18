<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feeType;
class studentFeeController extends Controller
{
    
    public function index(){
        
        $data['Classes'] = feeType::all();

        return view('admin.fee.index',$data); 
    }

    public function add(){
        return view('admin.fee.add'); 
    }

    public function store(Request $request){
        $this->validate($request,[
            'fee'=>"required|unique:fee_types,name",
            
         ]);


        $data = new feeType();
        $data->name = $request->fee;
        $data->save();
        return redirect()->route('setup.student.fee.view')->with('success',"Data insert successfully!");
        
    }
    
    public function edit($id){
        
         $user = feeType::find($id);
         return view('admin.fee.add',compact('user'));
        
    }

    public function update(Request $request,$id){
        $data = feeType::find($id);
        $this->validate($request,[
            'fee'=>"required|unique:fee_types,name,".$data->id
            
         ]);

        
        $data->name = $request->fee;
        $data->save();
        return redirect()->route('setup.student.fee.view')->with('success',"Data update successfully!");
        
    }
    
    public function delete($id){
        $data = feeType::find($id);
        $data->delete();
        return redirect()->route('setup.student.fee.view')->with('success',"Data delete successfully!");
        
    }

}
