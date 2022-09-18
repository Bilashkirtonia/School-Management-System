<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee_category;
use App\Models\feeType;
use App\Models\studentClass;

class studentFee_amountController extends Controller
{
    
    public function index(){
        
        $data['Classes'] = fee_category::select('fee_type_id')->groupBy('fee_type_id')->get();

        return view('admin.fee_amount.index',$data); 
    }

    public function add(){
        $data['feetypes'] = feeType::all();
        $data['classes'] = studentClass::all();
        return view('admin.fee_amount.add',$data); 
    }

    public function store(Request $request){

        $classId = count($request->class_id);
        if($classId !=NULL){
            for($id=0;$id<$classId;$id++){
                $feeAmount = new fee_category();
                $feeAmount->fee_type_id = $request->fee_category_id;
                $feeAmount->class_id = $request->class_id[$id];
                $feeAmount->amount = $request->amount[$id];
                $feeAmount->save();
            }
        }

        return redirect()->route('setup.student.fee_amount.view')->with('success',"Data insert successfully!");
        
    }
    
    public function edit($fee_type_id){
        
         $data['fee_amount'] = fee_category::where('fee_type_id',$fee_type_id)->get();
        //  dd($data['fee_amount']->toArray());
         $data['feetypes'] = feeType::all();
         $data['classes'] = studentClass::all();
         return view('admin.fee_amount.editfee',$data);
        
    }

    public function update(Request $request,$fee_type_id){
        if($request->class_id == NULL){
          return redirect()->route('setup.student.fee_amount.view')->with('errors',"Sorry! you do not select any item");
        }else{
         fee_category::where('fee_type_id',$fee_type_id)->delete();
         $classId = count($request->class_id);
         for($id=0;$id<$classId;$id++){
            $feeAmount = new fee_category();
            $feeAmount->fee_type_id = $request->fee_category_id;
            $feeAmount->class_id = $request->class_id[$id];
            $feeAmount->amount = $request->amount[$id];
            $feeAmount->save();
        }
        return redirect()->route('setup.student.fee_amount.view')->with('success',"Data insert successfully!");
        }

        $data = fee_category::find($id);
        $this->validate($request,[
            'fee'=>"required|unique:fee_types,name,".$data->id
            
         ]);

        
        $data->name = $request->fee;
        $data->save();
        return redirect()->route('setup.student.fee.view')->with('success',"Data update successfully!");
        
    }
    
    // public function delete($id){
    //     $data = feeType::find($id);
    //     $data->delete();
    //     return redirect()->route('setup.student.fee.view')->with('success',"Data delete successfully!");
        
    // }

    public function details($fee_type_id){
        $data['fee_amount'] = fee_category::where('fee_type_id',$fee_type_id)->get();
        
         return view('admin.fee_amount.details',$data);
        //return redirect()->route('setup.student.fee.view')->with('success',"Data delete successfully!");
        
    }

}
