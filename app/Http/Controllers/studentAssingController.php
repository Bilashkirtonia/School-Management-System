<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\Subject;
use App\Models\studentClass;
use App\Models\Auth;
class studentAssingController extends Controller
{
    
    public function index(){
        
        $data['Classes'] = AssignSubject::select('class_id')->groupBy('class_id')->get();

        return view('admin.assing.index',$data); 
    }

    public function add(){
        $data['subjects'] = Subject::all();
        $data['classes'] = studentClass::all();
        return view('admin.assing.add',$data); 
    }

    public function store(Request $request){

        $subject_id = count($request->subject_id);
        if($subject_id !=NULL){
            for($id=0;$id<$subject_id;$id++){
                $Subject = new AssignSubject();
                $Subject->class_id = $request->class_id;
                $Subject->subject_id = $request->subject_id[$id];
                $Subject->full_mark = $request->full_mark[$id];
                $Subject->pass_mark = $request->pass_mark[$id];
                $Subject->get_mark = $request->get_mark[$id];
                $Subject->save();
            }
        }

        return redirect()->route('setup.student.aasign.view')->with('success',"Data insert successfully!");
        
    }
    
    public function edit($class_id){
        
         $data['editData'] = AssignSubject::where('class_id',$class_id)->get();
       
        $data['subjects'] = Subject::all();
        $data['classes'] = studentClass::all();
         return view('admin.assing.editfee',$data);
        
    }

    public function update(Request $request,$class_id){
        if($request->subject_id == NULL){
          return redirect()->route('setup.student.assing.view')->with('errors',"Sorry! you do not select any item");
        }else{
            AssignSubject::whereNotIn('subject_id',$request->subject_id)->where('class_id',$request->class_id)->delete();
            foreach($request->subject_id as $key =>$value){
                $assing_sub_exit = AssignSubject::where('subject_id',$request->subject_id[$key])->where('class_id',$request->class_id)->first();
                if($assing_sub_exit){
                    $Subject = $assing_sub_exit;
                }else{
                    $Subject = new AssignSubject();
                }

                $Subject->class_id = $request->class_id;
                $Subject->subject_id = $request->subject_id[$key];
                $Subject->full_mark = $request->full_mark[$key];
                $Subject->pass_mark = $request->pass_mark[$key];
                $Subject->get_mark = $request->get_mark[$key];
                $Subject->updated_by = Auth::User()->id;
                $Subject->save();

            }

        //     AssignSubject::where('class_id',$class_id)->delete();
        //  $subject_id = count($request->subject_id);
        //  for($id=0;$id<$subject_id;$id++){
        //     $Subject = new AssignSubject();
        //     $Subject->class_id = $request->class_id;
        //     $Subject->subject_id = $request->subject_id[$id];
        //     $Subject->full_mark = $request->full_mark[$id];
        //     $Subject->pass_mark = $request->pass_mark[$id];
        //     $Subject->get_mark = $request->get_mark[$id];
        //     $Subject->save();
        // }
        return redirect()->route('setup.student.aasign.view')->with('success',"Data insert successfully!");
        }

    }
    
    

    public function details($class_id){
        $data['subject_details'] = AssignSubject::where('class_id',$class_id)->get();
         return view('admin.assing.details',$data);
        
    }

}
